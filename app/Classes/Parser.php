<?php

namespace App\Classes;

use ATehnix\LaravelVkRequester\Models\VkRequest;


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
    protected $secretKey = 'FYM7ZsNhenaTUZ9aH8zO';
    protected $serviceKey = '0034d9e80034d9e800b492e82f00609180000340034d9e858e1fe309b77f99ab78f52b2';
    protected $redirectUri = 'http://theoreo.local/vk';

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
}