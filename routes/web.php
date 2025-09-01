<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Teacher;
use App\Http\Controllers\Password;

Route::get('/', function () {
    return view('pages.landing.index');
});

// Route::get('/teacher', function () {
//     return view('pages.teacher.index');
// });

// Login Routes
Route::group(['prefix' => 'login', 'as' => 'login.', 'controller' => Login::class], function () {
    Route::get('/portal', 'portal')->name('portal');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/student', 'studentLoginForm')->name('student');
    Route::get('/operator', 'operatorLoginForm')->name('operator');
    Route::get('/teacher', 'teacherLoginForm')->name('teacher');
    Route::post('/operator', 'loginOperator')->name('operator.post');
    Route::post('/teacher', 'loginTeacher')->name('teacher.post');
    Route::post('/student', 'loginStudent')->name('student.post');
    Route::post('/logout', 'logout')->name('logout');
});


// Admin Dashboard Routes
Route::group(
    [
        'prefix' => 'operator/',
        'as' => 'operator.',
        'middleware' => 'role:operator',
        'controller' => Dashboard::class
    ],

    function () {
        Route::get('/', 'index')->name('index');

        // Profile Routes
        // Route::group([
        //     'prefix' => 'profile',
        //     'as' => 'profile.',
        //     'controller' => ProfileController::class
        // ],

        //     function () {
        //         // Route::get('/', 'index')->name('index');
        //         Route::get('/edit', 'edit')->name('edit');
        //         // Route::post('/store', 'store')->name('store');
        //         Route::put('/{id}', 'update')->name('update');
        //         // Route::delete('/{id}', 'destroy')->name('destroy');
        // });

        // // Classroom Routes
        // Route::group([
        //     'prefix' => 'classroom/',
        //     'as' => 'classroom.',
        //     'controller' => ClassroomController::class],

        //     function () {
        //         Route::get('/', 'index')->name('index');
        //         Route::get('/create', 'create')->name('create');
        //         Route::post('/store', 'store')->name('store');
        //         Route::delete('/{id}', 'destroy')->name('destroy');
        //         Route::post('/import', 'import')->name('import');
        // });

        // Teacher Routes
        Route::group(
            [
                'prefix' => 'teachers/',
                'as' => 'teachers.',
                'controller' => Teacher::class
            ],
            function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
                Route::get('/{id}/edit', 'edit')->name('edit');
                Route::put('/{id}', 'update')->name('update');
                Route::delete('/{teacher}', 'destroy')->name('destroy');
                Route::get('/{id}', 'show')->name('show');
                Route::post('/import', 'import')->name('import');
            }
        );


        // // Student Routes
        // Route::group([
        //     'prefix' => 'students/',
        //     'as' => 'students.',
        //     'controller' => StudentController::class],
        //     function () {
        //         Route::get('/', 'index')->name('index');
        //         Route::get('/create', 'create')->name('create');
        //         Route::post('/store', 'store')->name('store');
        //         Route::get('/{id}/edit', 'edit')->name('edit');
        //         Route::put('/{id}', 'update')->name('update');
        //         Route::get('/{student}', 'show')->name('show');
        //         Route::delete('/{id}', 'destroy')->name('destroy');
        //         Route::post('/import', 'import')->name('import');
        // });


        // // Subject Routes
        // Route::group([
        //     'prefix' => 'subjects',
        //     'as' => 'subjects.',
        //     'controller' => SubjectController::class],
        //     function () {
        //         Route::get('/', 'index')->name('index');
        //         Route::get('/create', 'create')->name('create');
        //         Route::post('/store', 'store')->name('store');
        //         Route::get('/{id}/edit', 'edit')->name('edit');
        //         Route::put('/{id}', 'update')->name('update');
        //         Route::get('/{id}', 'show')->name('show');
        //         Route::delete('/{id}', 'destroy')->name('destroy');
        //         Route::post('/import', 'import')->name('import');
        // });

    }
);


// Teachers Dashboard Routes
Route::group([
    'prefix' => 'teacher',
    'as' => 'teacher.',
    'middleware' => 'role:teacher',
    'controller' => Dashboard::class
], function () {
    Route::get('/', 'teacherDashboard')->name('index');

    // Route::group(['prefix' => 'assignments/', 'as' => 'assignments.', 'controller' => AssignmentController::class], function () {
    //     Route::get('/', 'index')->name('index');
    //     Route::get('/create', 'create')->name('create');
    //     Route::post('/store', 'store')->name('store');
    //     // Route::get('/{id}/edit', 'edit')->name('edit');
    //     // Route::put('/{id}', 'update')->name('update');
    //     Route::delete('/{id}', 'destroy')->name('destroy');
    // });

    // Route::group(['prefix' => 'virtual-class/', 'as' => 'virtual-class.', 'controller' => VirtualClassController::class], function () {
    //     Route::get('/', 'index')->name('index');
    //     Route::get('/create', 'create')->name('create');
    //     Route::post('/store', 'store')->name('store');
    //     Route::get('/{id}/edit', 'edit')->name('edit');
    //     Route::put('/{id}', 'update')->name('update');
    //     Route::delete('/{id}', 'destroy')->name('destroy');
    // });

    // Route::group(['prefix' => 'materials/', 'as' => 'materials.', 'controller' => MaterialController::class], function () {
    //     Route::get('/', 'index')->name('index');
    //     Route::get('/create', 'create')->name('create');
    //     Route::post('/store', 'store')->name('store');
    //     // Route::get('/{id}/edit', 'edit')->name('edit');
    //     // Route::put('/{id}', 'update')->name('update');
    //     Route::delete('/{id}', 'destroy')->name('destroy');
    //     Route::get('/{id}/download', 'download')->name('download');
    // });

    // Route::group([
    //     'prefix' => 'profile',
    //     'as' => 'profile.',
    //     'controller' => ProfileController::class
    // ],

    //     function () {
    //         Route::get('/edit', 'edit_teacher')->name('edit');
    //         Route::put('/{id}', 'update_teacher')->name('update');
    // });

    // Route::group(['prefix' => 'icebreaking/', 'as' => 'icebreaking.', 'controller' => IcebreakingController::class], function () {
    //     Route::get('/', 'index')->name('index');
    //     Route::get('/create', 'create')->name('create');
    //     Route::post('/store', 'store')->name('store');
    //     // Route::get('/{id}/edit', 'edit')->name('edit');
    //     // Route::put('/{id}', 'update')->name('update');
    //     Route::delete('/{id}', 'destroy')->name('destroy');
    // });

});



// Password Change Routes
Route::group([
    'prefix' => 'password',
    'as' => 'password.',
    'controller' => Password::class],

function () {
    // Route::get('/change', 'showChangeForm')->name('password.change.form');
    Route::post('/change', 'update')->name('change.update');
});

