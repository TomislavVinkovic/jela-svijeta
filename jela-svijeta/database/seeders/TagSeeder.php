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
        Tag::create(['slug' => 'fresh'])::saveTranslations(
            'title',
            [
                'en' => 'Fresh',
                'hr' => 'Svježe'
            ]
        );

        Tag::create(['slug' => 'crusty'])::saveTranslations(
            'title',
            [
                'en' => 'Crusty',
                'hr' => 'Hrskavo'
            ]
        );

        Tag::create(['slug' => 'yummy'])::saveTranslations(
            'title',
            [
                'en' => 'Yummy',
                'hr' => 'Slasno'
            ]
        );

        Tag::create(['slug' => 'family'])::saveTranslations(
            'title',
            [
                'en' => 'Family',
                'hr' => 'Obitelj'
            ]
        );

        Tag::create(['slug' => 'raw'])::saveTranslations(
            'title',
            [
                'en' => 'Raw',
                'hr' => 'Prijesno'
            ]
        );
    }
}
