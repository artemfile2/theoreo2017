<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Brand;
use App\Models\Action;

class PageController extends Controller
{

    public function index(Request $request)
    {
        $actions = Action::intime()
            ->orderBy('active_from', 'DESC')
            ->paginate(config('app.itemsPerPage'));

        return view('client.pages.main', ['actions' => $actions, 'sort' => 'active']);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function action($id)
    {
        $action = Action::findOrFail($id);
        $same_action = false;

        //TODO 'Сделать вывод похожих акций';

        //TODO 'Настроить работу Google Maps Geocoding API в шаблоне map.blade.php';

        return view('client.pages.detail', ['action' => $action, 'sameActions ' => $same_action]);
    }

    public function showCategory($id, $sort = false)
    {
        $title = Category::findOrFail($id);
        $actions = Action::intime()
            ->inCategory($id)
            ->orderBy('active_from', 'DESC')
            ->sortBy($sort)
            ->paginate(config('app.itemsPerPage'));

        return view('client.pages.main', compact(['actions', 'title', 'sort']));
    }

    public function filterBySort($sort)
    {
        $actions = Action::intime()
            ->sortBy($sort)
            ->paginate(config('app.itemsPerPage'));
        //TODO 'сделать возврат сортировки на страницу отправки (не факт, что здесь)';

        return view('client.pages.main', ['actions' => $actions, 'sort' => $sort]);
    }

    public function filterByTag(Request $request, $sort = false)
    {
        $tag =  trim($request->input('tag'));

        $title = Tag::where('name', 'like',  $tag)->firstOrFail();
        $actions = Action::intime()
            ->withTag($tag)
            ->orderBy('active_from', 'DESC')
            ->sortBy($sort)
            ->paginate(config('app.itemsPerPage'));

        return view('client.pages.main', compact(['actions', 'title', 'sort']));
    }

    public function filterByBrand($id, $sort = false)
    {
        $title = Brand::findOrFail($id);
        $actions = Action::pastAndActive()
            ->withBrand($id)
            ->orderBy('active_from', 'DESC')
            ->sortBy($sort)
            ->paginate(config('app.itemsPerPage'));

        return view('client.pages.main', compact(['actions', 'title', 'sort']));
    }

    public function showArchives()
    {
        $actions = Action::notInTime()
            ->orderBy('active_from', 'DESC')
            ->paginate(config('app.itemsPerPage'));
        $title = new \stdClass();
        $title->name = 'В архиве';
        return view('client.pages.main', ['actions' => $actions, 'title' => $title]);
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'query' => 'required|max:200'
        ]);
       $query_str = $request->input('query');

       $actions = Action::pastAndActive()
           ->search($query_str)
           ->orderBy('active_from', 'DESC')
           ->paginate(config('app.itemsPerPage'));

       return view('client.pages.main', ['actions' => $actions, 'query' => $query_str]);
    }

}