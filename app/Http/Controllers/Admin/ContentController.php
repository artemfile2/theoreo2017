<?php

namespace App\Http\Controllers\Admin;

use App\Models\VkFeed;
use App\Models\Action;
use App\Models\Vktemp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    public function content()
    {
        $contents = VkFeed::all();
        $actions = Action::all();

        /*Получаем акции только что добавленные*/
        $actionsAdded = Action::where('status_id', 1)
            ->get();
        /*Получаем акции отклоненные и утвержденные*/
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
        $vkfeeds = VkFeed::all();
        foreach ($vkfeeds as $vkfeed)
        {
            if (!empty ($vkfeed->content))
            {
                $vktemp = new VkTemp;
                $vktemp->id = $vkfeed->id;
                $vktemp->group_id = $vkfeed->group_id;
                $vktemp->content = $vkfeed->content;
                $vktemp->post_date = $vkfeed->post_date;
                $vktemp->response_item = $vkfeed->response_item;
                $vktemp->photo_75 = $vkfeed->photo_75;
                $vktemp->photo_130 = $vkfeed->photo_130;
                $vktemp->photo_604 = $vkfeed->photo_604;
                $vktemp->photo_640 = $vkfeed->photo_640;
                $vktemp->photo_807 = $vkfeed->photo_807;
                $vktemp->photo_1280 = $vkfeed->photo_1280;
                $vktemp->photo_2560 = $vkfeed->photo_2560;
                $vktemp->status = false;
                $vktemp->save();
            }
            $vkfeed->delete();
        }

        $vktemps = VkTemp::all();
        $vktempsDeleted = VkTemp::onlyTrashed()->get();
        return view('admin.section.premoderation', [
            'title' => 'Контент из парсера на модерацию',
            'vktemps' => $vktemps,
            'vktempsDeleted' => $vktempsDeleted,
        ]);
    }

    /*public function VKFeedDownload()
    {
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
            $action->rating = 1;
            $action->save();

            $content->delete();
        }

        return redirect()
            ->route('admin.actions.get_all');
    }*/


}
