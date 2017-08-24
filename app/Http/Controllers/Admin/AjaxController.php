<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{

    public function categoryAddPost()
    {
        //TODO получить данные из массива и сохранить категорию.
        $category_id = 13;
        return $category_id;

        /*Формат возврата ( по прочтении стереть ;) )
        return $category_id;  // Всплывашка проверит, что это число и обновит селект
        return 'Категория уже существует!'; // всплывашка, увидев строку вместо числа, выведет строку.
        return 'Не удалось сохранить категорию!';
        */
    }

    public function tagAddPost()
    {
        //TODO получить данные из массива и сохранить тэг.
        $tag_id = 20;
        return $tag_id;

        /*Формат возврата ( по прочтении стереть ;) )
        return $tag_id;  // Всплывашка проверит, что это число и обновит селект
        return 'Тэг уже существует!'; // всплывашка, увидев строку вместо числа, выведет строку.
        return 'Не удалось сохранить тэг!';
        */
    }


}
