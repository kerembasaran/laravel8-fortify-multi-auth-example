<?php
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

Route::prefix('admin')->name('admin.')->group(function (){
    Route::view('/login', 'admin.auth.login')->name('login');

    $limiter = config('fortify.limiters.login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:admin',
            $limiter ? 'throttle:' . $limiter : null,
        ]));
});
