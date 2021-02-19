<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class MealsTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $limit = 51;

        for($i = 1; $i < $limit; $i++) {
            DB::table('meals_translations')->insert([
                'meals_id'    =>  "$i",
                'title'       =>  "Naslov $i. jela",
                'description' =>  "Opis $i. jela",
                'locale'      =>  'hr',
              ]);


            DB::table('meals_translations')->insert([
                'meals_id'    =>  "$i",
                'title'       =>  "Title of $i. meal",
                'description' =>  "Description of $i. meal",
                'locale'      =>  'en',
              ]);
        }
    }
}
