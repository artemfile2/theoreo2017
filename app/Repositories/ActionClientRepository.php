<?php
namespace App\Repositories;

use App\Models\Action;

class ActionClientRepository implements ActionRepositoryInterface
{
    public function getOne($id){
        return  Action::pastAndActive()
            ->allowed()
            ->findOrFail($id);
    }

    public function getAll(){
        return Action::intime()
            ->allowed()
            ->orderBy('active_from', 'DESC')
            ->paginate(config('app.itemsPerPage'));
    }

    public function getAllSorted($sort){
        return Action::intime()
            ->allowed()
            ->sortBy($sort)
            ->orderBy($sort, 'DESC')
            ->paginate(config('app.itemsPerPage'));
    }


    public function inCategory($id, $sort)
    {
        return Action::intime()
            ->allowed()
            ->where('category_id', '=', $id)
            ->orderBy($sort, 'DESC')
            ->paginate(config('app.itemsPerPage'));
    }

    public function WithTag($tag, $sort)
    {
        return  Action::intime()
            ->allowed()
            ->whereHas('tag', function($query) use ($tag){
                $query->where('name', 'like', $tag);
            })
            ->orderBy($sort, 'DESC')
            ->paginate(config('app.itemsPerPage'));

    }

    public function withBrand($id, $sort)
    {
        return Action::pastAndActive()
            ->allowed()
            ->where('brand_id', '=', $id)
            ->orderBy($sort, 'DESC')
            ->paginate(config('app.itemsPerPage'));
    }

    public function archive()
    {
        return Action::notInTime()
            ->allowed()
            ->orderBy('active_from', 'DESC')
            ->paginate(config('app.itemsPerPage'));
    }

    public function search($query_str)
    {
        return Action::pastAndActive()
            ->allowed()
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
}