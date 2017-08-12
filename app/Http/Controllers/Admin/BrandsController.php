<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{

    public function brands()
    {
        $brands = Brand::all()
            ->sortByDesc('created_at');

        $brandsDeleted = Brand::onlyTrashed()
            ->get();

        return view('admin.section.brands', [
            'title' => 'Компании',
            'brands' => $brands,
            'brandsDeleted' => $brandsDeleted,
            /*'brandsDeleted' => $this->brandsGetAll()->withTrashed(),*/
        ]);
    }
}
