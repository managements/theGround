<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Position::create([
            'position'      => 'management',
            'first_name'    => 'first_position',
            'last_name'     => 'last_position',
            'city_id'       => 1,
            'company_id'    => 1
        ]);

        \App\Email::create([
            'email'     => 'position@ly.ly',
            'position_id' => 1,
        ]);
        // tel
        \App\Tel::create([
            'tel'       => '0666145395',
            'position_id' => 1,
        ]);
    }
}
