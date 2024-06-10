<?php

use App\Models\Post;
use App\Models\UMKM;
use App\Models\Produk;
use App\Models\Homestay;
use App\Models\DestinasiPariwisata;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomestayController;
use App\Http\Controllers\FrontendHomestayController;
use App\Http\Controllers\FrontendDestinasiController;
use App\Http\Controllers\DestinasiPariwisataController;
use App\Http\Controllers\FrontendKontakController;

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

Route::get('/post', function () {
    return view('posts',['posts'=>Post::all()]);
});

Route::get('/',function(){
    $data = DestinasiPariwisata::all();
    $umkm = Produk::all();
    $penginapan = Homestay::all();
    return view('frontend.home.index')->with(['destinasis'=> $data,'umkm' => $umkm, 'homestay'=>$penginapan]);
});

Route::post('/booking', [BookingController::class, 'formBooking']);
Route::put('/booking/send', [BookingController::class, 'booking']);


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    Route::get('/home', function () {
        return view('admin.dashboard');
    });
    // Route::resource('/admin/post', PostController::class);
    Route::resource('/admin/category', CategoryController::class);
    Route::resource('/admin/umkm', UMKMController::class);
    Route::resource('/admin/user', UserController::class);
    Route::resource('/admin/destinasipariwisata', DestinasiPariwisataController::class);
    Route::resource('/admin/produk', ProdukController::class);
    Route::resource('/admin/homestay', HomestayController::class);
    Route::resource('/admin/booking', BookingController::class);

    Route::put('/admin/users/{id}', [UserController::class, 'update']);
    Route::get('updateStatus/{id}', [UserController::class, 'updateStatus']);
    Route::delete('/media/{id}', [AssetController::class, 'destroy']);
    Route::delete('/assets/{id}', [AssetController::class, 'destroy'])->name('assets.destroy');
    Route::get('/admin/booking/{id}/approve', [BookingController::class, 'approve']);

    Route::get('sign-out', [SigninController::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('sign-in', [SigninController::class, 'index'])->name('login');
    Route::post('proses', [SigninController::class, 'authentication'])->name('proses-signin');
    });
    
Route::get('/list-destinasi', [FrontendDestinasiController::class, 'index']);
Route::get('/list-homestay', [FrontendHomestayController::class, 'index']);






Route::get('/hubungi-kami',[FrontendKontakController::class,'index']);    