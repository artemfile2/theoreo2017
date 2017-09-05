<?php

namespace App\Http\Controllers\Admin;

use App\Models\Action;
use App\Models\User;
use App\Models\Brand;
use App\Models\VkFeed;
use App\Models\Query;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

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
        $users = Cache::tags(['users', 'list'])
            ->remember('users', env('CACHE_TIME', 0), function () {
                return  User::all();
            });

        $brands = Cache::tags(['brands', 'list'])
            ->remember('brands', env('CACHE_TIME', 0), function () {
                return  Brand::all();
            });

        $actions = Cache::tags(['actions', 'list'])
            ->remember('actions', env('CACHE_TIME', 0), function () {
                return  Action::all();
            });

        $queries = Cache::tags(['queries', 'list'])
            ->remember('queries', env('CACHE_TIME', 0), function () {
                return  Query::all();
            });

        $vkfeeds = VkFeed::all();

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
