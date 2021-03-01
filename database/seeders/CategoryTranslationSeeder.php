<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class CategoryTranslationSeeder extends Seeder
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

            DB::table('category_translations')->insert([
                      'category_id' =>  $i,
                      'title'       =>  "Naslov $i. kategorije",
                      'slug'        =>  "Slug-$i-kategorije",
                      'locale'      =>  'hr',
                    ]);


            DB::table('category_translations')->insert([
                      'category_id' =>  $i,
                      'title'       =>  "Title of $i. category",
                      'slug'        =>  "Slug-of-$i-category",
                      'locale'      =>  'en',
                    ]);
                  }
    }
}
