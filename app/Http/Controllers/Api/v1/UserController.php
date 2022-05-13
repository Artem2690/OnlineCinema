<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequset;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /**
     * Реєстрація користувача через API
     * @param RegisterUserRequest $request
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function register(RegisterUserRequest $request)
    {
        /*
         * Додавання користувача до бд
         */

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

        /*
         * Повернення відповіді
         */

        return response()->json(['status' => true])->setStatusCode(201, 'Account registered');
    }

    /**
     * Авторизація користувача через API
     * @param LoginUserRequset $requset
     * @return \Illuminate\Http\JsonResponse|object
     */
    public function login(LoginUserRequset $requset)
    {
        $user = User::where('login', $requset->login)->first();
        /*
         * Перевірка чи існує користувач та чи співпадає пароль
         */
        if ($user && Hash::check($requset->password, $user->password)) {

            /*
             * Додаємо новий токен авторизованому користувачеві
             */

            $user->api_token = Str::random(200);
            $user->save();
            return response()
                ->json([
                    "status" => true,
                    "user" => $user
                ])
                ->setStatusCode(200, "Authenticated");
        } else {
            return response()
                ->json([
                    "status" => false
                ], 401);
        }
    }
}
