<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Query;
use Illuminate\Support\Facades\Cache;

/**
 * Class QueriesController
 * Контроллер для просмотра поисковых запросов
 */
class QueriesController extends Controller
{
    /**
     * Страница поисковых запросов
     */
    public function queries()
    {
        $queries = Cache::tags(['queries', 'list'])
            ->remember('queries', env('CACHE_TIME', 0), function () {
                return Query::all();
            });

        return view('admin.section.queries', [
            'title' => 'Поисковые запросы',
            'queries' => $queries,
        ]);
    }
}
