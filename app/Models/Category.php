<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// 1. To specify package’s class you are using
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable; // 2. To add translation methods

    protected $table = 'category';

    protected $hidden = [
    'pivot',
    'translations'
    ];

  // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['title', 'slug'];
}
