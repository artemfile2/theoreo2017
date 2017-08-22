<?php

namespace App\Http\Controllers\Admin;

use App\Models\Action;
use App\Models\User;
use App\Models\Brand;
use App\Models\VkFeed;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    /*
     * панель управления, главная страница в админке*/
    public function index()
    {
        $users = User::all();
        $brands = Brand::all();
        $actions = Action::all();
        $vkfeeds = VkFeed::all();

        return view('admin.section.control_panel', [
            'title' => 'Панель управления',
            'users' => $users,
            'brands' => $brands,
            'actions' => $actions,
            'vkfeeds' => $vkfeeds,
        ]);
    }

    /*
     * открывает страницу Компании/Бренда*/
    public function brands()
    {
        return view('admin.section.brands', [
            'title' => 'Компании',
        ]);
    }

    /*
     * открывает страницу Акции*/
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

    /*
    * открывает страницу Контента*/
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
