<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('users', UserController::class);

Route::middleware('auth')->group(function () {
    
    Route::group(['middleware' => ['role:Publicador']], function () {
        //rutas accesibles solo para publicadores
        Route::post('/posts/store',[PostController::class, 'store'])->name('posts.store');
        Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
        Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('posts.edit');
        Route::post('/posts/{post}/update',[PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{post}/destroy',[PostController::class, 'destroy'])->name('posts.destroy');
    });

    Route::group(['middleware' => ['role:Admin']], function(){
        //rutas accesibles solo para administradores
        Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    });
    Route::get('/user/{user}/show', [UserController::class, 'show'])->name('users.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   
    
    Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');

});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
