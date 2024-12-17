<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChildController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users',UserController::class)->except('create','store');
Route::resource('categories', CategoryController::class);
Route::resource('gifts', GiftController::class);
Route::resource('children', ChildController::class);
