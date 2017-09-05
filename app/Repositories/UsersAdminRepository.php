<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

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
        $users = User::with(['role', 'upload'])
            ->orderByDesc('created_at')
            ->get();

        $usersDeleted = User::with(['role', 'upload'])
            ->onlyTrashed()
            ->get();

        return ['users' => $users, 'usersDeleted' => $usersDeleted];
    }

    /* получает активных пользователей */
    public function getActive()
    {
        return User::with(['role', 'upload'])
            ->orderByDesc('created_at')
            ->get();
    }

    /* получает удалённых пользователей */
    public function getTrashed()
    {
        return User::with(['role', 'upload'])
            ->onlyTrashed()
            ->get();
    }

    /*
     * Мягкое удаление пользователя */
    public function inTrash($id)
    {
        Cache::tags(['users', 'list'])
            ->flush();

        Cache::tags(['users', 'trashed'])
            ->flush();

        return User::findOrFail($id)
            ->delete();
    }

    /*
     * Восстановление пользователя из удаленных*/
    public function restore($id)
    {
        Cache::tags(['users', 'list'])
            ->flush();

        Cache::tags(['users', 'trashed'])
            ->flush();

        return User::withTrashed()
            ->where('id', $id)
            ->restore();
    }

    /*
     * Безвозратное удаление пользователя*/
    public function delete($id)
    {
        Cache::tags(['users', 'trashed'])
            ->flush();

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
