<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index(Request $request)
    {
        $actions = [];

        return view('client.index', ['actions' => $action]);
    }




}