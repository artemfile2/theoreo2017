<?php

namespace App\Http\Controllers\Admin;

use App\Models\VkFeed;
use App\Models\Action;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ContentController
 * Контроллер для работы с данными, полученными из парсера
 */
class ContentController extends Controller
{
    /**
     * Главная страница модерации контента, полученного из парсера
     */
    public function content()
    {
        $contents = VkFeed::all();
        $actions = Action::all();

        //Получаем акции только что добавленные
        $actionsAdded = Action::where('status_id', 1)
            ->get();
        //Получаем акции отклоненные и утвержденные
        $actionsMove = Action::whereIn('status_id', [2,3])
            ->get();

        return view('admin.section.moderation', [
            'title' => 'Контент',
            'contents' => $contents,
            'actions' => $actions,
            'actionsAdded' =>$actionsAdded,
            'actionsMove' => $actionsMove,
        ]);
    }

    public function VKFeedDownload()
    {

        /*$contents = VkFeed::all();
        foreach ($contents as $content)
        {
            $actions = Action::create();
            $actions->fill([
                'title' => 'test',
                'brand_id' => 1,
                'status_id' => 1,
                'city_id' => 1,
                'type_id' => 1,
                'category_id' => 1,
                'description' => $content->content,
                'active_from' => date(),
                'active_to' => date(),
                'rating' => 1,
            ]);
        }*/

        $contents = VkFeed::all();
        foreach ($contents as $content)
        {
            $action = new Action;
            $action->title = mb_substr ($content->content, 0, 50);
            $action->brand_id = 1;
            $action->status_id = 1;
            $action->city_id = 1;
            $action->type_id = 1;
            $action->category_id = 1;
            $action->description = $content->content;
            $action->active_from = date('Y-m-d');
            $action->active_to = date('Y-m-d');
            $action->save();

            $content->delete();
        }

        /*VkFeed::getQuery()
            ->delete();*/


        return redirect()
            ->route('admin.actions.get_all');
    }
}
