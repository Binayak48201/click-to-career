<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, ForumController, ReplyController, UserController,FavoriteController};

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

auth()->loginUsingId(235);


//Route::get('/', function () {
//    return redirect('/posts');
//});
//
//Route::get('/view-project', function () {
//   return "sdfasdf";
//})->middleware('can:secret_report');


Route::get('/dashboard', function () {
   return redirect('/posts');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/register/confirmation', [UserController::class, 'verifyUser']);

require __DIR__.'/auth.php';

//SPA
Route::get('/{any}', function () {
    return view('welcome');
})->where("any",".*");

