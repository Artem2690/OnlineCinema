<?php

namespace App\Http\Middleware;


use App\Models\User;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Exceptions\HttpResponseException;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
//    protected function redirectTo($request)
//    {
//        if (! $request->expectsJson()) {
//            return route('login');
//        }
//    }

    protected function authenticate($request, array $guards)
    {
        $token = $request->bearerToken();
        $user = User::where('api_token', $token)->first();
        if (!$user){
            throw new HttpResponseException(response()->json([
            "status" => false,
            "massage" => 'Unauthorized'
        ],403));
        }
    }
}
