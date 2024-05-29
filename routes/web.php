<?php

use App\Http\Controllers\CategoryController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SigninController;

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
Route::get('/post', function () {
    return view('posts',['posts'=>Post::all()]);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    Route::get('/home', function () {
        return view('admin.dashboard');
    });
    Route::resource('/admin/post', PostController::class);
    Route::resource('/admin/category', CategoryController::class);
    Route::resource('/admin/user', PostController::class);
    Route::resource('/admin/umkm', UMKMController::class);
    Route::resource('/admin/destinasipariwisata', DestinasiPariwisataController::class);
    Route::get('sign-out', [SigninController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('sign-in', [SigninController::class, 'index'])->name('login');
    Route::post('proses', [SigninController::class, 'authentication'])->name('proses-signin');
});
