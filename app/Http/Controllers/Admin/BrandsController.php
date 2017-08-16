<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Upload;
use App\Classes\Uploader;

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

    public function brandCreate(Request $request, $fileError = null)
    {
        if($request->session()->has('fileError')) {
            $fileError = $request->session()->pull('fileError', 'default');
        }

        return view('admin.section.brand_create', [
            'title' => 'Создание компании',
            'fileError' => $fileError,
        ]);
    }

    public function brandCreatePost(Request $request, Uploader $uploader, Upload $uploadModel)
    {
        $requestAll = $request->all();

        if ($request->logo) {
            if ($uploader->validate($request, 'logo', config ('imagerules') )) {
                $uploadedPath = $uploader->upload(config('site.imageUploadSection'));

                if ($uploadedPath !== false) {
                    $uploadsModel = $uploader->register($uploadModel);
                    $uploadedProps = $uploader->getProps();
                }
            }
            else {
                $message = implode($uploader->getErrors(), '. ');
                $request->session()->flash('fileError', $message);

                return redirect()
                    ->route('admin.brands.create')
                    ->withInput();
            }
        }

        $requestAll['upload_id'] = isset($uploadsModel) ? $uploadsModel->id : null;
        Brand::create($requestAll);

        return redirect()
            ->route('admin.brands.get_all');
    }

    public function brandEdit($id, Request $request, $fileError = null)
    {
        $brand = Brand::findOrFail($id);

        if($request->session()->has('fileError')) {
            $fileError = $request->session()->pull('fileError', 'default');
        }

        return view('admin.section.brand_edit', [
            'title' => 'Редактирование компании',
            'brand' => $brand,
            'fileError' => $fileError,
        ]);
    }

    public function brandEditPost(Request $request, $id, Uploader $uploader, Upload $uploadModel)
    {
        $requestAll = $request->all();
        $brand = Brand::findOrFail($id);

        if($request->logo) {
            if ($uploader->validate($request, 'logo', config ('imagerules') )) {
                $uploadedPath = $uploader->upload(config('site.imageUploadSection'));

                if ($uploadedPath !== false) {
                    $uploadsModel = $uploader->register($uploadModel);
                    $uploadedProps = $uploader->getProps();

                    $brand->update([
                        'upload_id' => $uploadsModel->id,
                    ]);
                }
            }
            else {
                $message = implode($uploader->getErrors(), '. ');
                $request->session()->flash('fileError', $message);

                return redirect()
                    ->route('admin.brands.edit', [
                        'id' => $id,
                    ])
                    ->withInput();
            }
        }

        $brand->update($requestAll);

        return redirect()
            ->route('admin.brands.get_all');
    }
}
