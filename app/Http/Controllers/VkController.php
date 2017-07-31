<?php

namespace App\Http\Controllers;

use App\Classes\Parser;


/**
 * Тестовый контроллер для работы с вк
 *
 * Class VkController
 * @package App\Http\Controllers
 */
class VkController extends Controller
{
    /**
     * тестовый метод работы с парсером который толком нихрена не делает
     * кроме добавления записи в свою таблицу
     *
     * @param Parser $parser
     */
    public function newsFeedGet(Parser $parser)
    {
        $parser->makeRequest();
        echo '101';
    }

    /**
     * метод попроще
     *
     * @param Parser $parser
     */
    public function simpleNewsFeedGet(Parser $parser)
    {
        $parser->makeSimpleRequest();
    }

    /**
     * пробуем надыбать ключик
     *
     * @param Parser $parser
     */
    public function auth(Parser $parser)
    {
        $parser->vkauth();
    }
}