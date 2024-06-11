<?php

namespace App\Http\Controllers;

use App\Http\Resources\DetailUserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            return response()->json([
                'message' => 'Anda Berhasil Login!',
                'token' => $user->createToken('user login')->plainTextToken
            ]);
        } else {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect'
            ]);
        }
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'alpha_num', 'min:5', 'max:50'],
            'email' => ['required', 'email', 'max:50', 'min:4', 'unique:users,email'],
            'password' => ['required', 'min:6']
        ]);

        $user = User::create($request->all());

        return new DetailUserResource($user);
    }


    public function logout()
    {

        auth()->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Anda telah keluar'
        ]);
    }
}
