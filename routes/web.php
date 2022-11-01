<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, ForumController};

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

auth()->loginUsingId(1);
Route::get('/',function (){
    return redirect('/posts');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/posts', [ForumController::class, 'index']);

Route::get('/posts/create', [ForumController::class, 'create'])->middleware('auth');
Route::post('/posts', [ForumController::class, 'store'])->middleware('auth');

Route::get('/posts/{category}/{forum}', [ForumController::class, 'show']);

Route::delete('/posts/{category}/{forum}', [ForumController::class, 'destroy']);

// /posts/savion-gaylord-phd
Route::get('/posts/{category}', [ForumController::class, 'index']);



//SPA
require __DIR__.'/auth.php';
