<?php

namespace App\Http\Controllers\Token;

use App\Category;
use App\Company;
use App\Http\Requests\Token\TokenRequest;
use App\Member;
use App\Status;
use App\Token;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        $member = auth()->user()->member;
        if (auth()->user()->can('pdg', $member) || auth()->user()->can('manager', $member)) {
            $tokens = $company->tokens;
            return view('token.index', compact('company', 'tokens'));
        }
        abort(403);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
        if (auth()->user()->can('pdg', Member::class) || auth()->user()->can('manager', Member::class)) {
            $categories = $this->categories($company);
            return view('token.create', compact('company', 'categories'));
        }
        abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TokenRequest|Request $request
     * @param Company $company
     * @return \Illuminate\Http\Response
     */
    public function store(TokenRequest $request,Company $company)
    {
        $premium = $company->premium;
        $premium->update(['sold' => $premium->sold - $request->range]);
        $token = md5(sha1(rand()));
        $request->request->add(['company_id' => $company->id,'token'=>$token, 'category_id'=>$request->category]);
        Token::create($request->all());
        return redirect()->route('token.index',compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @param  \App\Token $token
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company, Token $token)
    {
        $premium = $company->premium;
        $premium->update(['sold' => $premium->sold + $token->range]);
        $token->delete();
        return redirect()->route('token.index', compact('company'));
    }

    private function categories(Company $company)
    {
        foreach ($company->members as $member) {
            if ($member->category_id == 2) {
                return Category::where('id', '>', 2)->get();
            }
        }
        foreach ($company->tokens as $token) {
            if ($token->category_id == 2) {
                return Category::where('id', '>', 2)->get();
            }
        }
        return Category::where('id', '>', 1)->get();
    }
}
