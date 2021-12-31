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
        Ingredient::create(['slug' => 'carrot'])::saveTranslations(
            'title',
            [
                'en' => 'Carrot',
                'hr' => 'Mrkva'
            ]
        );

        Ingredient::create(['slug' => 'cream'])::saveTranslations(
            'title',
            [
                'en' => 'Cream',
                'hr' => 'Šlag'
            ]
        );

        Ingredient::create(['slug' => 'strawberry'])::saveTranslations(
            'title',
            [
                'en' => 'Strawberry',
                'hr' => 'Jagoda'
            ]
        );

        Ingredient::create(['slug' => 'sugar'])::saveTranslations(
            'title',
            [
                'en' => 'Sugar',
                'hr' => 'Šećer'
            ]
        );

        Ingredient::create(['slug' => 'beef'])::saveTranslations(
            'title',
            [
                'en' => 'Beef',
                'hr' => 'Govedina'
            ]
        );

        Ingredient::create(['slug' => 'tomato'])::saveTranslations(
            'title',
            [
                'en' => 'Tomato',
                'hr' => 'Rajčica'
            ]
        );

        Ingredient::create(['slug' => 'salad'])::saveTranslations(
            'title',
            [
                'en' => 'Salad',
                'hr' => 'Zelena salata'
            ]
        );

        Ingredient::create(['slug' => 'catfish'])::saveTranslations(
            'title',
            [
                'en' => 'Som',
                'hr' => 'Catfish'
            ]
        );

        Ingredient::create(['slug' => 'pasta'])::saveTranslations(
            'title',
            [
                'en' => 'Pasta',
                'hr' => 'Tjestenina'
            ]
        );
    }
}
