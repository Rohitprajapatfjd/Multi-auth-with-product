<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Usercontroller;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/',[Usercontroller::class , 'show'])->name('user.show');
Route::post('/registor',[Usercontroller::class , 'register'])->name('registor');
Route::post('/loginpost',[Usercontroller::class , 'login'])->name('user.login');
Route::get('/login',[Usercontroller::class , 'showLogin'])->name('login');
Route::middleware('auth:web')->group(function(){
Route::get('/dashboard',[Usercontroller::class , 'dashboard'])->name('user.dashboard');
Route::get('/logout',[Usercontroller::class , 'logout'])->name('user.logout');
});

Route::prefix('admin')->group(function(){
 Route::controller( AdminController::class)->group(function(){
    Route::get('/signup','show')->name('admin.show');
    Route::post('/registor','register')->name('admin.registor');
    Route::post('/loginpost','login')->name('admin.loginpost');
    Route::get('/login','showLogin')->name('admin.login');
    Route::middleware([AdminMiddleware::class])->group(function(){
    Route::get('/dashboard','dashboard')->name('admin.dashboard');
    Route::get('/logout','logout')->name('admin.logout');
    });
 });
    
});
