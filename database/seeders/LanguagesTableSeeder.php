<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
     
        DB::table('languages')->insert([
            'code' => 'hr',
        ]);

        DB::table('languages')->insert([
            'code' => 'en',
        ]);
    }
}
