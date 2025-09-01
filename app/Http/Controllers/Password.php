<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Password extends Controller
{
    public function showChangeForm()
    {
        return view('auth.change-password'); // Buat blade form
    }

    public function update(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->password);
        $user->must_change_password = false; // Setelah ganti password pertama kali
        $user->save();

        return redirect('/')->with('success', 'Password berhasil diperbarui.');
    }
}
