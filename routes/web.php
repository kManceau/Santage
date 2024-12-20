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
    ->middleware('redirect_home');
Route::get('/elf/home', [App\Http\Controllers\ElfController::class, 'index'])->name('elf_home')
    ->middleware('auth');
Route::get('/santa/home', [App\Http\Controllers\SantaController::class, 'index'])->name('santa_home')
    ->middleware('auth');
Route::get('/elf/child_gift/add/{child_id}', [App\Http\Controllers\ElfController::class, 'child_gift_add'])->name('child_gift_add')
    ->middleware('auth');
Route::post('/elf/child_gift/store', [App\Http\Controllers\ElfController::class, 'child_gift_store'])->name('child_gift_store')
    ->middleware('auth');
Route::delete('/elf/child_gift/{child_id}/{gift_id}', [App\Http\Controllers\ElfController::class, 'delete_gift_child'])->name('delete_gift_child')
    ->middleware('auth');

Route::get('/santa/elf_child/add/{child_id}', [App\Http\Controllers\SantaController::class, 'elf_child_add'])->name('elf_child_add')
    ->middleware('auth');
Route::post('/santa/elf_child/store', [App\Http\Controllers\SantaController::class, 'elf_child_store'])->name('elf_child_store')
    ->middleware('auth');

Route::resource('gifts', GiftController::class)
    ->middleware('auth');

Route::resource('users',UserController::class)->except('create','store');
Route::resource('categories', CategoryController::class);
Route::resource('children', ChildController::class);
