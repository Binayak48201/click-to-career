<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/channels', [\App\Http\Controllers\HomeController::class, 'index']);


Route::get('/posts', [ForumController::class, 'index']);

Route::get('/posts/create', [ForumController::class, 'create'])->middleware(['auth','must-be-confirmed']);
Route::post('/posts', [ForumController::class, 'store'])->middleware('auth');
Route::get('/posts/{forum}/edit', [ForumController::class, 'edit'])->name('forum.edit')->middleware('auth');
Route::patch('/posts/{forum}', [ForumController::class, 'update'])->name('forum.update')->middleware('auth');

Route::get('/posts/{category}/{forum}', [ForumController::class, 'show']);

Route::delete('/posts/{category}/{forum}', [ForumController::class, 'destroy'])->middleware('auth');

// /posts/savion-gaylord-phd
Route::get('/posts/{category}', [ForumController::class, 'index']);


Route::post('/posts/{forum}/reply', [ReplyController::class, 'store'])->name('reply.store');

Route::get('profile/{user}', [UserController::class, 'index']);
Route::patch('profile/{user}/update', [UserController::class, 'avatar']);

// Favouties routes
Route::middleware(['auth'])->group(function () {
    Route::post('/replies/{reply}/favorites', [FavoriteController::class, 'store'])->name('reply.favorite');
    Route::delete('/replies/{reply}/favorites', [FavoriteController::class, 'destroy'])->name('reply.unfavorite');
});
