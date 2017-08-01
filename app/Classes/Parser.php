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
    /** временно разместил здесь известные ключи */
    protected $clientId = '5523560';
    protected $secretKey = 'ALxOJTdE08wDrqas36Pt';
    protected $serviceKey = '557ce824557ce824557ce824555528a04c5557c557ce8240c03ef0ac198342351fb5698';
    protected $redirectUri = 'http://theoreo.local/vk';
    protected $code = '86622b37e4148918fd';
    protected $access_token = 'b6aa3d39db8a72dad399def8b8267c97759174f6cb279db152385fbb83644f2830862f888697a74f0428b';

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
        $friends = $api->request('friends.get');
        $wall = $api->request('wall.get');
        dump($friends, $wall);
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