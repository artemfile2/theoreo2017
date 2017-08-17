<?php

namespace App\Repositories;

use App\Models\User;

class UsersAdminRepository implements ActionRepositoryInterface
{

    public function getOne($id)
    {
        return User::findOrFail($id);
    }

    public function getAll()
    {
        $users = User::all()
            ->sortByDesc('created_at');

        $usersDeleted = User::onlyTrashed()
            ->get();

        return ['users'=>$users, 'usersDeleted'=>$usersDeleted];
    }

    public function inTrash($id){

        return User::findOrFail($id)
            ->delete();
    }

    public function restore($id){

        return User::withTrashed()
            ->where('id', $id)
            ->restore();
    }

    public function delete($id){

        return User::withTrashed()
            ->where('id', $id)
            ->forceDelete();
    }

    public function create($request){
        return User::create($request);
    }
}
