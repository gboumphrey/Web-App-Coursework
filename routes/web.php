<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentOnPostController;

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
    return redirect('/posts');
});

Route::get('/logs', [UserProfileController::class, 'logs']);

Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])
    ->name('comments.edit')->middleware(['auth']);
Route::patch('/comments/{id}', [CommentController::class, 'update'])
    ->name('comments.update')->middleware(['auth']);

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create')->middleware(['auth']);
Route::post('/posts', [PostController::class, 'store'])
    ->name('posts.store')->middleware(['auth']);
Route::get('/posts/{id}', [PostController::class, 'show'])
    ->name('posts.show');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])
    ->name('posts.edit')->middleware(['auth']);
Route::patch('/posts/{id}', [PostController::class, 'update'])
    ->name('posts.update')->middleware(['auth']);
Route::delete('/posts/{id}', [PostController::class, 'destroy'])
    ->name('posts.destroy')->middleware(['auth']);

Route::get('/groups', [GroupController::class, 'index'])
    ->name('groups.index');
Route::get('/groups/{id}', [GroupController::class, 'show'])
    ->name('groups.show');

Route::get('/profiles', [UserProfileController::class, 'index'])
    ->name('profiles.index');
Route::get('/profiles/{id}', [UserProfileController::class, 'show'])
    ->name('profiles.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';