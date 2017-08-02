<?php

namespace App\Http\Controllers;

use App\Classes\Parser;
use Illuminate\Http\Request;


/**
 * Тестовый контроллер для работы с вк
 *
 * Class VkController
 * @package App\Http\Controllers
 */
class VkController extends Controller
{
    protected $parser;

    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * тестовый метод работы с парсером который толком нихрена не делает
     * кроме добавления записи в свою таблицу
     *
     * @param Parser $parser
     */
    public function newsFeedGet()
    {
        $this->parser->makeRequest();
        echo '101';
    }

    /**
     * метод попроще
     *
     * @param Parser $parser
     */
    public function simpleNewsFeedGet()
    {
        $this->parser->makeSimpleRequest();
    }

    /**
     * пробуем надыбать ключик
     *
     * @param Parser $parser
     */
    public function auth()
    {
        $this->parser->vkauth();
    }

    public function getCode()
    {
        $this->parser->getCode();
    }

    public function getToken(Request $request)
    {
        $this->parser->getToken($request->code);
    }

}