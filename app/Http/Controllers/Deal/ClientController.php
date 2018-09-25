<?php

namespace App\Http\Controllers\Deal;

use App\Company;
use App\deal;
use App\Http\Requests\Deal\DealRequest;
use App\Http\Requests\Deal\DealUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        $clients = Deal::where([['company_id',$company->id],['client', true]])->get();
        return view('deal.client.index',compact('company','clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        return view('deal.client.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DealRequest|Request $request
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function store(DealRequest $request,Company $company)
    {
        $request->request->add(['client'=>true,'company_id'=>$company->id,'city_id'=>$request->city]);
        $deal = Deal::create($request->all());
        $deal->update(['slug'   => 'CLT-' . $deal->id]);
        $client = $deal->slug;
        return redirect()->route('client.show',compact('company','client'));
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @param string $client
     * @return \Illuminate\Http\Response
     * @internal param deal $deal
     */
    public function show(Company $company,string $client)
    {
        $deal = Deal::where('slug',$client)->first();
        return view('deal.client.client',compact('company','deal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @param string $client
     * @return \Illuminate\Http\Response
     * @internal param deal $deal
     */
    public function edit(Company $company, string $client)
    {
        $deal = Deal::where('slug',$client)->first();
        return view('deal.client.edit',compact('company','deal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DealRequest|DealUpdateRequest|Request $request
     * @param Company $company
     * @param string $client
     * @return \Illuminate\Http\Response
     * @internal param deal $deal
     */
    public function update(DealUpdateRequest $request, Company $company, string $client)
    {
        $deal = Deal::where('slug',$client)->first();
        $deal->update($request->all());
        $deal = $deal->slug;
        return redirect()->route('client.show',compact('company','deal'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @param string $client
     * @return \Illuminate\Http\Response
     * @internal param deal $deal
     */
    public function destroy(Company $company, string $client)
    {
        Deal::where('slug',$client)->first()->delete();
        return redirect()->route('client.index',compact('company'));
    }
}
