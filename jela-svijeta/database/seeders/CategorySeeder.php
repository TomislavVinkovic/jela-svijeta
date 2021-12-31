<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create(['slug' => 'sweets'])::saveTranslations(
            'title',
            [
                'en' => 'Sweets',
                'hr' => 'Slastice'
            ]
        );
        
        Category::create(['slug' => 'soups'])::saveTranslations(
            'title',
            [
                'en' => 'Soups',
                'hr' => 'Juhe'
            ]
        );

        Category::create(['slug' => 'fish'])::saveTranslations(
            'title',
            [
                'en' => 'Fish specialties',
                'hr' => 'Riblji specijaliteti'
            ]
        );

        Category::create(['slug' => 'pastas'])::saveTranslations(
            'title',
            [
                'en' => 'Pastas',
                'hr' => 'Tjestenine'
            ]
        );

        Category::create(['slug' => 'meatveggies'])::saveTranslations(
            'title',
            [
                'en' => 'Meals with meat and vegetables',
                'hr' => 'Jela s mesom i povrćem'
            ]
        );

        Category::create(['slug' => 'grill'])::saveTranslations(
            'title',
            [
                'en' => 'Grill',
                'hr' => 'Roštilj'
            ]
        );

    }
}
