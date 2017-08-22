<?php
namespace App\Repositories;

use App\Models\Action;

class ActionAdminRepository implements ActionRepositoryInterface
{
    public function getOne($id){
        return Action::findOrFail($id);
    }

    public function getAll(){

        $actions = Action::all();

        $actionsDeleted = Action::onlyTrashed()
            ->get();

        return ['actions'=>$actions, 'actionsDeleted'=>$actionsDeleted];
    }

    public function inTrash($id){

        return Action::findOrFail($id)
                ->delete();
    }

    public function restore($id){

        return Action::withTrashed()
            ->where('id', $id)
            ->restore();
    }

    public function delete($id){

        return Action::withTrashed()
            ->where('id', $id)
            ->forceDelete();
    }

    public function create($request){
        return Action::create($request);
    }
}