<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Faker\Factory as faker;


class TagsTranslationSeeder extends Seeder
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
            DB::table('tags_translations')->insert([
                'tags_id'     =>  "$i",
                'title'       =>  "Naslov $i. taga",
                'slug'        =>  "Slug-$i-taga",
                'locale'      =>  'hr',
              ]);


            DB::table('tags_translations')->insert([
                'tags_id'     =>  "$i",
                'title'       =>  "Title of $i. meal",
                'slug'        =>  "Slug-of-$i-meal",
                'locale'      =>  'en',
              ]);
                }
    }
}
