<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    /*
     * панель управления, главная страница в админке*/
    public function index()
    {
        $users = User::all()
            ->sortByDesc('created_at');

        $brands = Brand::all()
            ->sortByDesc('created_at');

        return view('admin.section.control_panel', [
            'title' => 'Панель управления',
            'users' => $users,
            'brands' => $brands,
        ]);
    }

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
        return view('admin.section.user_create', [
            'title' => 'Создание пользователя',
        ]);
    }

    public function userCreatePost(Request $request)
    {
        $requestAll = $request->all();
        User::create($requestAll);

        return $this->users();
    }

    /*
     * восстановление удаленного пользователя,
     * при неявном удалении из таблицы*/
    public function userRestore($id)
    {
        User::withTrashed()
            ->where('id', $id)
            ->restore();

        return $this->users();
    }

    /*
     * неявное удаление пользователя из таблицы
     * */
    public function userTrash($id)
    {
        User::findOrFail($id)
            ->delete();

        return $this->users();
    }

    public function userEdit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.section.user_edit', [
            'title' => 'Редактирование пользователя',
            'user' => $user,
        ]);
    }

    /*
     * полное удаление пользователя из таблицы
     * */
    public function userDelete($id)
    {
        User::withTrashed()
            ->where('id', $id)
            ->forceDelete();

        return $this->users();
    }

    public function brands()
    {
        return view('admin.section.brands', [
            'title' => 'Компании',
        ]);
    }

    public function actions()
    {
        return view('admin.section.actions', [
            'title' => 'Акции',
        ]);
    }

/*    public function comments()
    {
        return view('admin.section.comments', [
            'title' => 'Комментарии',
        ]);
    }*/

    public function content()
    {
        return view('admin.section.moderation', [
            'title' => 'Контент',
        ]);
    }

    public function logs()
    {
        return view('admin.section.logs', [
            'title' => 'Логи парсера',
        ]);
    }

    public function queries()
    {
        return view('admin.section.queries', [
            'title' => 'Поисковые запросы',
        ]);
    }
}
