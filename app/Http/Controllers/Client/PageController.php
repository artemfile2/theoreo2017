<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Brand;

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

    public function showCategory($id, $sort = false)
    {
        $title = Category::findOrFail($id);
        $actions = false;

        return view('client.pages.main', compact(['actions', 'title', 'sort']));
    }

    public function filterBySort($sort)
    {
        $actions = false;

        return view('client.pages.main', ['actions' => $actions, 'sort' => $sort]);
    }

    public function filterByTag(Request $request, $sort = false)
    {
        $tag =  trim($request->input('tag'));

        $title = Tag::where('name', 'like',  $tag)->firstOrFail();
        $actions = false;

        return view('client.pages.main', compact(['actions', 'title', 'sort']));
    }

    public function filterByBrand($id, $sort = false)
    {
        $title = Brand::findOrFail($id);
        $actions = false;

        return view('client.pages.main', compact(['actions', 'title', 'sort']));
    }

    public function showArchives()
    {
        $actions = false;

        return view('client.pages.main', ['actions' => $actions]);
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'query' => 'required|max:200'
        ]);
        $actions = false;
       /*
       Допишем после миграций
       $actions = Actions::where('title', 'like', '%'.$request->input('query').'%')
            ->orWhere('content', 'like', '%'.$request->input('query').'%')
            ->orWhere('tagline', 'like', '%'.$request->input('query').'%')
            ->orderBy('id', 'DESC')
            ->get();
        */
        return view('client.pages.main', ['actions' => $actions, 'query' => $request->input('query')]);
    }

}