<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;

    protected $fillable          = ['title', 'slug'];
    public $translatedAttributes = ['title', 'slug'];

    protected $hidden = [
        'pivot',
        'translations'
      ];

    public    $timestamps = false;
}
