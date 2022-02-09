<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meal;
use App\Models\Ingredient;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class RelationalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //meal and ingredient relationships
        DB::table('meal_has_ingredient')->insert(
            [
                'meal_id' => 1,
                'ingredient_id' => 2
            ]
        );

        DB::table('meal_has_ingredient')->insert(
            [
                'meal_id' => 1,
                'ingredient_id' => 3
            ]
        );
        DB::table('meal_has_ingredient')->insert(
            [
                'meal_id' => 1,
                'ingredient_id' => 4
            ]
        );

        //
        DB::table('meal_has_ingredient')->insert(
            [
                'meal_id' => 2,
                'ingredient_id' => 3
            ]
        );
        DB::table('meal_has_ingredient')->insert(
            [
                'meal_id' => 2,
                'ingredient_id' => 4
            ]
        );

        //
        DB::table('meal_has_ingredient')->insert(
            [
                'meal_id' => 3,
                'ingredient_id' => 1
            ]
        );
        DB::table('meal_has_ingredient')->insert(
            [
                'meal_id' => 3,
                'ingredient_id' => 6
            ]
        );

        //
        DB::table('meal_has_ingredient')->insert(
            [
                'meal_id' => 4,
                'ingredient_id' => 8
            ]
        );
        DB::table('meal_has_ingredient')->insert(
            [
                'meal_id' => 4,
                'ingredient_id' => 6
            ]
        );

        //
        DB::table('meal_has_ingredient')->insert(
            [
                'meal_id' => 5,
                'ingredient_id' => 9
            ]
        );
        DB::table('meal_has_ingredient')->insert(
            [
                'meal_id' => 5,
                'ingredient_id' => 7
            ]
        );

        //
        DB::table('meal_has_ingredient')->insert(
            [
                'meal_id' => 6,
                'ingredient_id' => 5
            ]
        );
        DB::table('meal_has_ingredient')->insert(
            [
                'meal_id' => 6,
                'ingredient_id' => 7
            ]
        );

        //
        DB::table('meal_has_ingredient')->insert(
            [
                'meal_id' => 7,
                'ingredient_id' => 5
            ]
        );
        DB::table('meal_has_ingredient')->insert(
            [
                'meal_id' => 7,
                'ingredient_id' => 7
            ]
        );

        //meals and tags
        DB::table('meal_has_tag')->insert(
            [
                'meal_id' => 1,
                'tag_id' => 1
            ]
        );
        DB::table('meal_has_tag')->insert(
            [
                'meal_id' => 1,
                'tag_id' => 3
            ]
        );

        //
        DB::table('meal_has_tag')->insert(
            [
                'meal_id' => 2,
                'tag_id' => 1
            ]
        );
        DB::table('meal_has_tag')->insert(
            [
                'meal_id' => 2,
                'tag_id' => 3
            ]
        );

        //
        DB::table('meal_has_tag')->insert(
            [
                'meal_id' => 3,
                'tag_id' => 4
            ]
        );

        //
        DB::table('meal_has_tag')->insert(
            [
                'meal_id' => 4,
                'tag_id' => 3
            ]
        );
        DB::table('meal_has_tag')->insert(
            [
                'meal_id' => 4,
                'tag_id' => 4
            ]
        );

        //
        DB::table('meal_has_tag')->insert(
            [
                'meal_id' => 5,
                'tag_id' => 3
            ]
        );
        DB::table('meal_has_tag')->insert(
            [
                'meal_id' => 5,
                'tag_id' => 4
            ]
        );

        //
        DB::table('meal_has_tag')->insert(
            [
                'meal_id' => 6,
                'tag_id' => 2
            ]
        );
        DB::table('meal_has_tag')->insert(
            [
                'meal_id' => 6,
                'tag_id' => 3
            ]
        );
        DB::table('meal_has_tag')->insert(
            [
                'meal_id' => 6,
                'tag_id' => 4
            ]
        );

        //
        DB::table('meal_has_tag')->insert(
            [
                'meal_id' => 7,
                'tag_id' => 2
            ]
        );
        DB::table('meal_has_tag')->insert(
            [
                'meal_id' => 7,
                'tag_id' => 3
            ]
        );
        DB::table('meal_has_tag')->insert(
            [
                'meal_id' => 7,
                'tag_id' => 4
            ]
        );
    }
}
