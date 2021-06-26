<?php
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function (){
    Route::view('/login', 'admin.auth.login')->name('login');
});
