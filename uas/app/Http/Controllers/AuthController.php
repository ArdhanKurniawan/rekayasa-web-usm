<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    // ================= REGISTER =================
    public function register(Request $req)
    {
        // Custom validation supaya tidak redirect ke HTML
        $validator = Validator::make($req->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);
    }

    // ================= LOGIN =================
    public function login(Request $req)
    {
        // Validasi input login
        $validator = Validator::make($req->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Cek kredensial
        if (!Auth::attempt($req->only('email', 'password'))) {
            return response()->json([
                'status' => false,
                'message' => 'Email or password incorrect'
            ], 401);
        }

        $user = Auth::user();

        // Generate Sanctum Token
        $token = $user->createToken('token-api')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login success',
            'token' => $token,
            'user' => $user
        ], 200);
    }

    // ================= LOGOUT =================
    public function logout(Request $req)
    {
        $req->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logout success'
        ]);
    }
}
