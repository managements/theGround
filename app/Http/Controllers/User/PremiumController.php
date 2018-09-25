<?php

namespace App\Http\Controllers\User;

use App\Company;
use App\Http\Requests\User\PremiumRequest;
use App\Member;
use App\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PremiumController extends Controller
{
    public function premium(Company $company, Member $member)
    {
        if (auth()->user()->can('pdg', $member) || auth()->user()->can('manager', $member)) {
            if ($member->category->category != 'pdg') {
                $statuses = Status::all();
                return view('user.premium', compact('company','member', 'statuses'));
            }
        }
        abort(403);
    }

    public function update(PremiumRequest $request,Company $company, Member $member)
    {
        $premium = $this->range($request, $member->premium);
        $this->status($request, $premium);
        return redirect()->route('profile',compact('company','member'));
    }

    private function status($request, $premium)
    {
        if ($request->status == 1) {
            $days = 0;
            if (!is_null($premium->limit)) {
                $end = strtotime($premium->limit);
                $start = strtotime(gmdate('Y-m-d'));
                $diff = $end - $start;
                $days = $diff / (60 * 60 * 24);
            }
            $premium->update(['range' => $days + $premium->range, 'limit' => null, 'status_id' => 1]);
        }
        if ($request->status == 2) {
            $premium->update(['range' => 0, 'limit' => gmdate('Y-m-d', strtotime("+$premium->range days")), 'status_id' => 2]);
            $premium->member->company->premium->update(['sold' => $premium->member->company->premium->sold - $premium->range]);
        }
        if ($request->status == 3) {
            $days = 0;
            if (!is_null($premium->limit)) {
                $end = strtotime($premium->limit);
                $start = strtotime(gmdate('Y-m-d'));
                $diff = $end - $start;
                $days = $diff / (60 * 60 * 24);
            }

            $premium->member->company->premium->update(['sold' => $premium->member->company->premium->sold + $days + $premium->range]);
            $premium->update(['range' => 0, 'limit' => null, 'status_id' => 3]);
        }
        return $premium;
    }

    private function range($request, $premium)
    {
        $sold = $premium->member->company->premium->sold + $premium->range;
        $sold = $sold - $request->range;
        $premium->update(['range' => $request->range,]);
        $premium->member->company->premium->update(['sold' => $sold]);
        return $premium;
    }
}
