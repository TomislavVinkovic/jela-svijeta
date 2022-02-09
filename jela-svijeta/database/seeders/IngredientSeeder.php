<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Ingredient;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'slug' => 'carrot',
            'en' => ['title' => 'Carrot'],
            'hr' => ['title' => 'Mrkva'],
        ];
        Ingredient::create($data);

        $data = [
            'slug' => 'cream',
            'en' => ['title' => 'Cream'],
            'hr' => ['title' => 'Šlag'],
        ];
        Ingredient::create($data);

        $data = [
            'slug' => 'strawberry',
            'en' => ['title' => 'Strawberry'],
            'hr' => ['title' => 'Jagoda'],
        ];
        Ingredient::create($data);

        $data = [
            'slug' => 'sugar',
            'en' => ['title' => 'Sugar'],
            'hr' => ['title' => 'Šećer'],
        ];
        Ingredient::create($data);

        $data = [
            'slug' => 'beef',
            'en' => ['title' => 'Beef'],
            'hr' => ['title' => 'Govedina'],
        ];
        Ingredient::create($data);

        $data = [
            'slug' => 'tomato',
            'en' => ['title' => 'Tomato'],
            'hr' => ['title' => 'Rajčica'],
        ];
        Ingredient::create($data);

        $data = [
            'slug' => 'salad',
            'en' => ['title' => 'Salad'],
            'hr' => ['title' => 'Zelena salata'],
        ];
        Ingredient::create($data);

        $data = [
            'slug' => 'catfish',
            'en' => ['title' => 'Catfish'],
            'hr' => ['title' => 'Som'],
        ];
        Ingredient::create($data);

        $data = [
            'slug' => 'pasta',
            'en' => ['title' => 'Pasta'],
            'hr' => ['title' => 'Tjestenina'],
        ];
        Ingredient::create($data);
    }
}
