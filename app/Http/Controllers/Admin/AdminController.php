<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.section.control_panel', [
            'title' => 'Панель управления',
        ]);
    }

    public function users()
    {
        $users = User::all()
                    ->sortByDesc('created_at');

        return view('admin.section.users', [
            'title' => 'Пользователи',
            'users' => $users,
        ]);
    }

    public function userCreate()
    {
        return view('admin.section.user_create', [
            'title' => 'Создание пользователя',
        ]);
    }

    public function brands()
    {
        return view('admin.section.brands', [
            'title' => 'Компании',
        ]);
    }

    public function actions()
    {
        return view('admin.section.actions', [
            'title' => 'Акции',
        ]);
    }

/*    public function comments()
    {
        return view('admin.section.comments', [
            'title' => 'Комментарии',
        ]);
    }*/

    public function content()
    {
        return view('admin.section.moderation', [
            'title' => 'Контент',
        ]);
    }

    public function logs()
    {
        return view('admin.section.logs', [
            'title' => 'Логи парсера',
        ]);
    }

    public function queries()
    {
        return view('admin.section.queries', [
            'title' => 'Поисковые запросы',
        ]);
    }
}
