<?php

namespace App\Http\Controllers\Admin;

use App\Models\Action;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Tag;
use App\Models\City;
use App\Models\Type;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function actionCreate()
    {
        $brands = Brand::all();
        $categories =Category::all();
        $tags = Tag::all();
        $cities = City::all();
        $types = Type::all();
        $status = Status::all();

        return view('admin.section.action_create', [
            'title' => 'Создание акции',
            'brands' => $brands,
            'categories' => $categories,
            'tags' => $tags,
            'cities' => $cities,
            'types' => $types,
            'status' => $status,
        ]);
    }

    public function actionCreatePost(Request $request)
    {
        $requestAll = $request->all();
        Action::create($requestAll);

        return redirect()
            ->route('admin.actions.get_all');
    }

    public function actionEdit($id)
    {
        $action = Action::findOrFail($id);
        $brands = Brand::all();
        $categories =Category::all();
        $tags = Tag::all();
        $cities = City::all();
        $types = Type::all();
        $statuses = Status::all();

        return view('admin.section.action_edit', [
            'title' => 'Редактирование акции',
            'action' => $action,
            'brands' => $brands,
            'categories' => $categories,
            'tags' => $tags,
            'cities' => $cities,
            'types' => $types,
            'statuses' => $statuses,
        ]);
    }

    public function actionEditPost(Request $request, $id)
    {
        $requestAll = $request->all();
        Action::findOrFail($id)
            ->update($requestAll);

        return redirect()
            ->route('admin.actions.get_all');
    }
}
