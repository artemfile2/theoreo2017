<?php

namespace App\Http\Controllers\Admin;

use App\Models\Action;
use App\Models\User;
use App\Models\Brand;
use App\Models\VkFeed;
use App\Models\Query;
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
        $queries = Query::all();

        return view('admin.section.control_panel', [
            'title' => 'Панель управления',
            'users' => $users,
            'brands' => $brands,
            'actions' => $actions,
            'vkfeeds' => $vkfeeds,
            'queries' => $queries,
        ]);
    }


    /**
     * Страница логов парсера
     */
    public function logs()
    {
        return view('admin.section.logs', [
            'title' => 'Поисковые запросы',
        ]);
    }
}
