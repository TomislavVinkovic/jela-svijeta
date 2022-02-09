<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'slug' => 'fresh',
            'en' => ['title' => 'Fresh'],
            'hr' => ['title' => 'Svježe']
        ];
        Tag::create($data);

        $data = [
            'slug' => 'crusty',
            'en' => ['title' => 'Crusty'],
            'hr' => ['title' => 'Hrskavo']
        ];
        Tag::create($data);

        $data = [
            'slug' => 'yummy',
            'en' => ['title' => 'Yummy'],
            'hr' => ['title' => 'Slasno']
        ];

        Tag::create($data);

        $data = [
            'slug' => 'family',
            'en' => ['title' => 'Family'],
            'hr' => ['title' => 'Obitelj']
        ];

        Tag::create($data);

        $data = [
            'slug' => 'raw',
            'en' => ['title' => 'Raw'],
            'hr' => ['title' => 'Prijesno']
        ];

        Tag::create($data);
    }
}
