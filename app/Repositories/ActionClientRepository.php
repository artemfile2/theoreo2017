<?php
namespace App\Repositories;

use App\Models\Action;
use DB;
use Illuminate\Support\Collection;

class ActionClientRepository implements ActionRepositoryInterface
{
    public function getOne($id){
        return  Action::pastAndActive()
            ->with(['upload', 'brand', 'tag'])
            ->allowed()
            ->findOrFail($id);
    }


    public function getSame(){
        return Action::intime()
            ->with(['upload', 'brand', 'tag'])
            ->allowed()
            ->get();
    }

    public function getAllSorted($sort){
        return Action::intime()
            ->with(['upload', 'brand', 'tag'])
            ->allowed()
            ->sortBy($sort)
            ->has('brand.user')
            ->orderBy($sort, 'DESC')
            ->paginate(config('app.itemsPerPage'));
    }


    public function inCategory($id, $sort)
    {
        return Action::intime()
            ->with(['upload', 'brand', 'tag'])
            ->allowed()
            ->has('brand.user')
            ->where('category_id', '=', $id)
            ->orderBy($sort, 'DESC')
            ->paginate(config('app.itemsPerPage'));
    }

    public function WithTag($tag, $sort)
    {
        return  Action::intime()
            ->with(['upload', 'brand', 'tag'])
            ->allowed()
            ->has('brand.user')
            ->whereHas('tag', function($query) use ($tag){
                $query->where('name', 'like', $tag);
            })
            ->orderBy($sort, 'DESC')
            ->paginate(config('app.itemsPerPage'));

    }

    public function withBrand($id, $sort)
    {
        return Action::pastAndActive()
            ->with(['upload', 'brand', 'tag'])
            ->allowed()
            ->where('brand_id', '=', $id)
            ->orderBy($sort, 'DESC')
            ->paginate(config('app.itemsPerPage'));
    }

    public function archive()
    {
        return Action::notInTime()
            ->with(['upload', 'brand', 'tag'])
            ->allowed()
            ->has('brand.user')
            ->orderBy('active_from', 'DESC')
            ->paginate(config('app.itemsPerPage'));
    }

    public function search($query_str)
    {
        return Action::pastAndActive()
            ->allowed()
            ->has('brand.user')
            ->whereHas('tag', function($query) use ($query_str){
                $query->where('name', 'like', $query_str);
            })
            ->orWhereHas('category', function($query) use ($query_str){
                $query->where('name', 'like', $query_str);
            })
            ->orWhereHas('brand', function($query) use ($query_str){
                $query->where('name', 'like', $query_str);
            })
            ->orWhere('title', 'like', '%'.$query_str.'%')
            ->orWhere('description', 'like', '%'.$query_str.'%')
            ->orWhere('addresses', 'like', '%'.$query_str.'%')
            ->orderBy('active_from', 'DESC')
            ->paginate(config('app.itemsPerPage'));
    }

    public function sameAllActions($id)
    {
        /**
         * Вывод похожих акций (подбираются по тегам)
         */
        //массив всех тегов в акции
        $tagArr = Action::find($id)->tag->pluck('id')->toArray();
        $tagArr = implode($tagArr, ',');

        //выбор похожих акций из БД и сортировка их по количеству вхождений тегов
        $query = DB::select(
            DB::raw('SELECT * FROM (
                     SELECT `action_tag`.`action_id`, COUNT(*) AS `count`
                     FROM `action_tag`
                     JOIN `tags` ON `tags`.`id` = `action_tag`.`tag_id` 
                     AND `tags`.`id` IN ('.$tagArr.')
                     GROUP BY `action_tag`.`action_id`
                    ) AS `cnt`
                   JOIN `actions` ON `actions`.`id` = `cnt`.`action_id`
                   ORDER BY `cnt`.`count` DESC limit 20'));
        $query = collect($query);

        //выбор из БД всех активных акций (актуальных по времени и разрешенных по статусу) и id этих акций
        $actionsAll = $this->getSame();
        $idsAll = $actionsAll->pluck('id');

        /** Конечное формирование коллекции похожих акций:
        - исключаем текущую акцию;
        - проверяем, входит ли акция в список актуальных и разрешенных;
         */
        $same_actions = new Collection();
        foreach($query as $one){
            if($one->action_id != $id && $idsAll->contains($one->action_id)) {
                $same_actions->push($actionsAll->where('id', $one->action_id)->first());
            }
        }

        return $same_actions;
    }
}