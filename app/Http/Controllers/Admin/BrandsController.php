<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
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
        ]);
    }

    public function brandTrash($id)
    {
        Brand::findOrFail($id)
            ->delete();

        return redirect()
            ->route('admin.brands.get_all');
    }

    public function brandRestore($id)
    {
        Brand::withTrashed()
            ->where('id', $id)
            ->restore();

        return redirect()
            ->route('admin.brands.get_all');
    }

    public function brandDelete($id)
    {
        Brand::withTrashed()
            ->where('id', $id)
            ->forceDelete();

        return redirect()
            ->route('admin.brands.get_all');
    }

    public function brandCreate()
    {
        return view('admin.section.brand_create', [
            'title' => 'Создание компании',
        ]);
    }

    public function brandCreatePost(Request $request)
    {
        $requestAll = $request->all();
        Brand::create($requestAll);

        return redirect()
            ->route('admin.brands.get_all');
    }

    public function brandEdit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('admin.section.brand_edit', [
            'title' => 'Редактирование компании',
            'brand' => $brand,
        ]);
    }

    public function brandEditPost(Request $request, $id)
    {
        $requestAll = $request->all();
        Brand::findOrFail($id)
            ->update($requestAll);

        return redirect()
            ->route('admin.brands.get_all');
    }
}
