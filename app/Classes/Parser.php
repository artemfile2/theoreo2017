<?php

namespace App\Classes;

use ATehnix\LaravelVkRequester\Models\VkRequest;
use ATehnix\VkClient\Client;


/**
 * Тестовый класс с будущими методами нашего парсера
 *
 * Class Parser
 * @package App\Classes
 */
class Parser
{
    /** @var int величина в секундах на сколько будет сдвиг start_time */
    protected $shiftTime = (60 * 60 * 24);

    /** вшитый access token полученный вручную */
    protected $access_token = '74d410432bfa7a21d22203baf13b8fa4ef77199e80fe17689d68df3a36b98f7acd2607bb5213ac39a816b';

    const AUTHORIZE_URL = 'https://oauth.vk.com/authorize?';

    /**
     * тестовый запрос, в идеала надо заставить его работать
     */
    public function makeRequest()
    {
        VkRequest::create([
            'method'     => 'newsfeed.get',
            'parameters' => $this->getNewsFeedParams(),
            'token'      => $this->access_token,
        ]);
    }

    /**
     * простой запрос новостной ленты
     */
    public function getNewsFeed()
    {
        $api = new Client();
        $api->setDefaultToken($this->access_token);
        $api->setPassError(true);
        $feed = $api->request('newsfeed.get', $this->getNewsFeedParams());

        return $feed['response']['items'];
    }

    /**
     * Получаем массив с параметрами для запроса новостной стены
     * @return array
     */
    private function getNewsFeedParams()
    {
        return [
            'filters' => 'post',
            'start_time' => time() - $this->shiftTime,
            'count' => 100
        ];
    }

    /**
     * Получение бесконечного токена
     */
    public function getToken()
    {
        $data = [
            'client_id' => config('vk-requester.client_id'),
            'redirect_uri' => config('vk-requester.redirect_uri'),
            'display' => 'page',
            'scope' => 'wall,friends,offline',
            'response_type' => 'token',
            'v' => '5.67',
        ];

        $url = urldecode(self::AUTHORIZE_URL . http_build_query($data));

        header("Location: $url");
    }
}