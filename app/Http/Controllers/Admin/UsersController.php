<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use App\Models\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\Uploader;

class UsersController extends Controller
{
    public function users()
    {
        $users = User::all()
            ->sortByDesc('created_at');

        $usersDeleted = User::onlyTrashed()
            ->get();

        return view('admin.section.users', [
            'title' => 'Пользователи',
            'users' => $users,
            'usersDeleted' => $usersDeleted,
            /*'usersDeleted' => $this->usersGetAll()->withTrashed(),*/
        ]);
    }

    public function userCreate(Request $request, $fileError = null)
    {
        if($request->session()->has('fileError')) {
            $fileError = $request->session()->pull('fileError', 'default');
        }

        return view('admin.section.user_create', [
            'title' => 'Создание пользователя',
            'roles' => Role::all(),
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
        $userModel = User::create($requestAll);

        return redirect()
            ->route('admin.user.get_all');
    }

    /*
     * восстановление удаленного пользователя,
     * при неявном удалении из таблицы*/
    public function userRestore($id)
    {
        User::withTrashed()
            ->where('id', $id)
            ->restore();

        return redirect()
            ->route('admin.user.get_all');
    }

    /*
     * неявное удаление пользователя из таблицы
     * */
    public function userTrash($id)
    {
        User::findOrFail($id)
            ->delete();

        return redirect()
            ->route('admin.user.get_all');
    }

    public function userEdit($id, Request $request, $fileError = null)
    {
        $user = User::findOrFail($id);

        if($request->session()->has('fileError')) {
            $fileError = $request->session()->pull('fileError', 'default');
        }

        return view('admin.section.user_edit', [
            'title' => 'Редактирование пользователя',
            'user' => $user,
            'roles' => Role::all(),
            'genders' => ['женский', 'мужской'],
            'fileError' => $fileError,
        ]);
    }

    public function userEditPost(Request $request, $id, Uploader $uploader, Upload $uploadModel)
    {
        $requestAll = $request->all();
        $user = User::findOrFail($id);

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
        User::withTrashed()
            ->where('id', $id)
            ->forceDelete();

        return redirect()
            ->route('admin.user.get_all');
    }
}
