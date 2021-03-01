<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $limit = 65;

        for($i = 0; $i < $limit; $i++){
            DB::table('ingredients')->insert([
                      'created_at' => \Carbon\Carbon::yesterday(),
                      'updated_at' => \Carbon\Carbon::today(),
                   ]);
            
        }
    }
}
