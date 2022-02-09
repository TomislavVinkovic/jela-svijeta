<?php

namespace App\Http\Repositories;

use App\Models\Meal;
use Carbon\Carbon;

//repository class that controls database operations and querying for this object
class MealRepository {

    private static function getResponseWithOptionalParameters($meals, $with, $diff_time) {
        $meals_viewable = []; //a collection that will be returned as the data segment of the response
        $i = 0;
        //we save all the meals from the query in the array.
        //we also save any additional info that is specified in the with parameter
        foreach($meals as $meal) {
            $meals_viewable[] = $meal->getTranslation(); //getTranslation prevodi objekt u jezik koji je postavljen na serveru
            //according to diff_time, what is the current state of the row in the database?
            if($diff_time === null) {
                $meals_viewable[$i]['status'] = 'created';
            }
            else {
                $comp_values = array_map('intval', 
                    [
                        'created_at' => strtotime($meal->created_at), 
                        'updated_at' => strtotime($meal->updated_at), 
                        'deleted_at' => strtotime($meal->deleted_at)
                    ]
                );
                $max_key = array_keys($comp_values, max($comp_values))[0];
                if($max_key == 'created_at') {
                    $meals_viewable[$i]['status'] = 'created';
                }
                else if($max_key == 'updated_at' && $comp_values['updated_at'] !== $comp_values['deleted_at']) {
                    $meals_viewable[$i]['status'] = 'updated';
                }
                else {
                    $meals_viewable[$i]['status'] = 'deleted';
                }
            }

            //filling the response with additional data
            if(in_array('category', $with)) {
                $category = $meal->category->translateOrDefault();
                $meals_viewable[$i]['category'] = $category;
            }
            if(in_array('tags', $with)) {
                $tags = $meal->tags;
                $ts = [];
                foreach($tags as $tag){
                    $t = $tag->translateOrDefault();
                    array_push($ts, $t);
                }
                $meals_viewable[$i]['tags'] = $ts;
            }
            if(in_array('ingredients', $with)) {
                $ingredients = $meal->ingredients;
                $is = [];
                foreach($ingredients as $ingredient){
                    $ing = $ingredient->translateOrDefault();
                    array_push($is, $ing);
                }
                $meals_viewable[$i]['ingredients'] = $is;
            }

            $i += 1;
        }

        return $meals_viewable;
    }

    public static function getMeals($filterParams) {

        $q = (new Meal)->newQuery();

        if($filterParams['diff_time'] !== null) {
            $diff_time = Carbon::parse((int)$filterParams['diff_time']);
            $q->where(function($query) use ($diff_time) {
                $query->where('created_at', '>=', $diff_time)
                      ->orWhere('updated_at', '>=', $diff_time)
                      ->orWhere('deleted_at', '>=', $diff_time);
            })->withTrashed();
        }
        else $diff_time = null;

        //Filtering according to tags, if they are specified
        if($filterParams['tags'] !== null) {
            $tags = array_map('intval', explode(',', $filterParams['tags']));
            $q->whereHas('tags', 
                function($qu) use ($tags){
                    $qu->whereIn('tag_id', $tags);
                }, '>=', count($tags)
            );
        }

        // A category value, if it exists, can be NULL, !NULL or an id
        if($filterParams['category'] !== null) {
            if($filterParams['category'] === 'NULL') {
                $q->whereNull('category_id');
            }
            if($filterParams['category'] === '!NULL') {
                $q->whereNotNull('category_id');
            }
            else {
                $category = $filterParams['category'];
                $q->where('category_id', $category);
            }
        }

        $total_items = $q->count();
        
        //pagination
        if($filterParams['page'] === null) $page = 1;
        else $page = intval($filterParams['page']);

        if($filterParams['per_page'] === null) $per_page = 5;
        else $per_page = intval($filterParams['per_page']);
        $q->paginate($per_page);

        if($filterParams['with'] === null) $with = [];
        else $with = explode(',', $filterParams['with']);

        $meals = $q->get();

        //preparing the data for the response
        $data = self::getResponseWithOptionalParameters($meals, $with, $diff_time);
        $meta = [
            'currentPage' => $page,
            'totalItems' => $total_items,
            'itemsPerPage' => $per_page,
            'totalPages' => ceil($total_items / $per_page)
        ];

        $content = [
            'meta' => $meta,
            'data' => $data
        ];

        return $content;
    }
}