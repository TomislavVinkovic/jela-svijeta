<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Ingredient extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['title'];

    public function jela() {
        return $this->belongsToMany(
            Jelo::class,
            'jelo_has_ingredient',
            'ingredient_id',
            'jelo_id'
        );
    }
}
