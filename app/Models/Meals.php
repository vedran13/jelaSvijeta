<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// 1. To specify package’s class you are using
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Meals extends Model implements TranslatableContract
{
    use HasFactory;
    use SoftDeletes;
    use Translatable; // 2. To add translation methods

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['title', 'description'];

    protected $hidden = [
      'pivot',
      'translations'
    ];
    

    public function category(){
      return $this->hasOne(Category::class,'id','category_id')->select('category.id');                                      
    }

    public function tags(){
      return $this->belongsToMany(Tags::class, 'tags_meals', 'meal_id','tag_id')->select('tags.id');
    }

    public function ingredients(){
      return $this->belongsToMany(Ingredients::class, 'ingredients_meals', 'meal_id', 'ingredients_id')->select('ingredients.id');
    } 

}
