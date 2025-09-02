<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class MustChangePassword
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('teacher')->user()
            ?? Auth::guard('student')->user()
            ?? Auth::guard('operator')->user();
;

        if (!$user) {
            return redirect('/')->withErrors('Unauthorized access. Please log in.');
        }

        // kalau user tidak wajib ganti password, blokir akses ke /password/*
        if (!$user->must_change_password) {
            return abort(403, 'Anda tidak diwajibkan mengganti password.');
        }

        return $next($request);
    }
}
