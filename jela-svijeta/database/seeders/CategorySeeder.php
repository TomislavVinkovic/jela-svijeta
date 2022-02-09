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
        $data = [
                'slug' => 'sweets',
                'en' => ['title' => 'Sweets'],
                'hr' => ['title' => 'Slastice'],

        ];
        Category::create($data);
        
        $data = [
                'slug' => 'soups',
                'en' => ['title' => 'Soups'],
                'hr' => ['title' => 'Juhe'],

        ];
        Category::create($data);

        $data = [
                'slug' => 'fish',
                'en' => ['title' => 'Fish'],
                'hr' => ['title' => 'Riba'],

        ];
        Category::create($data);

        $data = [
                'slug' => 'pastas',
                'en' => ['title' => 'Pastas'],
                'hr' => ['title' => 'Tjestenine'],

        ];
        Category::create($data);

        $data = [
                'slug' => 'meatandveggies',
                'en' => ['title' => 'Meals with meat and vegetables'],
                'hr' => ['title' => 'Jela s mesom i povrćem'],

        ];
        Category::create($data);

        $data = [
                'slug' => 'grill',
                'en' => ['title' => 'Grill'],
                'hr' => ['title' => 'Roštilj'],

        ];

        Category::create($data);

    }
}
