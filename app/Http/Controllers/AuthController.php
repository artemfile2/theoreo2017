<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


/**
 * Class AuthController
 * Контроллер для работы с аутентификацией
 */
class AuthController extends Controller
{
    const ADMIN_ACCESS = 'admin_access';

    /**
     * Логин
     */
    public function login()
	{
	    return view('auth.login');
	}

    /**
     * Обработка данных для аутентификации
     */
	public function loginPost(Request $request)
    {
        $remember = $request->input('remember') ? true : false;

        $authResult = Auth::attempt([
            'login' => $request->input('login'),
            'password' => $request->input('password'),
        ], $remember);

        if ($authResult) {
            if(Auth::user()->hasPrivilege(self::ADMIN_ACCESS)) {
                return redirect()->route('admin');
            }
            else {
                return redirect()->route('client.index');
            }
        }
        else {
            return redirect()
                ->route('login')
                ->with('authError', trans('custom.wrong_password'));
        }
    }

    /**
     * Логаут
     */
	public function logout()
	{
		Auth::logout();
		return redirect()->route('client.index');
	}
}