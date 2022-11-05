<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, ForumController, ReplyController, UserController};

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

auth()->loginUsingId(17);
Route::get('/', function () {
    return redirect('/posts');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/posts', [ForumController::class, 'index']);

Route::get('/posts/create', [ForumController::class, 'create'])->middleware('auth');
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




//SPA
require __DIR__.'/auth.php';
