<?php

namespace App\Http\Controllers;

use App\Classes\Parser;
use App\Models\VkFeed;
use Carbon\Carbon;
use Illuminate\Http\Request;


/**
 * Тестовый контроллер для работы с вк
 *
 * Class VkController
 * @package App\Http\Controllers
 */
class VkController extends Controller
{
    protected $parser;

    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * тестовый метод работы с парсером который толком нихрена не делает
     * кроме добавления записи в свою таблицу
     */
    public function newsFeedGet()
    {
        $this->parser->makeRequest();
        echo '101';
    }

    /**
     * метод попроще
     */
    public function simpleNewsFeedGet()
    {
        $feedItems = $this->parser->getNewsFeed();

        $this->saveData($feedItems);
    }

    /**
     * ручное полечение токена
     */
    public function getToken()
    {
        $this->parser->getToken();
    }

    /**
     * Сохраняем полученные данные в БД
     *
     * @param        $responseItems
     */
    private function saveData($responseItems)
    {
        $newItems = 0;

        foreach ($responseItems as $key => $item){
            $post[$key]['id'] = $item['post_id'];
            $post[$key]['response_item'] = json_encode($item);
            $post[$key]['group_id'] = $item['source_id'];
            $post[$key]['post_date'] = Carbon::createFromTimestamp($item['date'])->toDateTimeString();
            $post[$key]['content'] = $item['text'];
            if(isset($item['attachments'])){
                foreach($item['attachments'] as $attachment){
                    if($attachment['type'] == 'photo'){
                        foreach($attachment['photo'] as $size => $link){
                            if(preg_match('/^photo_/', $size)){
                                $post[$key][$size] = $link;
                            }
                        }
                    }
                }
            }

            try{
                //VkFeed::updateOrCreate($post[$key]);
                $feed = VkFeed::firstOrNew(['id' => $post[$key]['id']]);
                $feed->fill($post[$key])->save();
                if($feed->wasRecentlyCreated){
                    $newItems++;
                }
                dump($feed, $post[$key]);
            } catch (\Exception $e){
                dump($e);//todo заменить на нормальное исключение
            }
        }

        echo "done. New items : $newItems";
    }
}