<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddFilmRequest;
use App\Models\Ganre;
use App\Models\Movie;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function addFilm(AddFilmRequest $request)
    {
    //
    }
    public function getFilms(){
//        $cinemas = Movie::all();
//
//        foreach ($cinemas as $cinema){
//         $cinema->actors;
//         $cinema->ganres;
//        }

        $cinemas = Movie::all([]);
        return response()->json([
            "status" => true,
            "Films" => $cinemas,

        ])->setStatusCode(200);
    }

    public function getGanre(){
        $ganre = Ganre::all();
        return response()->json([
            "status" => true,
            "Categories" => $ganre,

        ])->setStatusCode(200);
    }

    public function searchFilms($request){
        if($request->search_request){
//            $query = "SELECT * FROM `movies` WHERE `id` = ".$request->search_request;
            $cinemas = Movie::all();
            return response()->json([
                "status" => true,
                "Films" => $cinemas,

            ])->setStatusCode(200);
        }elseif ($request->category_id){

        }
    }
}
