<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function userCreate()
    {
        $roles = Role::all();

        return view('admin.section.user_create', [
            'title' => 'Создание пользователя',
            'roles' => $roles,
        ]);
    }

    public function userCreatePost(Request $request)
    {
        $requestAll = $request->all();
        User::create($requestAll);

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

    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.section.user_edit', [
            'title' => 'Редактирование пользователя',
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function userEditPost(Request $request, $id)
    {
        $requestAll = $request->all();
        User::findOrFail($id)
            ->update($requestAll);

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
