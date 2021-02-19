<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            //Zbog relacija moramo prvo napraviti seed tablica na koje se oslanjaju relacije. Koristimo reference. 
            CategoryTableSeeder::class,
            MealsTableSeeder::class,     
            IngredientsTableSeeder::class,  
            TagsTableSeeder::class,
            LanguagesTableSeeder::class,

            CategoryTranslationSeeder::class,
            IngredientsTranslationSeeder::class,
            MealsTranslationSeeder::class,
            TagsTranslationSeeder::class,

            IngredientsMealsSeeder::class,
            TagsMealsSeeder::class,
        ]);
    }
}
