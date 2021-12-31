<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Tag extends Model
{
    use HasFactory;
    use Translatable;

    public $table = 'tags';
    public $timestamps = true;
    public $translatedAttributes = ['title'];

    public function jela() {
        return $this->belongsToMany(
            Jelo::class,
            'jelo_has_tag',
            'tag_id',
            'jelo_id',
        );
    }

}
