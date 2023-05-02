<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Авторизация пользователя через API
     * @param LoginUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function login(LoginUserRequest $request){

        /*
         * Поиск пользователя с заданным логином
         */

        $user = User::where('login', $request->login)->first();

        /*
         * Проверка на существование пользователя с заданным логином
         * Проверка на соответствие паролей
         */

        if ($user && Hash::check($request->password, $user->password)){

            /*
             * Формирование токена для авторизирующегося ползователя
             */
            $user->api_token = Str::random(200);
            $user->save();

            /*
             * Возврат ответа JSON в случает успешной авторизации.
             * Возвращается статус true и данные авторизированного пользователя
             */

            return response()
                ->json([
                    "status" => true,
                    "user" => $user
                ])
                ->setStatusCode(200, "Authenticated");
        } else {

            /*
             * Возврат ответа JSON в случает неудачной авторизации.
             * Возвращается статус false
             */

            return response()
                ->json([
                    "status" => false
                ],401);
        }
    }
}
