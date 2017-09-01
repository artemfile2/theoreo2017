<?php

namespace App\Http\Controllers\Admin;

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
use App\Repositories\ActionRepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 * Class ActionsController
 * Контроллер для работы с акциями
 */
class ActionsController extends Controller
{
    protected $actions;

    public function __construct(ActionRepositoryInterface $actions, Request $request)
    {
        $this->actions = $actions;
    }

    /*
     * Вывод активных Акций на страницу*/
    public function actions()
    {
        $actions = $this->actions->getActive();

        return view('admin.tabs.actions_active_tab', [
            'title' => 'Акции',
            'actions' => $actions,
             ]);
    }
    /*
    * Вывод удалённых Акций на страницу*/
    public function trashed()
    {
        $actions = $this->actions->getTrashed();

        return view('admin.tabs.actions_deleted_tab', [
            'title' => 'Удалённые акции',
            'actionsDeleted' => $actions,
        ]);
    }

    /**
     * Удаление Акции в корзину(мягкое удаление)
     */
    public function actionTrash($id)
    {
       return ajax_respond($this->actions->inTrash($id));
    }

    /**
     * Восстановление Акции из корзины
     */
    public function actionRestore($id)
    {
        return ajax_respond($this->actions->restore($id));

    }

    /**
     * Удаление Акции
     */
    public function actionDelete($id)
    {
        return ajax_respond($this->actions->delete($id));
    }

    /**
     * Добавление новой Акции
     */
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

    /**
     * Добавление новой Акции
     */
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
            'tags' => 'nullable',
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

        $actionModel = $this->actions->create($requestAll);

        if(!empty($requestAll['tags'])) {
            foreach($requestAll['tags'] as $tag) {
                DB::table('action_tag')->insert([
                    'action_id' => $actionModel->id,
                    'tag_id' => $tag,
                ]);
            }
        }

        return redirect()
            ->route('admin.actions.active');
    }

    /**
     * Редактирование Акции
     */
    public function actionEdit($id, Request $request, $fileError = null)
    {
        $action = $this->actions->getOne($id);
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

    /**
     * Редактирование Акции
     */
    public function actionEditPost(Request $request, $id, Uploader $uploader, Upload $uploadModel)
    {
        $requestAll = $request->all();
        $action = $this->actions->getOne($id);

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
            'tags' => 'nullable',
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

        /*
         * Tags editing
         */
        $oldTags = $action->tag->pluck('id');
        $newTags = collect($request->tags);

        $addingTags = $newTags->diff($oldTags);
        foreach($addingTags as $tag) {
            DB::table('action_tag')->insert([
                'action_id' => $action->id,
                'tag_id' => $tag,
            ]);
        }

        $deletingTags = $oldTags->diff($newTags);
        foreach($deletingTags as $tag) {
            DB::table('action_tag')
                ->where('tag_id', $tag)
                ->delete();
        }

        return redirect()
            ->route('admin.actions.active');
    }
}
