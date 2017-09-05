<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\Uploader;
use Illuminate\Validation\Rule;
use App\Repositories\ActionRepositoryInterface;
use Illuminate\Support\Facades\Cache;

/**
 * Class UsersController
 * Контроллер для работы с пользователями
 */
class UsersController extends Controller
{
    protected $user;

    public function __construct(ActionRepositoryInterface $user, Request $request)
    {
        $this->user = $user;
    }

    public function users()
    {
        $users = Cache::tags(['users', 'list'])
            ->remember('users', env('CACHE_TIME', 0), function () {
                return $this->user->getActive();
            });

        return view('admin.tabs.users_active_tab', [
            'title' => 'Пользователи',
            'users' => $users,
        ]);
    }

    public function trashed()
    {
        $users = Cache::tags(['users', 'trashed'])
            ->remember('users', env('CACHE_TIME', 0), function () {
                return $this->user->getTrashed();
            });

        return view('admin.tabs.users_deleted_tab', [
            'title' => 'Пользователи',
            'usersDeleted' => $users,
        ]);
    }

    /**
     * Создание нового пользователя
     */
    public function userCreate(Request $request, $fileError = null)
    {
        if($request->session()->has('fileError')) {
            $fileError = $request->session()->pull('fileError', 'default');
        }

        $roles = Cache::tags(['roles', 'list'])
            ->remember('roles', env('CACHE_TIME', 0), function () {
                return  Role::all();
            });

        return view('admin.section.user_create', [
            'title' => 'Создание пользователя',
            'roles' => $roles,
            'genders' => ['женский', 'мужской'],
            'fileError' => $fileError,
        ]);
    }

    public function userCreatePost(Request $request, Uploader $uploader, Upload $uploadModel)
    {
        $requestAll = $request->all();

        $this->validate($request, [
            'login' => 'required|unique:users|max:30|min:5',
            'password' => 'required|max:30|min:6',
            'password2' => 'required|same:password',
            'name' => 'required|max:200|min:2',
            'surname' => 'required|max:200|min:2',
            'role_id' => 'integer|required',
            'gender' => 'required',
        ]);

        if ($request->avatar) {
            if ($uploader->validate($request, 'avatar', config ('imagerules') )) {
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
                    ->route('admin.user.create')
                    ->withInput();
            }
        }

        $requestAll['upload_id'] = isset($uploadsModel) ? $uploadsModel->id : null;
        $requestAll['password'] = bcrypt($request->password);

        $this->user->create($requestAll);

        Cache::tags(['users', 'list'])
            ->flush();

        return redirect()
            ->route('admin.user.active');
    }

    /**
     * Восстановление удаленного пользователя из раздела "Удаленные"
     */
    public function userRestore($id)
    {
        return ajax_respond($this->user->restore($id));
    }

    /**
     * Мягкое удаление пользователя (перемещение в раздел "Удаленные")
     */
    public function userTrash($id)
    {
        return ajax_respond($this->user->inTrash($id));
    }

    /**
     * Редактирование пользователя
     */
    public function userEdit($id, Request $request, $fileError = null)
    {
        $user = $this->user->getOne($id);

        $roles = Cache::tags(['roles', 'list'])
            ->remember('roles', env('CACHE_TIME', 0), function () {
                return  Role::all();
            });

        if($request->session()->has('fileError')) {
            $fileError = $request->session()->pull('fileError', 'default');
        }

        return view('admin.section.user_edit', [
            'title' => 'Редактирование пользователя',
            'user' => $user,
            'roles' => $roles,
            'genders' => ['женский', 'мужской'],
            'fileError' => $fileError,
        ]);
    }

    public function userEditPost(Request $request, $id, Uploader $uploader, Upload $uploadModel)
    {
        $requestAll = $request->all();
        $user = $this->user->getOne($id);

        $this->validate($request, [
            'login' => [
                'required',
                Rule::unique('users')->ignore($user->id),
                'max:30',
                'min:5'
        ],
            'password' => 'nullable|max:30|min:6',
            'password2' => 'nullable|same:password',
            'name' => 'required|max:200|min:2',
            'surname' => 'required|max:200|min:2',
            'role_id' => 'integer|required',
            'gender' => 'required',
        ]);

        if($request->avatar) {
            if ($uploader->validate($request, 'avatar', config ('imagerules') )) {
                $uploadedPath = $uploader->upload(config('site.imageUploadSection'));

                if ($uploadedPath !== false) {
                    $uploadsModel = $uploader->register($uploadModel);
                    $uploadedProps = $uploader->getProps();

                    $user->update([
                        'upload_id' => $uploadsModel->id,
                    ]);
                }
            }
            else {
                $message = implode($uploader->getErrors(), '. ');
                $request->session()->flash('fileError', $message);

                return redirect()
                    ->route('admin.user.edit', [
                        'id' => $id,
                    ])
                    ->withInput();
            }
        }

        if(!$request->password) {
            $requestAll['password'] = $user->password;
        }
        else {
            $requestAll['password'] = bcrypt($request->password);
        }

        $user->update($requestAll);

        Cache::tags(['users', 'list'])
            ->flush();

        return redirect()
            ->route('admin.user.active');
    }

    /**
     * Безвозвратное удаление пользователя
     */
    public function userDelete($id)
    {
      //TODO реализовать метод подсчёта
      // $brands = $this->user->countBrands();
       $brands  = 1;
       if($brands){
           // вынести в ланг файл
           return "На имя данного пользователя имеются зарегистрированые бренды.<br> 
                    Удалите бренды, или пререгистрируйте их на ругого пользователя";
       }
       else {
          return ajax_respond($this->user->delete($id));
       }
    }
}
