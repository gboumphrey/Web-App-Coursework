<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserProfileController;
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
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])
    ->name('posts.store');
Route::get('/posts/{id}', [PostController::class, 'show'])
    ->name('posts.show');

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