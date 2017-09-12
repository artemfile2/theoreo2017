<?php
namespace App\Repositories;

use App\Models\Action;
use Illuminate\Support\Facades\Cache;

class ActionAdminRepository implements ActionRepositoryInterface
{
    public function getOne($id)
    {
        return Action::findOrFail($id);
    }

    public function getTrashed()
    {
        return Action::with(['brand', 'upload', 'status', 'city', 'category'])
            ->has('brand.user')
            ->onlyTrashed()
            ->get();
    }

    public function getActive()
    {
        return Action::with(['brand', 'upload', 'status', 'city', 'category'])
            ->has('brand.user')
            ->get();
    }

    public function inTrash($id)
    {
        Cache::tags(['actions', 'list'])
            ->flush();

        Cache::tags(['actions', 'trashed'])
            ->flush();

        return Action::findOrFail($id)
                ->delete();
    }

    public function restore($id)
    {
        Cache::tags(['actions', 'list'])
            ->flush();

        Cache::tags(['actions', 'trashed'])
            ->flush();

        return Action::withTrashed()
            ->where('id', $id)
            ->restore();
    }

    public function delete($id)
    {
        Cache::tags(['actions', 'trashed'])
            ->flush();

        return Action::withTrashed()
            ->where('id', $id)
            ->forceDelete();
    }

    public function create($request)
    {
        return Action::create($request);
    }
}