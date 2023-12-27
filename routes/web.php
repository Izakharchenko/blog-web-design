<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\SharedViewDataMiddleware;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CategoryController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => SharedViewDataMiddleware::class], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/tags', [App\Http\Controllers\HomeController::class, 'tags'])->name('tags');
    Route::get('/show/{post}', [App\Http\Controllers\HomeController::class, 'show'])->name('show');
    Route::resource('comments', CommentController::class);
});

Route::prefix('dashboard')->middleware(['auth', 'author'])->group(function () {
    Route::get('/home', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.home')->withoutMiddleware('author');
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);

    Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
    Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::patch('/posts/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');
});
