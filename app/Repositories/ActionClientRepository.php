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
}