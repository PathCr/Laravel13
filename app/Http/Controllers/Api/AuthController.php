<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $user = User::create($validated);
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
   }

   public function login(Request $request)
   {
       $validated = $request->validate([
           'email' => 'required|email',
           'password' => 'required'
       ]);

       if (!Auth::attempt($validated))
       {
            return response()->json(['message' => 'Неверный email или пароль'], 401);
       }

       $user = Auth::user();
       $token = $user->createToken('api-token')->plainTextToken;

       return response()->json([
           'user' => $user,
           'token' => $token,
       ]);
   }
}
