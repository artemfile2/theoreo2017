<?php

namespace App\Classes;

use ATehnix\LaravelVkRequester\Models\VkRequest;
use ATehnix\VkClient\Auth;
use ATehnix\VkClient\Client;
use ATehnix\VkClient\Exceptions\AccessDeniedVkException;
use ATehnix\VkClient\Exceptions\TooManyRequestsVkException;
use ATehnix\VkClient\Requests\{Request,ExecuteRequest};


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
    protected $access_token = '5cbd5f86c5aa899416ef79d70150cb1e4f0fe5686afaedcac98c87f30211aa3a5b17749f20461eacb19dd';

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
        $groups = $api->request('groups.get', [
            'count' => 25,
            'extended' => 1
        ]);

        $requests = [];

        $time1 = microtime(true);

        foreach ($groups['response']['items'] as $item){
            $requests[] = new Request('wall.get', [
                'owner_id' => '-' . $item['id'],
                'count' => 20
            ]);
        }

        $execute = ExecuteRequest::make($requests);

        $feeds = $api->send($execute);

        $time2 = microtime(true) - $time1;

        foreach($feeds['response'] as $feed){
            foreach($feed['items'] as $item){
                dump($item['attachments']);
            }
        }

        dump($feeds, $time2);
        //debug($feeds);
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