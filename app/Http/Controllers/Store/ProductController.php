<?php

namespace App\Http\Controllers\Store;

use App\Company;
use App\Http\Requests\Store\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        $products = $company->products;
        return view('store.index',compact('products','company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        return view('store.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest|Request $request
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, Company $company)
    {
        $request->request->add(['company_id'=>$company->id]);
        $product = Product::create($request->all());
        $product->update(['ref' => 'PROD-' . $product->id]);
        return redirect()->route('product.show',compact('company','product'));
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company, Product $product)
    {
        return view('store.product',compact('company','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company, Product $product)
    {
        return view('store.edit',compact('company','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest|Request $request
     * @param Company $company
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Company $company, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('product.show',compact('company','product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company, Product $product)
    {
        $product->delete();
        return redirect()->route('product.index',compact('company'));
    }
}
