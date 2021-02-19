<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientsTranslation extends Model
{
    use HasFactory;

    protected $fillable          = ['title', 'slug'];
    public $translatedAttributes = ['title', 'slug'];
    public    $timestamps        = false;
}
