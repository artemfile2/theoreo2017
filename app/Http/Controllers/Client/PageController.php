<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index(Request $request)
    {
        $actions = false;

        return view('client.pages.main', ['actions' => $actions, 'sort' => 'active']);
    }

    public function action($id)
    {
        $action = false;

        return view('client.pages.main', ['action' => $action]);
    }

    public function showCategory(Request $request, $category, $sort = false)
    {
        $actions = false;

        return view('client.pages.main', ['actions' => $actions, 'sort' => $sort]);
    }

    public function filterByStatus(Request $request, $sort)
    {
        $actions = false;

        return view('client.pages.main', ['actions' => $actions, 'sort' => $sort]);
    }

    public function filterByTag(Request $request, $sort)
    {
        $actions = false;

        return view('client.pages.main', ['actions' => $actions, 'sort' => $sort]);
    }

    public function filterByBrand(Request $request, $sort)
    {
        $actions = false;

        return view('client.pages.main', ['actions' => $actions, 'sort' => $sort]);
    }

    public function showArchives(Request $request)
    {
        $actions = false;

        return view('client.pages.main', ['actions' => $actions]);
    }

}