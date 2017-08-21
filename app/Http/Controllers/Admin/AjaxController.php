<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\City;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Upload;
use App\Classes\Uploader;

class AjaxController extends Controller
{

    public function brandAddForm()
    {
        return view('admin.ajax.brand_add', [
            'categories' => Category::all(),
            'cities' => City::all(),
            'fileError' => null
        ]);
    }

    public function brandAddPost(Request $request, Uploader $uploader, Upload $uploadModel)
    {
        $requestAll = $request->all();
        dump($requestAll);

        $this->validate($request, [
            'name' => 'required|unique:brands|max:100|min:2',
            'addresses' => 'required|min:10',
            'phones' => 'required|min:10',
            'site_link' => 'nullable|url',
            'vk_link' => 'required|url',
        ]);

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

        /**
         * Раскомментировать после внедрения авторизации для админ-панели.
         * $requestAll['user_id'] = Auth::user()->id;
         */

        $requestAll['upload_id'] = isset($uploadsModel) ? $uploadsModel->id : null;
        Brand::create($requestAll);

        return '<h1>Брэнд добавлен</h1>';
    }
}
