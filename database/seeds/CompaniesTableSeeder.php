<?php

use App\Token;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $premium = \App\Premium::create([
            'sold'      => 500,
            'range'     => 0,
            'limit'     => null,
            'status_id' => 1
        ]);
        $company = \App\Company::create([
            'brand'         => null,
            'slug'          => str_slug('company S.A.R.L'),
            'name'          => 'company S.A.R.L',
            'licence'       => '123456789',
            'turnover'      => '10000',
            'taxes'         => '32',
            'fax'           => '0522834566',
            'speaker'       => 'speaker',
            'address'       => 'BD mohamed 6 jamila 1',
            'build'         => '1443',
            'floor'         => 1,
            'apt_nbr'       => 1,
            'zip'           => 20000,
            'city_id'       => 1,
            'premium_id'   => $premium->id,
        ]);
        \App\Tel::create([
            'tel'           => '0522369665',
            'company_id'    => $company->id,
        ]);
        \App\Email::create([
            'email'         => 'company@.ly.ly',
            'company_id'    => $company->id,
        ]);
        Token::create([
            'token'         => md5(sha1(rand())),
            'range'         => 30,
            'company_id'    => $company->id,
            'category_id'   => 1
        ]);
    }
}
