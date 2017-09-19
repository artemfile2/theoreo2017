<?php

namespace App\Repositories;

use App\Models\Brand;
use Illuminate\Support\Facades\Cache;

class BrandsAdminRepository implements ActionRepositoryInterface
{
    public function getOne($id)
    {
        return Brand::findOrFail($id);
    }

    public function getActive()
    {
        return Brand::with(['upload', 'user'])
            ->orderByDesc('created_at')
            ->has('user')
            ->get();
    }

    public function getTrashed()
    {
        return Brand::with(['upload', 'user'])
            ->has('user')
            ->onlyTrashed()
            ->get();
    }

    public function inTrash($id)
    {
        Cache::tags(['brands', 'list'])
            ->flush();

        Cache::tags(['brands', 'trashed'])
            ->flush();

        return Brand::findOrFail($id)
            ->delete();
    }

    public function restore($id)
    {
        Cache::tags(['brands', 'list'])
            ->flush();

        Cache::tags(['brands', 'trashed'])
            ->flush();

        return Brand::withTrashed()
            ->where('id', $id)
            ->restore();
    }

    public function delete($id)
    {
        Cache::tags(['brands', 'trashed'])
            ->flush();

        return Brand::withTrashed()
            ->where('id', $id)
            ->forceDelete();
    }

    public function create($request)
    {
        return Brand::create($request);
    }
}
