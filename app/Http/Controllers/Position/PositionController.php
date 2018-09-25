<?php

namespace App\Http\Controllers\Position;

use App\Company;
use App\Email;
use App\Http\Requests\Position\PositionRequest;
use App\Http\Requests\Position\PositionUpdateRequest;
use App\Position;
use App\Tel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        $positions = $company->positions;
        return view('position.index', compact('company', 'positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        $member = auth()->user()->member;
        if (auth()->user()->can('pdg', $member) || auth()->user()->can('manager', $member)) {
            return view('position.create', compact('company'));
        }
        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PositionRequest|Request $request
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function store(PositionRequest $request,Company $company)
    {
        $request->request->add(['city_id' => $request->city, 'company_id' => $company->id]);
        $position = Position::create($request->all());
        Tel::create(['tel'=> $request->tel,'position_id'=>$position->id]);
        Email::create(['email'=> $request->email,'position_id'=>$position->id]);
        return redirect()->route('position.show',compact('company','position'));
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @param  \App\Position $position
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company,Position $position)
    {
        $member = auth()->user()->member;
        $edit = false;
        if (auth()->user()->can('pdg', $member) || auth()->user()->can('manager', $member)) {
            $edit = true;
        }
        return view('position.position',compact('company','position','edit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @param  \App\Position $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company, Position $position)
    {
        $member = auth()->user()->member;
        if (auth()->user()->can('pdg', $member) || auth()->user()->can('manager', $member)) {
            return view('position.edit', compact('company', 'position'));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PositionUpdateRequest|Request $request
     * @param Company $company
     * @param  \App\Position $position
     * @return \Illuminate\Http\Response
     */
    public function update(PositionUpdateRequest $request, Company $company, Position $position)
    {
        $request->request->add(['position' => $request->positions,'city_id' => $request->city]);
        $position->update($request->all());
        $position->tel->update($request->all());
        $position->email->update($request->all());
        return redirect()->route('position.show',compact('company','position'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @param  \App\Position $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company, Position $position)
    {
        $member = auth()->user()->member;
        if (auth()->user()->can('pdg', $member) || auth()->user()->can('manager', $member)) {
            $position->tel->delete();
            $position->email->delete();
            $position->delete();
            return redirect()->route('position.index', compact('company'));
        }
        abort(403);
    }
}
