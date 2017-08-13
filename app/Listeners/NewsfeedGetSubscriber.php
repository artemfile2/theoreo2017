<?php

namespace App\Listeners;

use ATehnix\LaravelVkRequester\Contracts\Subscriber;
use ATehnix\LaravelVkRequester\Models\VkRequest;


/**
 * Базовый Subscriber адаптированный
 * из примера библотеки парсера
 *
 * Class NewsfeedGetSubscriber
 * @package App\Listeners
 */
class NewsfeedGetSubscriber extends Subscriber
{
    /** @var string Метод Апи запроса */
    protected $apiMethod = 'newsfeed.get';

    /** @var string Тэг запроса */
    protected $tag = 'default';

    /**
     * Что делаем в случае удачи
     *
     * @param VkRequest $request
     * @param mixed     $response
     */
    public function onSuccess(VkRequest $request, $response)
    {
        // TODO: Implement onSuccess() method.
    }

    /**
     * Что делаем в случае неудачи
     *
     * @param VkRequest $request
     * @param array     $error
     */
    public function onFail(VkRequest $request, array $error)
    {
        parent::onFail($request, $error); // TODO: Change the autogenerated stub
    }
}