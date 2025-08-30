<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Periksa apakah pengguna terautentikasi di salah satu guard
        if (!Auth::guard('student')->check() && !Auth::guard('teacher')->check() && !Auth::guard('operator')->check()) {
            return redirect()->route('login.portal')->withErrors('Unauthorized access. Please log in.');
        }

        // Ambil role pengguna sesuai dengan guard yang terautentikasi
        $userRole = null;

        if (Auth::guard('student')->check()) {
            $userRole = Auth::guard('student')->user()->role; // Ambil role student
        } elseif (Auth::guard('teacher')->check()) {
            $userRole = Auth::guard('teacher')->user()->role; // Ambil role teacher
        } elseif (Auth::guard('operator')->check()) {
            $userRole = Auth::guard('operator')->user()->role; // Ambil role operator
        }

        // Cek apakah role pengguna ada dalam list role yang diizinkan
        if (!in_array($userRole, $roles)) {
            return abort(403, 'Unauthorized access.'); // Respon Forbidden
        }

        return $next($request);
    }
}
