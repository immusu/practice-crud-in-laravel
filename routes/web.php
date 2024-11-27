<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    return view('welcome', ['posts'=> Post::all()]);
})->name('home');

Route::get('/create', [PostController::class,'create']);

Route::post('/store', [PostController::class,'filestore'])->name('store');

Route::get('/edit/{id}', [PostController::class,'editdata'])->name('edit');

Route::post('/update/{id}', [PostController::class,'updatedata'])->name('update');

Route::get('/delete/{id}', [PostController::class,'deletedata'])->name('delete');