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
    /**
     * тестовый метод работы с парсером который толком нихрена не делает
     * кроме добавления записи в свою таблицу
     *
     * @param Parser $parser
     */

    public function newsFeedGet(Request $request, Parser $parser)
    {
        $token = $request->cookie('vk_token');
        if(!$token){
            return redirect()
                ->route('auth');
        }
        $parser->makeRequest($token);
        echo '101';
    }

    /**
     * метод попроще
     *
     * @param Parser $parser
     */
    public function simpleNewsFeedGet(Request $request, Parser $parser)
    {
        $token = $request->cookie('vk_token');
        if(!$token){
            return redirect()
                ->route('auth');
        }
        $parser->makeSimpleRequest($token);
    }

    /**
     * добываем ключик и ставим его в куку
     *
     * @param Parser $parser
     */
    public function auth(Request $request,Parser $parser)
    {
        if ($request->exists('access_token')) {
            $token = $request->get('access_token');
            if($token){
                return redirect()
                    ->route('home')
                    ->cookie(cookie('vk_token',$token, 30));
            }
        }else{
            $url = $parser->vkauth();

            return view('vk_auth', ['url' => $url]);

        }

    }


}