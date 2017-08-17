<?php

namespace App\Http\Controllers\Admin;

use App\Models\Action;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Tag;
use App\Models\City;
use App\Models\Type;
use App\Models\Status;
use App\Models\Upload;
use App\Classes\Uploader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ActionsController extends Controller
{
    public function actions()
    {
        $actions = Action::all()
            ->sortByDesc('created_at');

        $actionsDeleted = Action::onlyTrashed()
            ->get();

        return view('admin.section.actions', [
            'title' => 'Акции',
            'actions' => $actions,
            'actionsDeleted' => $actionsDeleted,
        ]);
    }

    public function actionTrash($id)
    {
        Action::findOrFail($id)
            ->delete();

        return redirect()
            ->route('admin.actions.get_all');
    }

    public function actionRestore($id)
    {
        Action::withTrashed()
            ->where('id', $id)
            ->restore();

        return redirect()
            ->route('admin.actions.get_all');
    }

    public function actionDelete($id)
    {
        Action::withTrashed()
            ->where('id', $id)
            ->forceDelete();

        return redirect()
            ->route('admin.actions.get_all');
    }

    public function actionCreate(Request $request, $fileError = null)
    {
        if($request->session()->has('fileError')) {
            $fileError = $request->session()->pull('fileError', 'default');
        }

        $brands = Brand::all();
        $categories = Category::all();
        $tags = Tag::all();
        $cities = City::all();
        $types = Type::all();
        $statuses = Status::all();

        return view('admin.section.action_create', [
            'title' => 'Создание акции',
            'brands' => $brands,
            'categories' => $categories,
            'tags' => $tags,
            'cities' => $cities,
            'types' => $types,
            'statuses' => $statuses,
            'fileError' => $fileError,
        ]);
    }

    public function actionCreatePost(Request $request, Uploader $uploader, Upload $uploadModel)
    {
        $requestAll = $request->all();

        $this->validate($request, [
            'title' => 'required|unique:actions|max:250|min:20',
            'brand_id' => 'integer|required',
            'status_id' => 'integer|required',
            'city_id' => 'integer|required',
            'type_id' => 'integer|required',
            'category_id' => 'integer|required',
            'addresses' => 'nullable|min:10',
            'phones' => 'nullable|min:10',
            'description' => 'required|max:500|min:50',
            'shop_link' => 'nullable|url',
            'active_from' => 'required|date_format:"Y-m-d"',
            'active_to' => 'required|date_format:"Y-m-d"',
        ]);

        if ($request->image) {
            if ($uploader->validate($request, 'image', config ('imagerules') )) {
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
                    ->route('admin.actions.create')
                    ->withInput();
            }
        }

        $requestAll['upload_id'] = isset($uploadsModel) ? $uploadsModel->id : null;
        Action::create($requestAll);

        return redirect()
            ->route('admin.actions.get_all');
    }

    public function actionEdit($id, Request $request, $fileError = null)
    {
        $action = Action::findOrFail($id);
        $brands = Brand::all();
        $categories =Category::all();
        $tags = Tag::all();
        $cities = City::all();
        $types = Type::all();
        $statuses = Status::all();

        if($request->session()->has('fileError')) {
            $fileError = $request->session()->pull('fileError', 'default');
        }

        return view('admin.section.action_edit', [
            'title' => 'Редактирование акции',
            'action' => $action,
            'brands' => $brands,
            'categories' => $categories,
            'tags' => $tags,
            'cities' => $cities,
            'types' => $types,
            'statuses' => $statuses,
            'fileError' => $fileError,
        ]);
    }

    public function actionEditPost(Request $request, $id, Uploader $uploader, Upload $uploadModel)
    {
        $requestAll = $request->all();
        $action = Action::findOrFail($id);

        $this->validate($request, [
            'title' => [
                'required',
                Rule::unique('actions')->ignore($action->id),
                'max:250',
                'min:20',
            ],
            'brand_id' => 'integer|required',
            'status_id' => 'integer|required',
            'city_id' => 'integer|required',
            'type_id' => 'integer|required',
            'category_id' => 'integer|required',
            'addresses' => 'nullable|min:10',
            'phones' => 'nullable|min:10',
            'description' => 'required|max:500|min:50',
            'shop_link' => 'nullable|url',
            'active_from' => 'required|date_format:"Y-m-d"',
            'active_to' => 'required|date_format:"Y-m-d"',
        ]);

        if($request->image) {
            if ($uploader->validate($request, 'image', config ('imagerules') )) {
                $uploadedPath = $uploader->upload(config('site.imageUploadSection'));

                if ($uploadedPath !== false) {
                    $uploadsModel = $uploader->register($uploadModel);
                    $uploadedProps = $uploader->getProps();

                    $action->update([
                        'upload_id' => $uploadsModel->id,
                    ]);
                }
            }
            else {
                $message = implode($uploader->getErrors(), '. ');
                $request->session()->flash('fileError', $message);

                return redirect()
                    ->route('admin.actions.edit', [
                        'id' => $id,
                    ])
                    ->withInput();
            }
        }

        $action->update($requestAll);

        return redirect()
            ->route('admin.actions.get_all');
    }
}
