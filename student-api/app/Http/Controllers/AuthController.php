<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $input = [
            'name' => $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];
        $user = User::create($input);
        $data = [
            'message' => 'Berhasil mendaftar',
            'data' => $user
        ];
        return response()->json($data, 201);
    }
    public function login(Request $request)
    {
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];
    
        if (Auth::attempt($input)) {
            $token = Auth::user()->createToken('auth_token')->plainTextToken;
            $data = [
                'message' => 'Berhasil login',
                'token' => $token
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Email atau password salah',
            ];
            return response()->json($data, 401);
        }
    }
    
}
