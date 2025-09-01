<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class MustChangePassword
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->must_change_password) {
            if (!$request->is('password/change') && !$request->is('password/change/*')) {
                return redirect()->route('password.change.form');
            }
        }
        return $next($request);
    }
}
