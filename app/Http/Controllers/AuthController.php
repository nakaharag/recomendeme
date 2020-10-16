<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller 
{
    public function register(Request $request){

        $this->validate($request, [
            'nome' => 'required|string',
            'email' => 'required|email|unique:users',
            'senha' => 'required',
        ]);

        try {

            $user = new User;
            $user->nome = $request->input('nome');
            $user->email = $request->input('email');
            $passwordNormal = $request->input('senha');
            $user->password = app('hash')->make($passwordNormal);
            $user->save();

            //return successful response
            return response()->json(['user' => $user, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'Falha no registro'], 409);
        }
    }

    public function token(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(
            [
                'email',
                'password'
            ]
        );
        
        try {
            if (! $token = Auth::attempt($credentials)) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], 500);

        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent' => $e->getMessage()], 500);

        }

        return $this->respondWithToken($token);
    }

    // public function dropUser(){
    //     CreateUsersTable::drop('users');
    // }
}


