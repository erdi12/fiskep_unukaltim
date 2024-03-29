<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DekanController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HiController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\IlkomController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PgpaudController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\VisiMisiHiController;
use App\Http\Controllers\VisiMisiIlkomController;
use App\Http\Controllers\VisiMisiPgpaudController;
use App\Models\VisiMisiHi;

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

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/home', function(){
    return view('front.home');
});
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/berita', [FrontendController::class, 'berita'])->name('berita');
Route::get('/kategori/{kategoriSlug}', [FrontendController::class, 'kategori_berita'])->name('kategori-berita');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
// Route::get('/hi', [FrontendController::class, 'hi'])->name('hi');
Route::get('/detail-artikel/{slug}', [FrontendController::class, 'detail'])->name('detail-artikel');
Route::get('/his', [FrontendController::class, 'hubi'])->name('hubi');
Route::get('/ilkoms', [FrontendController::class, 'mukom'])->name('mukom');
Route::get('/pgpauds', [FrontendController::class, 'guru'])->name('guru');

Auth::routes();



Route::middleware(['web', 'auth', 'App\Http\Middleware\CheckUserActivity'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('kategori', KategoriController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('playlist', PlaylistController::class);
    Route::resource('materi', MateriController::class);
    Route::resource('slide', SlideController::class);
    Route::resource('iklan', IklanController::class);
    Route::resource('visimisi', VisiMisiController::class);
    Route::resource('visimisihi', VisiMisiHiController::class);
    Route::resource('visimisiilkom', VisiMisiIlkomController::class);
    Route::resource('visimisipgpaud', VisiMisiPgpaudController::class);
    Route::resource('jabatan', JabatanController::class);
    Route::resource('dekan', DekanController::class);
    Route::resource('hi', HiController::class);
    Route::resource('ilkom', IlkomController::class);
    Route::resource('pgpaud', PgpaudController::class);
});
