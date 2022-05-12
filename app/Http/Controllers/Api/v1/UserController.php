<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Реєстрація користувача через API
     * @param RegisterUserRequest $request
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function register(RegisterUserRequest $request)
    {
        User::create(
            [
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "login" => $request->login,
                "email" => $request->email,
                "birthday" => $request->birthday,
                "password" => Hash::make($request->password)
            ]
        );

        return response()->json(['status'=>true])->setStatusCode(201,'Account registered');
    }
}
