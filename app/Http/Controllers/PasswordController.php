<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function showChangeForm()
    {
        // Kalau user buka /password/change secara manual,
        // kita balikkan ke dashboard mereka dan paksa buka modal via flash session.
        return redirect()->route('teacher.index')->with('forcePasswordModal', true);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        /** @var User $user */
        $user = Auth::guard('teacher')->user()
            ?? Auth::guard('student')->user();

        if (!$user) {
            return redirect('/')->withErrors('Unauthorized access. Please log in.');
        }

        $user->password = Hash::make($request->password);
        $user->must_change_password = false;
        $user->save();

        return redirect('/')
            ->with('success', 'Password berhasil diperbarui. Silakan login kembali.');
    }
}
