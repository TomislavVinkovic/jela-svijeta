<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Meal;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $data = [
            'category_id' => 1,
            'en' => ['title' => 'Strawberry cake', 'description' => 'Fresh strawberry cake!'],
            'hr' => ['title' => 'Torta od jagoda', 'description' => 'Svježa torta od jagoda!']
        ];
        Meal::create($data);

        $data = [
            'category_id' => 1,
            'en' => ['title' => 'Gingerbreads', 'description' => 'Christmas gingerbreads!'],
            'hr' => ['title' => 'Medenjaci', 'description' => 'Božićni medenjaci!']
        ];
        Meal::create($data);

        $data = [
            'category_id' => 2,
            'en' => ['title' => 'Carrot soup', 'description' => 'A great appetizer!'],
            'hr' => ['title' => 'Juha od mrkve', 'description' => 'Odlično predjelo!']
        ];
        Meal::create($data);

        $data = [
            'category_id' => 3,
            'en' => ['title' => 'Catfish perkel', 'description' => 'Perfect river fish specialty!'],
            'hr' => ['title' => 'Perkel od soma', 'description' => 'Odličan riblji specijalitet!']
        ];
        Meal::create($data);

        $data = [
            'category_id' => 4,
            'en' => ['title' => 'Pasta with chicken and veggies', 'description' => 'Healthy and nutritious meal for every occasion!'],
            'hr' => ['title' => 'Tjestenina s piletinom i povrćem', 'description' => 'Zdravo i nutritivno jelo za svaku prigodu!']
        ];
        Meal::create($data);

        $data = [
            'category_id' => 5,
            'en' => ['title' => 'Beef steak with salad', 'description' => 'Protein filled meal, with salad to keep the mouth fresh!'],
            'hr' => ['title' => 'Goveđi odrezak sa salatom', 'description' => 'Proteinski pun obrok, sa salatom koja drži usta svježim!']
        ];
        Meal::create($data);

        $data = [
            'category_id' => 6,
            'en' => ['title' => 'Grilled meat plate', 'description' => 'Grilled meat plate for 4 people.'],
            'hr' => ['title' => 'Pladanj mesa s roštilja', 'description' => 'Pladanj mesa s roštilja za 4 osobe.']
        ];
        Meal::create($data);

    }
}
