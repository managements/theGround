<?php

namespace App\Http\Controllers\Auth;

use App\Email;
use App\Member;
use App\Premium;
use App\Rules\PasswordRule;
use App\Rules\TelRule;
use App\Tel;
use App\Token;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name'    => 'required|string|min:2|max:20',
            'last_name'     => 'required|string|min:2|max:20',
            'tel'           => ['bail','required','min:10','max:10',new TelRule(),'unique:tels'],
            'address'       => 'nullable|string|min:10|max:100',
            'city'          => 'bail|required|int|exists:cities,id',
            'birth'         => 'bail|required|date|before:' . date('d-m-Y',strtotime("-18 years")),
            'token'         => 'required|min:20|exists:tokens,token',
            'name'          => 'bail|required|string|max:25|unique:members',
            'email'         => 'required|string|email|max:80|unique:emails',
            'password'      => ['bail','required','string','min:6','max:18','confirmed',new PasswordRule()],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'login' => $data['name'],
            'password' => Hash::make($data['password']),
        ]);
        $token = Token::where('token', $data['token'])->first();
        if($token->category_id == 1){
            $premium = $token->company->premium;
            $premium->update([
                'status_id' => 2,
                'range'     => 0,
                'limit'     => gmdate('Y-m-d',strtotime("+$token->range days"))
            ]);
        }
        $premium = Premium::create([
            'sold'      => 0,
            'range'     => 0,
            'limit'     => gmdate('Y-m-d',strtotime("+$token->range days")),
            'status_id' => 2,
        ]);
        $member = Member::create([
            'name'          => $data['name'],
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'birth'         => $data['birth'],
            'address'       => (isset($data['address'])) ? $data['address'] : null,
            'city_id'       => $data['city'],
            'premium_id'    => $premium->id,
            'category_id'   => $token->category_id,
            'user_id'       => $user->id,
            'company_id'    => $token->company_id,
        ]);
        Email::create([
            'email'     => $data['email'],
            'member_id' => $member->id,
        ]);
        Tel::create([
            'tel'       => $data['tel'],
            'member_id' => $member->id
        ]);
        if($token->category_id == 1){
            $premium_company = $token->company->premium;
            $premium_company->update([
                'status_id' => 2,
                'range' => 0,
                'limit' => gmdate('Y-m-d', strtotime("+$premium_company->range days"))
            ]);
        }
        $token->delete();
        return $user;
    }
}
