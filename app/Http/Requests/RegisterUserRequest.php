<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class RegisterUserRequest extends ApiRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_name" => ["required"],
            "last_name" => ["required"],
            "login" => ["required","unique:users"],
            "email" => ["required","email","unique:users"],
            "birthday" => ["required"],
            "password" => ["required", "min:8"],
        ];
    }
}
