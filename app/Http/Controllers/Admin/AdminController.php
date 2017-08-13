<?php

namespace App\Http\Controllers\Admin;

use App\Models\Action;
use App\Models\User;
use App\Models\Brand;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    /*
     * панель управления, главная страница в админке*/
    public function index()
    {
        $users = User::all()
            ->sortByDesc('created_at');

        $brands = Brand::all()
            ->sortByDesc('created_at');

        $actions = Action::all()
            ->sortByDesc('created_at');

        return view('admin.section.control_panel', [
            'title' => 'Панель управления',
            'users' => $users,
            'brands' => $brands,
            'actions' => $actions,
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
