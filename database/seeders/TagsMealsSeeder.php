<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class TagsMealsSeeder extends Seeder
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
            
             DB::table('tags_meals')->insert([
                       'tag_id'     =>  $faker->numberBetween(1,65),
                       'meal_id'    =>  $faker->numberBetween(1,65),
                    ]);

             DB::table('tags_meals')->insert([
                       'tag_id'     =>  $faker->numberBetween(1,65),
                       'meal_id'    =>  $faker->numberBetween(1,65),
                    ]);

             DB::table('tags_meals')->insert([
                       'tag_id'     =>  $faker->numberBetween(1,65),
                       'meal_id'    =>  $faker->numberBetween(1,65),
                    ]);
        }
    }
}
