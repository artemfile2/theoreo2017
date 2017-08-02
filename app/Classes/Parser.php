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
    protected $clientId = '5523560';
    protected $secretKey = 'ALxOJTdE08wDrqas36Pt';
    protected $serviceKey = '557ce824557ce824557ce824555528a04c5557c557ce8240c03ef0ac198342351fb5698';
    protected $redirectUri = 'http://theoreo.local/vk';
    protected $access_token = '5cbd5f86c5aa899416ef79d70150cb1e4f0fe5686afaedcac98c87f30211aa3a5b17749f20461eacb19dd';

    const AUTHORIZE_URL = 'https://oauth.vk.com/authorize?';
    const ACCESS_TOKEN_URL = 'https://oauth.vk.com/access_token?';

    public function getToken($code)
    {
        $data = [
            'client_id' => $this->clientId,
            'client_secret' => $this->secretKey,
            'redirect_uri' => $this->redirectUri,
            'code' => $code,
        ];

        $url = urldecode(self::ACCESS_TOKEN_URL . http_build_query($data));

        $cd = curl_init($url);

        curl_setopt($cd, CURLOPT_RETURNTRANSFER, true);

        $result = json_decode(curl_exec($cd));
        curl_close($cd);

        dump($result);
        echo $result->access_token;
    }

    public function getCode()
    {
        $data = [
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'display' => 'page',
            'scope' => 'wall,friends',
            'response_type' => 'code',
            'v' => '5.67',
        ];

        $url = urldecode(self::AUTHORIZE_URL . http_build_query($data));

//        $cd = curl_init($url);
//
//        curl_setopt($cd, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($cd, CURLOPT_FRESH_CONNECT, true);
//        curl_setopt($cd, CURLINFO_HEADER_OUT, true);
//        curl_setopt($cd, CURLOPT_FOLLOWLOCATION, true);
//
//        dump(curl_exec($cd));
//        dump(curl_getinfo($cd));
//
//        curl_close($cd);

        //echo 'h';
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
                dump($item['attachments'] ?? '');
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