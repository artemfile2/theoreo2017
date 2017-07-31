<?php

namespace App\Classes;

use ATehnix\LaravelVkRequester\Models\VkRequest;
use ATehnix\VkClient\Auth;
use ATehnix\VkClient\Client;
use Illuminate\Support\Facades\Request;


/**
 * Тестовый класс с будущими методами нашего парсера
 *
 * Class Parser
 * @package App\Classes
 */
class Parser
{
    protected $clientId;
    protected $secretKey;
    protected $serviceKey;
    protected $redirectUri;
    protected $code;

    public function __construct()
    {
        $this->clientId = config('vk-requester.connect.client_id');
        $this->secretKey = config('vk-requester.connect.secret_key');
        $this->serviceKey = config('vk-requester.connect.service_key');
        $this->redirectUri = config('vk-requester.connect.redirect_uri');
        $this->code = '86622b37e4148918fd';
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
        echo $api->request('newsfeed.get', ['filters' => 'post'], $this->code);
    }

    /**
     * попытка достать ключик
     * пример из описания библиотеки
     */
    public function vkauth()
    {
        $auth = new Auth($this->clientId, $this->secretKey, $this->redirectUri);
        echo "<a href='{$auth->getUrl()}'> Войти через VK.Com </a><hr>";

        if (Request::exists('code')) {
            echo 'Token: '.$auth->getToken(Request::get('code'));
        }
    }
}