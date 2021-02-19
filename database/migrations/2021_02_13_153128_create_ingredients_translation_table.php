<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients_translations', function (Blueprint $table) {
              // mandatory fields
              $table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
              $table->string('locale')->index();
  
              // Foreign key to the main model
              $table->unsignedBigInteger('ingredients_id');
              $table->unique(['ingredients_id', 'locale']);
              $table->foreign('ingredients_id')->references('id')->on('ingredients')->onDelete('cascade');

              // Actual fields you want to translate
              $table->string('title');
              $table->longText('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients_translation');
    }
}
