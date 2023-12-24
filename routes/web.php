<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\UserController;
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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->group(function () {
    Route::get('/home', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.home');
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
});


Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::patch('/posts/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');


Route::get('/posts/update', [App\Http\Controllers\PostController::class, 'update']);
Route::get('/posts/delete', [App\Http\Controllers\PostController::class, 'delete']);
Route::get('/posts/first_or_create', [App\Http\Controllers\PostController::class, 'first_or_create']);
Route::get('/posts/update_or_create', [App\Http\Controllers\PostController::class, 'update_or_create']);
