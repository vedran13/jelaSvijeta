<?php

namespace App\Http\Controllers;

use App\Models\Meals;
use App\Models\Category;
use App\Http\Resources\MealResource;
use App\Http\Resources\MealCollection;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class MealsController extends Controller
{
    //
    public function index(Request $request){

        //Validacija polja "lang". U zadatku piše da je (required).
        //Ako ne postoji odabrani jezik ili je upisano nešto maje od dva slova u json formatu na izbacuje poruku
        //"The lang must be at least 2 characters."
        $validator = Validator::make($request->all(),[
                'lang'      => 'required|min:2',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        //Kupimo vrijedosti iz linka
        //http://127.0.0.1:8000/api/meals?per_page=1&category=6&tags=2&lang=hr&with=category&diff_time=1493902343&page=1
        $page         = (int)$request->input('page'); 
        $per_page     = (int)$request->input('per_page'); 
        $category_id  = (int)$request->input('category'); 
        $tags         = $request->input('tags'); 
        $lang         = $request->input('lang'); 
        $with         = $request->input('with'); 
        $diff_time    = (int)$request->input('diff_time'); 
      
        //Postavljamo odabrani jezik. Utječe na cijelu aplikaciju
        App::setLocale($lang);

        //Ako ne postoji odabrana stranica stavljamo defaultnu vrijednost 
        //1. Prvu stranicu
        if(empty($page)){
            $page = 1;
        }

        //Ako ne postoji odabrani broj jela po straici stavljamo defaultnu vrijednost 10
        if(empty($per_page)){
            $per_page = 10;
        }

        $meals = Meals::query();

        //Pretvaramo unix datum u human-readable i stavljamo ga u query 
        if($diff_time){
            $meals->where('created_at', '>=', Carbon::parse($diff_time));
            $meals->withTrashed();   
        }

        //Provjeravamo da li nam je proslijeden id kategorije kroz url i prema parametru 'category_id' filtriram jela
        if(!empty($category_id)){
            $meals->where('category_id', $category_id);
        }

        /*if(empty($category_id)){
            $meals->whereNotNull('category_id');
        }*/

        //Filter prema tagovima.
        if(!empty($tags)){

               $tags = explode(',', $tags);
                $meals->whereHas('tags',
                    function ($query) use ($tags) {
                        $query->whereIn('tag_id', $tags);
                    },
                    '>=',
                    count($tags)
                );
        }

       //Query na bazu podataka
       return MealResource::collection($meals->paginate($per_page)->withPath(url()->full())); 
        
    }
}