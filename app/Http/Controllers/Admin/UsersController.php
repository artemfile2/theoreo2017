<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\Uploader;
use App\Repositories\ActionRepositoryInterface;

class UsersController extends Controller
{

    protected $user;

    public function __construct(ActionRepositoryInterface $user, Request $request)
    {
        $this->user = $user;
    }

    public function users()
    {
        $users = $this->user->getAll();

        /*echo dump($users['users']);
        echo "<br>";
        echo dump($users['usersDeleted']);*/

        return view('admin.section.users', [
            'title' => 'Пользователи',
            'users' => $users['users'],
            'usersDeleted' => $users['usersDeleted'],
        ]);
    }

    public function userCreate(Request $request, $fileError = null)
    {
        if($request->session()->has('fileError')) {
            $fileError = $request->session()->pull('fileError', 'default');
        }

        $roles = Role::all();

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

        $this->user->create($requestAll);

        return redirect()
            ->route('admin.user.get_all');
    }

    /*
     * восстановление удаленного пользователя,
     * при неявном удалении из таблицы*/
    public function userRestore($id)
    {
        $this->user->restore($id);

        return redirect()
            ->route('admin.user.get_all');
    }

    /*
     * неявное удаление пользователя из таблицы
     * */
    public function userTrash($id)
    {
        $this->user->inTrash($id);

        return redirect()
            ->route('admin.user.get_all');
    }

    public function userEdit($id, Request $request, $fileError = null)
    {
        $user = $this->user->getOne($id);
        $roles = Role::all();

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

        $user->update($requestAll);

        return redirect()
            ->route('admin.user.get_all');
    }

    /*
     * полное удаление пользователя из таблицы
     * */
    public function userDelete($id)
    {
        $this->user->delete($id);

        return redirect()
            ->route('admin.user.get_all');
    }
}
