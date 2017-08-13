<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function auth()
    {
        return view('auth.auth', [
            'title' => 'Аутентификация пользователя'
        ]);
    }

    public function login()
    {
        return view('auth.login', [
            'title' => 'Вход'
        ]);
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Регистрация'
        ]);
    }

    public function request()
    {
        return view('auth.passwords.reset', [
            'title' => 'Восстановление'
        ]);
    }
}
