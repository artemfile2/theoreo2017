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
        foreach ($responseItems as $item){
            //dump($item);
            $item['response_item'] = json_encode($item);
            unset($item['type']);
            $item['id'] = $item['post_id'];
            unset($item['post_id']);
            $item['group_id'] = $item['source_id'];
            unset($item['source_id']);
            $item['post_date'] = Carbon::createFromTimestamp($item['date'])->toDateTimeString();
            unset($item['date']);
            unset($item['post_type']);
            $item['content'] = $item['text'];
            unset($item['text']);
            unset($item['copy_history']);
            unset($item['marked_as_ads']);
            unset($item['post_source']);
            unset($item['comments']);
            unset($item['likes']);
            unset($item['reposts']);
            if(isset($item['attachments'])){
                foreach($item['attachments'] as $attachment){
                    if($attachment['type'] == 'photo'){
                        foreach($attachment['photo'] as $key => $link){
                            if(preg_match('/^photo_/', $key)){
                                $item[$key] = $link;
                            }
                        }
                    }
                }
                unset($item['attachments']);
            }
            if(isset($item['signer_id'])){
                unset($item['signer_id']);
            }
            dump($item);

            try{
                VkFeed::updateOrCreate($item);
            } catch (\Exception $e){
                dump($e);
            }

        }
        /*
        try{
            VkFeed::updateOrCreate($responseItems);
        } catch (\Exception $e){
           dump($e);
        }
        */
    }
}