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

    public function makeSimpleRequest()
    {
        $api = new Client();
        echo $api->request('newsfeed.get', ['filters' => 'post'], $this->code);
    }

    public function vkauth()
    {
        $auth = new Auth($this->clientId, $this->secretKey, $this->redirectUri);
        echo "<a href='{$auth->getUrl()}'> Войти через VK.Com </a><hr>";

        if (Request::exists('code')) {
            echo 'Token: '.$auth->getToken(Request::get('code'));
        }
    }
}