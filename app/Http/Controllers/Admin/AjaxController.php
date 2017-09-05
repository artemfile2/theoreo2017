<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;

class AjaxController extends Controller
{

    public function categoryAddPost(Request $request)
    {
        $categories = Category::all();
        $categories_names = $categories->pluck('name');
        $categories_codes = $categories->pluck('code');

        if($categories_names->contains($request->name)) {
            return "Категория с таким именем уже существует в базе данных.";
        }
        elseif($categories_codes->contains($request->code)) {
            return "Категория с таким кодом уже существует в базе данных.";
        }
        else {
            $categoryModel = Category::create([
                'code' => $request->code,
                'name' => $request->name,
            ]);

            Cache::tags(['categories', 'list'])
                ->flush();

            $result = ($categoryModel->id) ? $categoryModel->id : 'Не удалось сохранить категорию!';
            return $result;
        }
    }


    public function tagAddPost(Request $request)
    {
        $tags = Tag::pluck('name');

        if($tags->contains($request->name)) {
            return "Тег с таким именем уже существует в базе данных.";
        }
        else {
            $tagModel = Tag::create([
                'name' => $request->name,
            ]);

            Cache::tags(['tags', 'list'])
                ->flush();

            $result = ($tagModel->id) ? $tagModel->id : 'Не удалось сохранить тег!';
            return $result;
        }
    }
}
