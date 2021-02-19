<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_translations', function (Blueprint $table) {
       // mandatory fields
       $table->bigIncrements('id'); // Laravel 5.8+ use bigIncrements() instead of increments()
       $table->string('locale')->index();

       // Foreign key to the main model
       $table->unsignedBigInteger('tags_id');
       $table->unique(['tags_id', 'locale']);
       $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');

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
        Schema::dropIfExists('tags_translation');
    }
}
