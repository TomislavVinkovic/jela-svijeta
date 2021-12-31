<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;

class Jelo extends Model
{

    use SoftDeletes;
    use HasFactory;
    use Translatable;

    public $table = 'jela';
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
            'jelo_has_tag',
            'jelo_id',
            'tag_id'
        );
    }

    public function ingredients() {
        return $this->belongsToMany(
            Ingredient::class,
            'jelo_has_ingredient',
            'jelo_id',
            'ingredient_id',
        );
    }

}
