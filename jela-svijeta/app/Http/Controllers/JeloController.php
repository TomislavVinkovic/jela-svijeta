<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJeloRequest;
use App\Http\Requests\UpdateJeloRequest;
use Illuminate\Http\Request;
use App\Models\Jelo;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Tag;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;

class JeloController extends Controller
{   

    protected function getJelaFromQuery($q) {
        $jela = $q->get();
        $jela_viewable = [];
        $i = 0;
        foreach($jela as $jelo){
            $category = $jelo->category->getTranslation();
            $tags = $jelo->tags;
            foreach($tags as $tag){
                $tag->getTranslation();
            }

            $ingredients = $jelo->ingredients;
            foreach($ingredients as $ingredient){
                $ingredient->getTranslation();
            }
            $jela_viewable[] = $jelo->getTranslation();
            $jela_viewable[$i]["category"] = $category;
            $jela_viewable[$i]["tags"] = $tags;
            $jela_viewable[$i]["ingredients"] = $ingredients;
            $i += 1;
        }
        return $jela_viewable;
    }

    public function getParams(Request $request) {
        $lang = $request->query('lang');
        if ($lang === null) App::setLocale('en');
        else App::setLocale($lang);

        $kategorije = Category::get();
        $tags = Tag::get();
        $ingredients = Ingredient::get();

        
        $kategorije_viewable = [];
        $tags_viewable = [];
        $ingredients_viewable = [];

        foreach($kategorije as $kategorija){
            $kategorije_viewable[] = $kategorija->getTranslation();
        }

        foreach($tags as $tag){
            $tags_viewable[] = $tag->getTranslation();
        }

        foreach($ingredients as $ingredient){
            $ingredients_viewable[] = $ingredient->getTranslation();
        }

        $content = [
            'categories' => $kategorije_viewable,
            'tags' => $tags_viewable,
            'ingredients' => $ingredients_viewable,
            'error' => null
        ];

        return response()->json([
            $content
        ]);

    }
    
    public function getJela(Request $request) {

        $lang = $request->query('lang');
        if ($lang === null) App::setLocale('en');
        else App::setLocale($lang);
        
        $perpage = $request->query('perpage');
        if($perpage == null) {
            $perpage=5;
        } 

        $jela = Jelo::paginate($perpage);
        
        $i = 0;

        foreach($jela as $jelo){
            $category = $jelo->category->getTranslation();
            $tags = $jelo->tags;
            foreach($tags as $tag){
                $tag->getTranslation();
            }

            $ingredients = $jelo->ingredients;
            foreach($ingredients as $ingredient){
                $ingredient->getTranslation();
            }

            $jela_viewable[] = $jelo->getTranslation();
            $jela_viewable[$i]["category"] = $category;
            $jela_viewable[$i]["tags"] = $tags;
            $jela_viewable[$i]["ingredients"] = $ingredients;
            $i += 1;
        }

        $content = [
            'jela' => $jela_viewable,
            'error' => null
        ];

        
        return response()->json([
            $content
        ]);
        
    }
    
    public function index(Request $request) {   
        $lang = $request->query('lang');
        if ($lang === null) App::setLocale('eng');
        else App::setLocale($lang);

        return view('jela.index');
    }

    public function getJelaFiltered(Request $request) {

        $lang = $request->query('lang');
        if ($lang === null) App::setLocale('en');
        else App::setLocale($lang);

        $perpage = $request->query('perpage');
        if($perpage == null) $perpage = 5;


        $q = Jelo::query();

        try{
            if($request->query('category') !== null){
                $category = $request->query('category');
                $q->where('category_id', $category);
            }
    
            if($request->query('tags') !== null){
                $tag_list = array_map('intval', explode(',', $request->query('tags')));
                $q->whereHas('tags', function($qu) use ($tag_list){
                    $qu->whereIn('tag_id', $tag_list);
                });
            }
            
            if($request->query('ingredients') !== null){
                $ingredient_list = array_map('intval', explode(',', $request->query('ingredients')));
                $q->whereHas('ingredients', function($qu) use ($ingredient_list){
                    $qu->whereIn('ingredient_id', $ingredient_list);
                });
            }

            if($request->query('diff_time') !== null){
                $date = Carbon::createFromTimestamp($request->query('diff_time'))->format('y-m-d');
                $q->where('updated_at', '>', $date)->orWhere('created_at', '>', $date)->orWhere('deleted_at', '>', $date);
                $jela = $q->get();
                dd($jela);

            }
            
            $q->paginate($perpage);
    
            $jela_viewable = $this->getJelaFromQuery($q);
            $content = [
                'jela' => $jela_viewable,
                'error' => null
            ];
    
            return response()->json([
                $content
            ]);
        }catch(Exception $e){
            throw $e;
        }
        
    }

    
    public function show(Jelo $jelo)
    {
        return response()->json([
            'message' => "Hello from the show method!"
        ]);
    }
}
