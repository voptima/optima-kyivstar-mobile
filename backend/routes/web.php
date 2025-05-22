<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;

Route::get('/', function () {
    return redirect('/admin/users');
});

Route::prefix('admin')->middleware('web')->group(function () {
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::middleware('auth:admin')->group(function () {
        Route::resource('users', UsersController::class);
        Route::get('login-logs', [UsersController::class, 'logs'])->name('login-logs.index');
    });
});
