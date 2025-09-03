<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Halaman Dashboard operator';
        // $countTeacher = User::where('role', 'teacher')->count();
        // $countClassroom = Classroom::count();
        // $countStudent = Student::where('role', 'student')->count();
        $user = Auth::guard('operator')->user();
        // $totalUsers = $countTeacher + $countStudent;
        return view(
            'operator::index',

            compact(
                'user',
                // 'countTeacher',
                // 'countStudent',
                // 'countClassroom',
                // 'totalUsers',
                'title',
            )
        );
    }

    public function teacherDashboard()
    {
        $title = 'Halaman Dashboard';
        $user = Auth::guard('teacher')->user();
        $mustChangePassword = (bool) optional($user)->must_change_password;

        return view('teacher::index', compact('title', 'mustChangePassword'));
    }
}
