<?php

namespace App\Http\Controllers\Admin;

use App\Models\Action;
use App\Models\User;
use App\Models\Brand;
use App\Models\VkFeed;
use App\Http\Controllers\Controller;

/**
 * Class AdminController
 * Базовый контроллер для контроллеров админ-панели
 */
class AdminController extends Controller
{

    /**
     * Панель управления, главная страница в админке
     */
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

    /**
     * Страница логов парсера
     */
    public function logs()
    {
        return view('admin.section.logs', [
            'title' => 'Логи парсера',
        ]);
    }

    /**
     * Страница поисковых запросов
     */
    public function queries()
    {
        return view('admin.section.queries', [
            'title' => 'Поисковые запросы',
        ]);
    }
}
