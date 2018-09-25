<?php

namespace App\Http\Controllers\Deal;

use App\Company;
use App\deal;
use App\Http\Requests\Deal\DealRequest;
use App\Http\Requests\Deal\DealUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        $providers = Deal::where([['company_id',$company->id],['provider', true]])->get();
        return view('deal.provider.index',compact('company','providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        return view('deal.provider.create',compact('company'));
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
        $request->request->add(['provider'=>true,'company_id'=>$company->id,'city_id'=>$request->city]);
        $deal = Deal::create($request->all());
        $deal->update(['slug'   => 'PRV-' . $deal->id]);
        $provider = $deal->slug;
        return redirect()->route('provider.show',compact('company','provider'));
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @param string $provider
     * @return \Illuminate\Http\Response
     * @internal param deal $deal
     */
    public function show(Company $company,string $provider)
    {
        $deal = Deal::where('slug',$provider)->first();
        return view('deal.provider.provider',compact('company','deal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @param string $provider
     * @return \Illuminate\Http\Response
     * @internal param deal $deal
     */
    public function edit(Company $company, string $provider)
    {
        $deal = Deal::where('slug',$provider)->first();
        return view('deal.provider.edit',compact('company','deal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DealRequest|DealUpdateRequest|Request $request
     * @param Company $company
     * @param string $provider
     * @return \Illuminate\Http\Response
     * @internal param deal $deal
     */
    public function update(DealUpdateRequest $request, Company $company, string $provider)
    {
        $deal = Deal::where('slug',$provider)->first();
        $deal->update($request->all());
        $deal = $deal->slug;
        return redirect()->route('provider.show',compact('company','deal'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @param string $provider
     * @return \Illuminate\Http\Response
     * @internal param deal $deal
     */
    public function destroy(Company $company, string $provider)
    {
        Deal::where('slug',$provider)->first()->delete();
        return redirect()->route('provider.index',compact('company'));
    }
}
