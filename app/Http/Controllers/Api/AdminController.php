<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminLogin(Request $request): JsonResponse
    {
        $attributes = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if (auth()->guard('admin')->attempt($attributes)) {
            $admin = auth()->user();
            return response()->json(['message' => 'Admin Login', 'admin' => $attributes]);
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return response()->json(['message' => 'Admin Logout Successful']);
    }
}
