<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/**
 * Class AccessAdminPanel
 * Посредник для управления доступом к админ-панели в общем и к отдельным ее пунктам
 */
class AccessAdminPanel
{
    public function handle($request, Closure $next, $privilege = '')
    {
        if (Auth::check()) {
            $privilege = explode(',', $privilege);
            foreach($privilege as $one){
                if (Auth::user()->cannot($one, User::class)) {
                    abort(403);
                }
            }

            return $next($request);
        }

        return redirect(route('login'));
    }
}
