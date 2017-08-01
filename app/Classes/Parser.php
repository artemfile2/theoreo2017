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
    protected $clientId;
    protected $secretKey;
    protected $serviceKey;
    protected $redirectUri;
    protected $token;
    protected $auth;

    public function __construct()
    {
        $this->clientId = config('vk-requester.connect.client_id');
        $this->secretKey = config('vk-requester.connect.secret_key');
        $this->serviceKey = config('vk-requester.connect.service_key');
        $this->redirectUri = config('vk-requester.connect.redirect_uri');
        $this->auth =  resolve('ATehnix\VkClient\Auth');



    }
    /**
     * тестовый запрос
     */
    public function makeRequest($token)
    {
        VkRequest::create([
            'method'     => 'newsfeed.get',
            'parameters' => ['filters' => 'post'],
            'token'      => $token,
        ]);
    }

    /**
     * еще один тестовый запрос

    public function makeSimpleRequest($token)
    {
        $api = new Client();
        dd($api->request('newsfeed.get', ['filters' => 'post'], $token, '5.62'));
    }
*/
    public function makeSimpleRequest($token)
    {



        $url = 'https://api.vk.com/method/newsfeed.get?filters=post&access_token='.$token.'&v=5.62';
        $result = json_decode(file_get_contents($url));
        dd($result);


        $api = new Client();
        dd($api->request('newsfeed.get', ['filters' => 'post'], $token, '5.62'));
    }

    /**
     * попытка достать ключик
     * пример из описания библиотеки
     */
    public function vkauth()
    {
        echo '<a href="https://oauth.vk.com/authorize?client_id='.$this->clientId.'&display=page&redirect_uri='.$this->redirectUri.'&scope=friends,wall,offline&response_type=token&v=5.67"> Войти через VK.Com </a><hr>';
    }

    public function token($code)
    {
        if (!$code) {
            return false;
        }
        return  $this->auth->getToken($code);
    }

    public function  json_auth(){

        $url = 'href="https://oauth.vk.com/authorize?client_id='.$this->clientId.'&display=page&redirect_uri='.$this->redirectUri.'&scope=wall&response_type=token&v=5.67';
        $result = json_decode(file_get_contents($url));
        dd($result);

    }




}