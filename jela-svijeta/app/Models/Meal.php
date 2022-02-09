<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;

class Meal extends Model
{

    use SoftDeletes;
    use HasFactory;
    use Translatable;

    public $table = 'meals';
    public $timestamps = true;
    public $translatedAttributes = ['title', 'description'];
    
    public function category() {
        return $this->belongsTo(
            Category::class, 
        );
    }

    public function tags() {
        return $this->belongsToMany(
            Tag::class,
            'meal_has_tag',
            'meal_id',
            'tag_id'
        );
    }

    public function ingredients() {
        return $this->belongsToMany(
            Ingredient::class,
            'meal_has_ingredient',
            'meal_id',
            'ingredient_id',
        );
    }

}