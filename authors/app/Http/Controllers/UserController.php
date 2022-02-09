<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:auth', ['except' => ['login']]);
    // }

    public function register(Request $request)
    {

        $name= $request->input('name');
        $email= $request->input('email');
        $password= Hash::make($request->input('password'));

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
         ]);

        $token = auth('user')->login($user);
        return $this->respondWithToken($token);
    }



    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth('user')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }


    public function logout()
    {
        auth('user')->logout();

        return response()->json(['message' => 'Successfully signed out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('user')->factory()->getTTL() * 60,
            'user_id'      => auth('user')->user()->name
        ]);
    }
}
