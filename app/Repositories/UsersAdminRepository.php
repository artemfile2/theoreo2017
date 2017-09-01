<?php

namespace App\Repositories;

use App\Models\User;

class UsersAdminRepository implements ActionRepositoryInterface
{
    /*
     * Получает одну запись из таблицы Юзеры*/
    public function getOne($id)
    {
        return User::findOrFail($id);
    }

    /*
     * Получает все записи из таблицы Юзеры
     * возвращает массив
     * $users - все пользователи, кроме удаленных
     * $usersDeleted - все удаленные пользователи*/
    public function getAll()
    {
        $users = User::all()
            ->sortByDesc('created_at');

        $usersDeleted = User::onlyTrashed()
            ->get();

        return ['users'=>$users, 'usersDeleted'=>$usersDeleted];
    }
    /* получает активных пользователей */
    public function getActive()
    {
        return User::all()
            ->sortByDesc('created_at');
    }
    /* получает удалённых пользователей */
    public function getTrashed()
    {
        return User::onlyTrashed()
            ->get();
    }

    /*
     * Мягкое удаление пользователя */
    public function inTrash($id){

        return User::findOrFail($id)
            ->delete();
    }

    /*
     * Восстановление пользователя из удаленных*/
    public function restore($id){

        return User::withTrashed()
            ->where('id', $id)
            ->restore();
    }

    /*
     * Безвозратное удаление пользователя*/
    public function delete($id){

        return User::withTrashed()
            ->where('id', $id)
            ->forceDelete();
    }

    /*
     * Создание нового пользователя
     * $request - получает все данные пользователя из формы*/
    public function create($request){
        return User::create($request);
    }
}
