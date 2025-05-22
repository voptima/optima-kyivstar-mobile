<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiAuthController;

Route::post('login', [ApiAuthController::class, 'sendCode']);
Route::post('verify', [ApiAuthController::class, 'verifyCode']);
Route::middleware('auth:api')->group(function () {
    Route::post('logout', [ApiAuthController::class, 'logout']);
});
