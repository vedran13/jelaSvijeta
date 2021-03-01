<?php

namespace App\Http\Controllers;

use App\Http\Resources\MealCollection;
use App\Models\Meals;
use App\Http\Requests\UrlPostRequest;
use App\Classes\MealsFilter1;
use App;
use Carbon\Carbon;

class MealsController extends Controller
{
    public function index(UrlPostRequest $request)
    {
        return  MealCollection::make($this->filter($request));
    }
    
    public function filter($urlParameters)
    {
        //Kupimo vrijedosti iz linka
        $page        = (int)$urlParameters->input('page');
        $perPage     = (int)$urlParameters->input('per_page');
        $tags        = $urlParameters->input('tags');
        $categoryId  = $urlParameters->input('category');
        $diffTime    = (int)$urlParameters->input('diff_time');
        $with        = $urlParameters->input('with');

        //Postavljamo jezik
        App::setLocale($urlParameters->input('lang'));

    
        $meals = Meals::query();

        //Pretvaramo unix datum u human-readable i stavljamo ga u query
        //dodajemo softDeletes u Query
        if ($diffTime) {
            $meals->where('created_at', '>=', Carbon::parse($diffTime));
            $meals->withTrashed();
        }

        //Filter prema kategorijama
        if ($categoryId == "NULL") {
            $meals->whereNull('category_id');
        } elseif ($categoryId == "!NULL") {
            $meals->whereNotNull('category_id');
        } elseif ($categoryId) {
            $meals->where('category_id', $categoryId);
        }

        //Filter prema tagovima.
        if (!empty($tags)) {
               $tags = explode(',', $tags);
                $meals->whereHas(
                    'tags',
                    function ($query) use ($tags) {
                        $query->whereIn('tag_id', $tags);
                    },
                    '>=',
                    count($tags)
                );
        }

       //Query na bazu podataka
        return $meals->paginate($perPage == 0 ? 10 : $perPage)->withPath(url()->full());
    }
}
