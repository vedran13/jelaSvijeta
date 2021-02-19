<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class IngredientsTranslationSeeder extends Seeder
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

            DB::table('ingredients_translations')->insert([
                       'ingredients_id' =>  "$i",
                       'title'          =>  "Naslov $i. sastojka",
                       'slug'           =>  "Slug-$i-sastojka",
                       'locale'         =>  'hr',
                    ]);

            DB::table('ingredients_translations')->insert([
                       'ingredients_id' =>  "$i",
                       'title'          =>  "Title-of-$i-ingredient",
                       'slug'           =>  "Slug-of-$i-ingredient",
                       'locale'         =>  'en',
                    ]);
                }
    }
}
