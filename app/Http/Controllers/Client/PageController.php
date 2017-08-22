<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ActionRepositoryInterface;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Brand;
use App\Models\Query;
use Carbon\Carbon;

class PageController extends Controller
{

    /**
     * @var ActionRepositoryInterface
     */
    protected $action;
    protected $sort = false;

    public function __construct(ActionRepositoryInterface $action, Request $request)
    {
        $this->action = $action;
        $sort =  trim($request->input('sort_by'));
        if($sort){
            $this->sort = $sort;
        }
    }

    public function index()
    {
        $this->sort = 'active';
        $actions = $this->action->getAllSorted($this->sort);

        return view('client.pages.main', ['actions' => $actions, 'sort' => $this->sort]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function action($id)
    {
        $action = $this->action->getOne($id);

        /**
         * Инкремент рейтинга статьи при просмотре
         */
        $action->update([
            'rating' => $action->rating + 1,
        ]);

        $same_action = false;

        //TODO 'Сделать вывод похожих акций';

        //TODO 'Настроить работу Google Maps Geocoding API в шаблоне map.blade.php';

        return view('client.pages.detail', ['action' => $action, 'sameActions ' => $same_action]);
    }

    public function showCategory($id)
    {
        $title = Category::findOrFail($id);
        $actions = $this->action->inCategory($id, $this->sort);
        $sort = $this->sort;

        return view('client.pages.main', compact(['actions', 'title', 'sort']));
    }

    public function filterByTag(Request $request)
    {
        $tag =  trim($request->input('tag'));

        $title = Tag::where('name', 'like',  $tag)->firstOrFail();
        $actions = $this->action->WithTag($tag, $this->sort);
        $sort = $this->sort;

        return view('client.pages.main', compact(['actions', 'title', 'sort', 'tag']));
    }

    public function filterByBrand($id)
    {
        $title = Brand::findOrFail($id);
        $sort = $this->sort;
        $actions = $this->action->withBrand($id,$this->sort);


        return view('client.pages.main', compact(['actions', 'title', 'sort']));
    }

    public function showArchives()
    {
        $actions = $this->action->archive();
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

       $actions = $this->action->search($query_str);


       /**
         * Логгирование поисковых запросов
         */
       $queryModel = Query::where('query_text', $query_str)
            ->first();

       if(!$queryModel) {
           $queryModel = Query::create([
               'query_text' => $query_str,
               'results_cnt' => $actions->count(),
               'query_cnt' => 1,
               'last_date' => Carbon::now(),
           ]);
       }
       else {
            $queryModel->update([
                'query_cnt' => $queryModel->query_cnt + 1,
                'results_cnt' => $actions->count(),
                'last_date' => Carbon::now(),
            ]);
       }

       return view('client.pages.main', ['actions' => $actions, 'query' => $query_str]);
    }

}