<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealsTranslation extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'description'];
    
    public $translatedAttributes = ['title', 'description'];
    public $timestamps = false;
}
