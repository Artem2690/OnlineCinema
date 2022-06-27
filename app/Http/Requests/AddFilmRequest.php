<?php

namespace App\Http\Requests;


class AddFilmRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "movie_name" => ["required"],
            "movie_type" => ["required"],
            "ganre" => ["required"],
            "country" => ["required"],
            "raiting" => ["required"],
            "releaseDate" => ["required"],
            "movie_description" => ["required"],
            "image" => ["required"],
            "Trailer" => ["required"],
            "movie" => ["required"]
        ];
    }
}
