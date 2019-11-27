<?php

use Illuminate\Database\Seeder;

class NationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Nation::class, 3)->create();
        factory(\App\Model\City::class, 3)->create();
        factory(\App\Model\District::class, 3)->create();
        factory(\App\Model\Commune::class, 3)->create();
    }
}
