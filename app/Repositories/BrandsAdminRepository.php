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
        $brands = Brand::all()
            ->sortByDesc('created_at');

        $brandsDeleted = Brand::onlyTrashed()
            ->get();

        return ['brands'=>$brands, 'brandsDeleted'=>$brandsDeleted];
    }

    public function getActive()
    {
        return Brand::all()
            ->sortByDesc('created_at');
    }

    public function getTrashed()
    {
        return Brand::onlyTrashed()
        ->get();
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
