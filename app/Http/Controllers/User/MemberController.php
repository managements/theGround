<?php

namespace App\Http\Controllers\User;

use App\Company;
use App\Http\Requests\User\ParamsRequest;
use App\Member;
use App\Http\Controllers\Controller;

/**
 * Class MemberController
 * @package App\Http\Controllers\User
 */
class MemberController extends Controller
{
    /**
     * @param Company $company
     * @param Member $member
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile(Company $company, Member $member)
    {
        $edit = false;
        if (auth()->user()->can('pdg', $member) || auth()->user()->can('manager', $member)) {
            if ($member->category->category != 'pdg') {
                $edit = true;
            }
        }
        return view('user.profile', compact('company', 'member','edit'));
    }

    /**
     * @param Company $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function members(Company $company)
    {
        $members = Member::where('company_id', $company->id)->with('category')->with('tel')->with('email')->get();
        return view('user.members', compact('company', 'members'));
    }

    /**
     * @param Company $company
     * @param Member $member
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function params(Company $company, Member $member)
    {
        return view('user.params', compact('company', 'member'));
    }

    /**
     * @param ParamsRequest $request
     * @param Company $company
     * @param Member $member
     * @return \Illuminate\Http\RedirectResponse
     * @internal param Company $company
     */
    public function update(ParamsRequest $request, Company $company, Member $member)
    {
        $member->update($request->all());
        $tel = $member->tel;
        $tel->update(['tel' => $request->tel]);
        $email = $member->email;
        $email->update(['email' => $request->email]);
        if ($request->identity == 'email') {
            auth()->user()->update(['login' => $request->email]);
        } else {
            auth()->user()->update(['login' => $request->name]);
        }
        return redirect()->route('profile', compact('company', 'member'));
    }
}
