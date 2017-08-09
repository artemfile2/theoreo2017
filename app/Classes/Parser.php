<?php

namespace App\Classes;

use ATehnix\LaravelVkRequester\Models\VkRequest;
use ATehnix\VkClient\Auth;
use ATehnix\VkClient\Client;
use ATehnix\VkClient\Exceptions\AccessDeniedVkException;
use ATehnix\VkClient\Exceptions\TooManyRequestsVkException;
use ATehnix\VkClient\Requests\{Request,ExecuteRequest};
use Illuminate\Support\Facades\Redirect;


/**
 * Тестовый класс с будущими методами нашего парсера
 *
 * Class Parser
 * @package App\Classes
 */
class Parser
{

    /** временно разместил здесь известные ключи */
    protected $access_token = '74d410432bfa7a21d22203baf13b8fa4ef77199e80fe17689d68df3a36b98f7acd2607bb5213ac39a816b';

    const AUTHORIZE_URL = 'https://oauth.vk.com/authorize?';

    /**
     * Получение бесконечного токена
     * который захардкоден выше
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

    /**
     * тестовый запрос
     */
    public function makeRequest()
    {
        VkRequest::create([
            'method'     => 'newsfeed.get',
            'parameters' => ['filters' => 'post'],
            'token'      => env('VKONTAKTE_SECRET'),
        ]);
    }

    /**
     * еще один тестовый запрос
     */
    public function makeSimpleRequest()
    {
        $api = new Client();
        $api->setDefaultToken($this->access_token);
        $api->setPassError(true);
        $groups = $api->request('newsfeed.get', [
            'filters' => 'post',
            'start_time' => time() - (60 * 60 * 24),
            'count' => 100
        ]);

        dump($groups);
        dump($groups['response']['items']);
    }
}