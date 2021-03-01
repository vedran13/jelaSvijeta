<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class IngredientsMealsSeeder extends Seeder
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

        for($i = 1; $i < $limit; $i++) {
            DB::table('ingredients_meals')->insert([
                      'ingredients_id' =>  $faker->numberBetween(1,65),
                      'meal_id'        =>  $faker->numberBetween(1,65),
                    ]);

            DB::table('ingredients_meals')->insert([
                      'ingredients_id' =>  $faker->numberBetween(1,65),
                      'meal_id'        =>  $faker->numberBetween(1,65),
                    ]);  
                          
            DB::table('ingredients_meals')->insert([
                      'ingredients_id' =>  $faker->numberBetween(1,65),
                      'meal_id'        =>  $faker->numberBetween(1,65),
                    ]);        
                }
    }
}
