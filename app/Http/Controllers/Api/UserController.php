<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function UserRegister(UserStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $attributes = $request->validated();
        $user = User::create($attributes);
        return response()->json(['user' => $user]);
    }

    public function UserLogin(Request $request): \Illuminate\Http\JsonResponse
    {
        $attributes = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (auth()->guard('web')->attempt($attributes)) {
            $user = auth()->user();
            return response()->json(['message' => 'User Login Success', 'user' => $user]);
        }
    }

    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users]);
    }

    public function logout()
    {
        auth()->guard('web')->logout();
        return response()->json(['message' => 'User Logout Successful']);
    }
}
