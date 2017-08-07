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
     *
     * @param Parser $parser
     */

    public function newsFeedGet(Request $request, Parser $parser)
    {
        $token = $request->cookie('vk_token');
        if(!$token){
            return redirect()
                ->route('vkauth');
        }
        $parser->makeClientRequest($token);

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
                ->route('vkauth');
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
                    ->route('parser')
                    ->cookie(cookie('vk_token',$token, 43200));
            }
        }else{
            $url = $parser->vkauth();

            return view('parser.vk_auth', ['url' => $url]);

        }

    }


}