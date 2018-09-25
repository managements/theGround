<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // user
        $pdg = \App\User::create([
            'login'     => 'pdg',
            'password'  => bcrypt('066145392mM')
        ]);
        $accounting = \App\User::create([
            'login'     => 'accounting',
            'password'  => bcrypt('066145392mM')
        ]);
        // email
        \App\Email::create([
            'email'     => 'pdg@ly.ly',
            'member_id' => $pdg->id,
        ]);
        \App\Email::create([
            'email'     => 'accounting@ly.ly',
            'member_id' => $accounting->id,
        ]);
        // tel
        \App\Tel::create([
            'tel'       => '0666145392',
            'member_id' => $pdg->id,
        ]);
        \App\Tel::create([
            'tel'       => '0666145393',
            'member_id' => $accounting->id,
        ]);
        // premium
        $p_pdg = \App\Premium::create([
            'sold'      => 0,
            'range'     => 0,
            'limit'     => gmdate('Y-m-d',strtotime("+30 days")),
            'status_id' => 2
        ]);
        $p_accounting = \App\Premium::create([
            'sold'      => 0,
            'range'     => 0,
            'limit'     => gmdate('Y-m-d',strtotime("+30 days")),
            'status_id' => 2
        ]);
        // member
        \App\Member::create([
            'name'          => 'pdg',
            'first_name'    => 'first_pdg',
            'last_name'     => 'last_pdg',
            'birth'         => date('1987-07-20'),
            'city_id'       => 1,
            'premium_id'    => $p_pdg->id,
            'category_id'   => 1,
            'user_id'       => $pdg->id,
            'company_id'    => 1
        ]);
        \App\Member::create([
            'name'          => 'accounting',
            'first_name'    => 'first_accounting',
            'last_name'     => 'last_accounting',
            'birth'         => date('1987-07-20'),
            'city_id'       => 1,
            'premium_id'    => $p_accounting->id,
            'category_id'   => 3,
            'user_id'       => $accounting->id,
            'company_id'    => 1
        ]);
    }
}
