<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   //return view('welcome');
   return view('auth.login');
})->name('/');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('users', App\Http\Controllers\UserController::class);

Route::group(['prefix' => 'superadmin', 'middleware' => 'auth'],function(){
    Route::get('dashboard',[SuperAdminController::class,'index'])->name('superadmin.dashboard');
    Route::get('profile',[SuperAdminController::class,'profile'])->name('superadmin.profile');
    Route::get('settings',[SuperAdminController::class,'settings'])->name('superadmin.settings');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
});

Route::group(['prefix' => 'users', 'middleware' => 'auth'],function(){
    Route::get('dashboard',[UsersController::class,'index'])->name('users.dashboard');
    Route::get('profile',[UsersController::class,'profile'])->name('users.profile');
    Route::get('settings',[UsersController::class,'settings'])->name('users.settings');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'],function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('settings',[UserController::class,'settings'])->name('user.settings');
});
