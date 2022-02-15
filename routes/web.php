<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApimessageController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CronjobController;
use PhpParser\Node\Identifier;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is clear";
});

Route::get('/cron', function () {
    Artisan::call('msgupdate:cron');
});
Route::get('/cronjob', [CronjobController::class, 'cronjob'])->name('cronjob');

//Auth::routes();
Route::prefix('/admin')->group(function () {
    // Auth route
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/login/{slug}', [LoginController::class, 'Studiologin'])->name('studio-login');
    Route::post('/studiologin', [LoginController::class, 'StudiologinCheck'])->name('studio-login-check');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('/password/confirm', [ConfirmPasswordController::class, 'confirm'])->name('password.confirm');

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token?}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    // Auth route End

    Route::middleware('auth')->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //profile of login user
    Route::prefix('profile')->middleware('auth')->group(function () {
        Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
        Route::get('/profile-setting', [App\Http\Controllers\ProfileController::class, 'setting'])->name('profile.setting');

        Route::post('/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
        Route::get('/change-password', [App\Http\Controllers\ProfileController::class, 'change_password'])->name('profile.change.pwd');
        Route::post('/store-password', [App\Http\Controllers\ProfileController::class, 'changePassword'])->name('profile.change.store');
    });
    //user
    Route::prefix('user')->middleware('auth')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/list', [UserController::class, 'list'])->name('user.list');
        // Route::prefix('/')->middleware('righttwo')->group(function () {
        Route::get('/add/{id?}', [UserController::class, 'add'])->name('user.add');
        Route::get('/view/{id?}', [UserController::class, 'userview'])->name('user.view');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::post('/destroy', [UserController::class, 'destroy'])->name('user.destroy');
        Route::post('/checkemail/{id?}', [UserController::class, 'checkEmail'])->name('user.checkemail');
        //});
    });
    //api message
    Route::prefix('oldmessage')->middleware(['auth'])->group(function () {
        Route::get('/', [ApimessageController::class, 'index'])->name('old-message');
        Route::any('/list', [ApimessageController::class, 'getmessage'])->name('old-message.list');
        Route::post('/view', [ApimessageController::class, 'view'])->name('old-message.view');
        Route::post('/send', [ApimessageController::class, 'send_msg'])->name('old-message.send');
        Route::post('/get_user', [ApimessageController::class, 'get_user'])->name('old-message.getuser');
        Route::post('/change_user', [ApimessageController::class, 'change_user'])->name('old-message.changeuser');
        Route::post('/msg_count', [ApimessageController::class, 'msg_count'])->name('old-message.count');
    });

    Route::prefix('notes')->middleware(['auth'])->group(function () {
        Route::post('/list', [NoteController::class, 'list'])->name('notes.list');
        Route::post('/add', [NoteController::class, 'add'])->name('notes.add');
    });


    Route::prefix('chat')->middleware(['auth'])->group(function () {
        Route::get('/', [ChatController::class, 'index'])->name('chat');
        Route::post('/get_info', [ChatController::class, 'get_info'])->name('chat.info');
        Route::post('/get_msg_count', [ChatController::class, 'get_msg_count'])->name('chat.msgcount');
    });
    Route::get('chat/cronjob', [ChatController::class, 'cronjob'])->name('chat.cronjob');
});

//user
Route::prefix('supervisor')->middleware('auth')->group(function () {
    Route::get('/', [SupervisorController::class, 'index'])->name('supervisor.index');
    Route::get('/list', [SupervisorController::class, 'list'])->name('supervisor.list');
    //Route::prefix('/')->middleware('righttwo')->group(function () {
    Route::get('/add/{id?}', [SupervisorController::class, 'add'])->name('supervisor.add');
    Route::get('/view/{id?}', [SupervisorController::class, 'userview'])->name('supervisor.view');
    Route::post('/store', [SupervisorController::class, 'store'])->name('supervisor.store');
    Route::post('/destroy', [SupervisorController::class, 'destroy'])->name('supervisor.destroy');
    Route::post('/checkemail/{id?}', [SupervisorController::class, 'checkEmail'])->name('supervisor.checkEmail');
    //});
});
