<?php

namespace App\Models;

use App\Models\Meal;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use Translatable;

    protected $table = 'categories';
    public $translatedAttributes = ['title'];
    
    public function meals() {
        return $this->hasMany(Meal::class);
    }

}