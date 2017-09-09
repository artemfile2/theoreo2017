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
use Illuminate\Support\Facades\Cache;

use DB;
use App\Models\Action;
use Illuminate\Support\Collection;

class PageController extends Controller
{

    /**
     * @var ActionRepositoryInterface
     */
    protected $action;
    protected $sort = 'active_from';
    protected $request_sort;

    public function __construct(ActionRepositoryInterface $action, Request $request)
    {
        $this->action = $action;
        $this->request_sort =  trim($request->input('sort_by'));

        if($this->request_sort){
            $this->sort = $this->request_sort;
        }
    }

    public function index()
    {
        $actions = $this->action->getAllSorted($this->sort);

        if($this->request_sort) {
            $links = $actions->appends(['sort_by' => $this->sort])->links();
        }
        else{
            $links = $actions->links();
        }

        return view('client.pages.main', [
            'actions' => $actions, 'sort' => $this->sort, 'links' => $links
        ]);
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

        //$same_action = false;

        /* массив всех тегов в акции */
        //$tagArr = Action::find($id)->tag->pluck('id');
        $tags = Action::find($id)
            ->tag;
        foreach ($tags as $tag){
            $tagArr[] = $tag->id;
        }
        $tagArr = implode($tagArr, ',');

        /* массив всех акций где есть теги */
        $act = Tag::whereIn('id', $tagArr)->get();
        $col = new Collection;
            foreach ($act as $key=>$value)
            {
                $pages = $col->push($value->action);
            }
        dump(collect($pages)->groupBy('pivot_action_id'));


        $query = DB::select(
                    DB::raw('SELECT * FROM (
                     SELECT `action_tag`.`action_id`, COUNT(*) AS `count`
                     FROM `action_tag`
                     JOIN `tags` ON `tags`.`id` = `action_tag`.`tag_id` 
                     AND `tags`.`id` IN ('.$tagArr.')
                     GROUP BY `action_tag`.`action_id`
                    ) AS `cnt`
                   JOIN `actions` ON `actions`.`id` = `cnt`.`action_id`
                   ORDER BY `cnt`.`count` DESC'));
        dump(collect($query));
        $same_action = collect($query);

        //return "ok";

        //TODO 'Настроить работу Google Maps Geocoding API в шаблоне map.blade.php';

        /*return view('client.pages.detail', [
            'action' => $action, 'sameActions' => $same_action
        ]);*/
    }

    public function showCategory($id)
    {
        $title = Category::findOrFail($id);
        $actions = $this->action->inCategory($id, $this->sort);

        if($this->request_sort) {
            $links = $actions->appends(['sort_by' => $this->sort])->links();
        }
        else{
            $links = $actions->links();
        }
        $sort = $this->sort;

        return view('client.pages.main', compact(['actions', 'title', 'sort', 'links']));
    }

    public function filterByTag(Request $request)
    {
        $tag =  trim($request->input('tag'));

        $title = Tag::where('name', 'like',  $tag)->firstOrFail();
        $actions = $this->action->WithTag($tag, $this->sort);

        if($this->request_sort) {
            $links = $actions->appends(['sort_by' => $this->sort])->links();
        }
        else{
            $links = $actions->links();
        }

        $sort = $this->sort;

        return view('client.pages.main', compact(['actions', 'title', 'sort', 'tag', 'links']));
    }

    public function filterByBrand($id)
    {
        $title = Brand::findOrFail($id);
        $sort = $this->sort;
        $actions = $this->action->withBrand($id, $this->sort);

        if($this->request_sort) {
            $links = $actions->appends(['sort_by' => $this->sort])->links();
        }
        else{
            $links = $actions->links();
        }

        return view('client.pages.main', compact(['actions', 'title', 'sort', 'links']));
    }

    public function showArchives()
    {
        $actions = Cache::tags(['actions', 'archive'])
            ->remember('actions', env('CACHE_TIME', 0), function () {
                return $this->action->archive();
            });

        $links = $actions->links();
        $title = new \stdClass();
        $title->name = 'В архиве';
        return view('client.pages.main', [
            'actions' => $actions, 'title' => $title, 'links' => $links
        ]);
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'query' => 'required|max:200'
        ]);
       $query_str = $request->input('query');

       $actions = $this->action->search($query_str);
       $links = $actions->links();


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

       Cache::tags(['queries', 'list'])
            ->flush();

       return view('client.pages.main', [
           'actions' => $actions, 'query' => $query_str, 'links' => $links
       ]);
    }

}