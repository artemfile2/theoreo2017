<?php

namespace App\Repositories;

use App\Models\Brand;

class BrandsAdminRepository implements ActionRepositoryInterface
{
    public function getOne($id)
    {
        return Brand::findOrFail($id);
    }

    public function getAll()
    {
        $brands = Brand::with(['upload'])
            ->orderByDesc('created_at')
            ->get();

        $brandsDeleted = Brand::with(['upload'])
            ->onlyTrashed()
            ->get();

        return ['brands' => $brands, 'brandsDeleted' => $brandsDeleted];
    }

    public function inTrash($id){

        return Brand::findOrFail($id)
            ->delete();
    }

    public function restore($id){

        return Brand::withTrashed()
            ->where('id', $id)
            ->restore();
    }

    public function delete($id){

        return Brand::withTrashed()
            ->where('id', $id)
            ->forceDelete();
    }

    public function create($request){
        return Brand::create($request);
    }
}
