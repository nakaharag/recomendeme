<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller 
{
    public function register(Request $request){
        $this->validate($request, [
            'nome' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        try {

            $user = new User;
            $user->nome = $request->input('nome');
            $user->email = $request->input('email');
            $passwordNormal = $request->input('password');
            $user->password = app('hash')->make($passwordNormal);

            $user->save();

            //return successful response
            return response()->json(['user' => $user->nome, 'message' => 'CREATED'], 201);

        } catch (\Exception $e) {
            //return error message
            return response()->json(['message' => 'Falha no registro'], 409);
        }
    }
}

