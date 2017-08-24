<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Models\Brand;
use App\Models\City;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Upload;
use App\Classes\Uploader;
use App\Repositories\ActionRepositoryInterface;


/**
 * Class BrandsController
 * Контроллер для работы с компаниями (брендами)
 */
class BrandsController extends Controller
{
    protected $brand;

    public function __construct(ActionRepositoryInterface $brand, Request $request)
    {
        $this->brand = $brand;
    }

    public function brands()
    {
        $brands = $this->brand->getAll();

        return view('admin.section.brands', [
            'title' => 'Компании',
            'brands' => $brands['brands'],
            'brandsDeleted' => $brands['brandsDeleted'],
        ]);
    }

    /**
     * Мягкое удаление бренда (перемещение в раздел "Удаленные")
     */
    public function brandTrash($id)
    {
        $this->brand->inTrash($id);

        return redirect()
            ->route('admin.brands.get_all');
    }

    /**
     * Восстановление бренда из раздела "Удаленные"
     */
    public function brandRestore($id)
    {
        $this->brand->restore($id);

        return redirect()
            ->route('admin.brands.get_all');
    }

    /**
     * Безвозвратное удаление бренда
     */
    public function brandDelete($id)
    {
        $this->brand->delete($id);

        return redirect()
            ->route('admin.brands.get_all');
    }

    /**
     * Создание нового бренда
     */
    public function brandCreate(Request $request, $fileError = null)
    {
        if($request->session()->has('fileError')) {
            $fileError = $request->session()->pull('fileError', 'default');
        }

        $categories = Category::all();
        $cities = City::all();

        return view('admin.section.brand_create', [
            'title' => 'Создание компании',
            'categories' => $categories,
            'cities' => $cities,
            'fileError' => $fileError,
        ]);
    }

    public function brandCreatePost(Request $request, Uploader $uploader, Upload $uploadModel)
    {
        $validator =  Validator::make( $request->all(), [
            'name' => 'required|unique:brands|max:100|min:2',
            'addresses' => 'required|min:10',
            'phones' => 'required|min:10',
            'site_link' => 'nullable|url',
            'vk_link' => 'required|url',
            'brand_in_action' => 'sometimes',
        ]);

        $requestAll = $request->except('brand_in_action');
        // dump($requestAll);

        if ($validator->fails()) {
            if($request->input('brand_in_action')){
                return redirect()
                    ->route('admin.actions.create')
                    ->withErrors($validator, 'brand')
                    ->withInput();

            }else{
                return redirect()
                    ->route('admin.brands.create')
                    ->withErrors($validator, 'brand')
                    ->withInput();
            }
        }

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

                if($request->input('brand_in_action')){
                    return redirect()
                        ->route('admin.actions.create')
                        ->withErrors($validator, 'brand')
                        ->withInput();
                }else{
                    return redirect()
                        ->route('admin.brands.create')
                        ->withErrors($validator, 'brand')
                        ->withInput();
                }

            }
        }

        $requestAll['user_id'] = Auth::user()->id;
        $requestAll['upload_id'] = isset($uploadsModel) ? $uploadsModel->id : null;

        $this->brand->create($requestAll);

        if($request->input('brand_in_action')){
            return redirect()
                ->route('admin.actions.create')
                ->with('brand_added',  true);
        }else{
            return redirect()
                ->route('admin.brands.get_all');
        }
    }

    /**
     * Редактирование бренда
     */
    public function brandEdit($id, Request $request, $fileError = null)
    {
        $brand = $this->brand->getOne($id);

        $categories = Category::all();
        $cities = City::all();

        if($request->session()->has('fileError')) {
            $fileError = $request->session()->pull('fileError', 'default');
        }

        return view('admin.section.brand_edit', [
            'title' => 'Редактирование компании',
            'brand' => $brand,
            'categories' => $categories,
            'cities' => $cities,
            'fileError' => $fileError,
        ]);
    }

    public function brandEditPost(Request $request, $id, Uploader $uploader, Upload $uploadModel)
    {
        $requestAll = $request->all();
        $brand = $this->brand->getOne($id);

        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('brands')->ignore($brand->id),
                'max:100',
                'min:2',
            ],
            'addresses' => 'required|min:10',
            'phones' => 'required|min:10',
            'site_link' => 'nullable|url',
            'vk_link' => 'required|url',
        ]);

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
