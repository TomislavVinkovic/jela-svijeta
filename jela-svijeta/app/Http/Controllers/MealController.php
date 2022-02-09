<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\App;
use App\Http\Repositories\MealRepository;
use App\Http\Requests\MealGetRequest;
//use App\Http\Requests\ViewRequest;
//use Illuminate\Http\Request;
//use App\Models\Meal;

class MealController extends Controller
{
    
    /*
    public function index(ViewRequest $request) {
        //This function returns a react view
        //The validation object checks the request for a language
        //If a language is not found, it sets english ash the defauult language and it redirects the user back
        $validated = $request->validated();
        App::setLocale($request->query('lang'));
        return view('meals.index');
        
    }
    */

    //a function i created for myself to test soft deletes
    /*
    public function softDelete(Request $request) {
        $meal = Meal::orderBy('id', 'ASC')->first();
        $meal->delete();
        return response()->json([
            'status' => 'deleted'
        ]);
    }
    */
    

    public function meals(MealGetRequest $request) {
        //Validation of response parameters
        $validated = $request->validated();
        App::setLocale($request->query('lang'));
        
        try {
            //parameters from the request that are used to filter objects
            $filterParams = [
                'category' => $request->query('category'),
                'tags' => $request->query('tags'),
                'diff_time' => $request->query('diff_time'),
                'per_page' => $request->query('per_page'),
                'page' => $request->query('page'),
                'with' => $request->query('with')
            ];
            $response = MealRepository::getMeals($filterParams);
    
            return response()->json($response);
        } catch (Exception $e) {
            //Throw an exception if something in the code goes wrong and return it as a json. Useful for debugging
            return response()->json([
                'Exception' => $e->getMessage()
            ]);
        }
    }
}