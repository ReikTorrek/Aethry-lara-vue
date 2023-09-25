<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|',
            'email' => 'required|email|',
            'password' => 'required|min:6',
        ]);

        // Проверка наличия пользователя с таким логином
        $existingUser = User::where('name', $request->input('name'))->first();
        if ($existingUser) {
            return response()->json(['error' => 'Пользователь с таким логином уже существует'], 409);
        }

        // Проверка наличия пользователя с такой почтой
        $existingEmail = User::where('email', $request->input('email'))->first();
        if ($existingEmail) {
            return response()->json(['error' => 'Пользователь с такой почтой уже существует'], 409);
        }


        // Создание нового пользователя
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return response()->json(['message' => 'Пользователь успешно зарегистрирован']);
    }
}
