<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $limit = 66;

        for ($i = 1; $i < $limit; $i++) {
            if($i <= 16){
             DB::table('meals')->insert([
                       'created_at'  => \Carbon\Carbon::yesterday(),
                       'updated_at'  => null,
                       'deleted_at'  => null,
                       'category_id' => $i,
                   ]);
             }

             if($i > 16 && $i < 32){
                DB::table('meals')->insert([
                          'created_at'  => \Carbon\Carbon::yesterday(),
                          'updated_at'  => \Carbon\Carbon::now(),
                          'deleted_at'  => null,
                          'category_id' => $i,
                      ]);
                }

                if($i >= 32 && $i < 48){
                    DB::table('meals')->insert([
                              'created_at'  => \Carbon\Carbon::yesterday(),
                              'updated_at'  => \Carbon\Carbon::now(),
                              'deleted_at'  => null,
                              'category_id' => $i,
                          ]);
                    }

             if($i >= 48 && $i < 56){
                DB::table('meals')->insert([
                          'created_at'  => \Carbon\Carbon::yesterday(),
                          'updated_at'  => \Carbon\Carbon::now(),
                          'deleted_at'  => $faker->dateTimeBetween('+0 days', '+2 years'),
                          'category_id' => null,
                      ]);
                }

             if($i >= 56){
                DB::table('meals')->insert([
                          'created_at'  => \Carbon\Carbon::yesterday(),
                          'updated_at'  => \Carbon\Carbon::now(),
                          'deleted_at'  => null,
                          'category_id' => null,
                      ]);
                }

                
        }
           
    }
}
