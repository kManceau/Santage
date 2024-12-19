<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChildController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\UserController;

Auth::routes();

//if(Auth::user() && Auth::user()->role == 'elf') {
//    Route::get('/', [App\Http\Controllers\ElfController::class, 'index'])->name('elf_home');
//} else {
//    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//}


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
    ->middleware('redirect_if_elf');
Route::get('/elf/home', [App\Http\Controllers\ElfController::class, 'index'])->name('elf_home')
    ->middleware('auth');
Route::get('/elves/child_gift/add/{child_id}', [App\Http\Controllers\ElfController::class, 'child_gift_add'])->name('child_gift_add')
    ->middleware('auth');
Route::post('/elves/child_gift/store', [App\Http\Controllers\ElfController::class, 'child_gift_store'])->name('child_gift_store')
    ->middleware('auth');
Route::delete('/elves/child_gift/{child_id}/{gift_id}', [App\Http\Controllers\ElfController::class, 'delete_gift_child'])->name('delete_gift_child')
    ->middleware('auth');

Route::resource('users',UserController::class)->except('create','store');
Route::resource('categories', CategoryController::class);
Route::resource('gifts', GiftController::class);
Route::resource('children', ChildController::class);
