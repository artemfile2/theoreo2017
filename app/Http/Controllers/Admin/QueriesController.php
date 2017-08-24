<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Query;

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
        $queries = Query::all();

        return view('admin.section.queries', [
            'title' => 'Поисковые запросы',
            'queries' => $queries,
        ]);
    }
}
