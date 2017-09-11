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
        return User::with(['role', 'upload'])
            ->orderByDesc('created_at')
            ->get();
    }


    /*
     * Безвозратное удаление пользователя*/
    public function delete($id)
    {
        Cache::tags(['users'])
            ->flush();

        return User::where('id', $id)
            ->forceDelete();
    }

    /*
     * Создание нового пользователя
     * $request - получает все данные пользователя из формы*/
    public function create($request){
        return User::create($request);
    }
}
