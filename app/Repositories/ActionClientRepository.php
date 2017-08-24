<?php
namespace App\Repositories;

use App\Models\Action;

class ActionClientRepository implements ActionRepositoryInterface
{
    public function getOne($id){
        return  Action::pastAndActive()
            ->findOrFail($id);
    }

    public function getAll(){
        return Action::intime()
            ->orderBy('active_from', 'DESC')
            ->paginate(config('app.itemsPerPage'));
    }

    public function getAllSorted($sort){
        return Action::intime()
            ->orderBy($sort, 'DESC')
            ->paginate(config('app.itemsPerPage'));
    }


    public function inCategory($id, $sort)
    {
        return Action::intime()
            ->where('category_id', '=', $id)
            ->orderBy($sort, 'DESC')
            ->paginate(config('app.itemsPerPage'));
    }

    public function WithTag($tag, $sort)
    {
        return  Action::intime()
            ->whereHas('tag', function($query) use ($tag){
                $query->where('name', 'like', $tag);
            })
            ->orderBy($sort, 'DESC')
            ->paginate(config('app.itemsPerPage'));

    }

    public function withBrand($id, $sort)
    {
        return Action::pastAndActive()
            ->where('brand_id', '=', $id)
            ->orderBy($sort, 'DESC')
            ->paginate(config('app.itemsPerPage'));
    }

    public function archive()
    {
        return Action::notInTime()
            ->orderBy('active_from', 'DESC')
            ->paginate(config('app.itemsPerPage'));
    }

    public function search($query_str)
    {
        return Action::pastAndActive()
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