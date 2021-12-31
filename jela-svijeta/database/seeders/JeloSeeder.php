<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Jelo;

class JeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Jelo::create(['category_id' => 1])::saveTranslations(
            ['title', 'description'],
            [
                'en' => 'Strawberry cake',
                'hr' => 'Torta od jagoda'
            ],
            [
                'en' => 'Strawberry cake for every family event!',
                'hr' => 'Torta od jagoda za svaki obiteljski događaj!'
            ]
        );

        Jelo::create(['category_id' => 1])::saveTranslations(
            ['title', 'description'],
            [
                'en' => 'Gingerbread',
                'hr' => 'Medenjaci'
            ],
            [
                'en' => 'Christmas gingerbread',
                'hr' => 'Božićni medenjaci'
            ]
        );

        Jelo::create(['category_id' => 2])::saveTranslations(
            ['title', 'description'],
            [
                'en' => 'Carrot soup',
                'hr' => 'Juha od mrkve'
            ],
            [
                'en' => 'A great appetizer!',
                'hr' => 'Odlično predjelo!'
            ]
        );

        Jelo::create(['category_id' => 3])::saveTranslations(
            ['title', 'description'],
            [
                'en' => 'Catfish perkel',
                'hr' => 'Perkel od soma'
            ],
            [
                'en' => 'Perfect river fish specialty!',
                'hr' => 'Odličan riblji specijalitet!'
            ]
        );

        Jelo::create(['category_id' => 4])::saveTranslations(
            ['title', 'description'],
            [
                'en' => 'Pasta with chicken and veggies',
                'hr' => 'Tjestenina s piletinom i povrćem'
            ],
            [
                'en' => 'Healthy and nutritious meal for every occasion!',
                'hr' => 'Zdravo i nutritivno jelo za svaku prigodu!'
            ]
        );

        Jelo::create(['category_id' => 5])::saveTranslations(
            ['title', 'description'],
            [
                'en' => 'Beef steak with salad',
                'hr' => 'Goveđi odrezak sa salatom'
            ],
            [
                'en' => 'Protein filled meal, with salad to keep the mouth fresh!',
                'hr' => 'Proteinski pun obrok, sa salatom koja drži usta svježim!'
            ]
        );

        Jelo::create(['category_id' => 6])::saveTranslations(
            ['title', 'description'],
            [
                'en' => 'Grilled meat plate',
                'hr' => 'Pladanj mesa s roštilja'
            ],
            [
                'en' => 'Grilled meat plate for 4 people.',
                'hr' => 'Pladanj mesa s roštilja za 4 osobe'
            ]
        );

    }
}
