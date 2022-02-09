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

    protected $table = 'ingredients';

    public function jela() {
        return $this->belongsToMany(
            Meal::class,
            'meal_has_ingredient',
            'ingredient_id',
            'meal_id'
        );
    }
}