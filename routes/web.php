<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaPublicController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\EkstrakulikulerPublicController;
use App\Http\Controllers\GaleriPublicController;
use App\Http\Controllers\GuruPublicController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PrestasiPublicController;
use App\Http\Controllers\ProfilPublicController;
use App\Http\Controllers\SiswaPublicController;
use App\Http\Controllers\DataDiriController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('data-admin.')->group(function () {
    Route::get('/data-diri', [DataDiriController::class, 'index'])->name('index');
    Route::get('/data-diri/create', [DataDiriController::class, 'create'])->name('create');
    Route::post('/data-diri', [DataDiriController::class, 'store'])->name('store');
    Route::get('/data-diri/{id}', [DataDiriController::class, 'show'])->whereNumber('id')->name('show');
    Route::get('/data-diri/{id}/edit', [DataDiriController::class, 'edit'])->whereNumber('id')->name('edit');
    Route::put('/data-diri/{id}', [DataDiriController::class, 'update'])->whereNumber('id')->name('update');
    Route::delete('/data-diri/{id}', [DataDiriController::class, 'destroy'])->whereNumber('id')->name('destroy');
});


Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/', [LandingPageController::class, 'index'])
    ->name('landing');

Route::get('/prestasi', [PrestasiPublicController::class, 'index'])
    ->name('prestasi.landing');

Route::get('/prestasi-sekolah', [PrestasiPublicController::class, 'index'])
->name('prestasi.landing');

Route::get('/prestasi-sekolah/{id}', [PrestasiPublicController::class, 'show'])
    ->name('prestasi.detail');

Route::get('/guru-sekolah/{id}', [GuruPublicController::class, 'show'])
->name('guru.detail');

Route::get('/galeri-sekolah/{id}', [GaleriPublicController::class, 'show'])
    ->name('galeri.detail');

Route::get(
    '/ekstrakulikuler-sekolah/{id}',
    [EkstrakulikulerPublicController::class, 'show']
)->name('ekstrakulikuler.detail');

Route::get(
    '/ekstrakulikuler-sekolah',
    [EkstrakulikulerPublicController::class, 'index']
)->name('ekstrakulikuler.landing');

Route::get('/guru-sekolah', [GuruPublicController::class, 'index'])
    ->name('guru.landing');

Route::get('/galeri-sekolah', [GaleriPublicController::class, 'index'])
->name('galeri.landing');

Route::get('/profil-sekolah-kami', [ProfilPublicController::class, 'index'])
    ->name('profil.landing');

Route::get('/berita-sekolah', [BeritaPublicController::class, 'index'])
    ->name('berita.landing');

Route::get('/siswa-sekolah', [SiswaPublicController::class, 'index'])
    ->name('siswa.landing');

Route::get('/data-diri', [DataController::class, 'index'])
    ->name('data.landing');

Route::get('/berita-sekolah/{id}', [BeritaPublicController::class, 'show'])
    ->name('berita.detail');

Route::middleware('auth')->group(function () {

     Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    // =========================
    // DATA SEKOLAH
    // =========================

    Route::resource('profil-sekolah', ProfilSekolahController::class);

    Route::resource('guru', GuruController::class);

    Route::resource('siswa', SiswaController::class);


    // =========================
    // KEGIATAN SEKOLAH
    // =========================

    Route::resource('ekstrakulikuler', EkstrakulikulerController::class);

    Route::resource('prestasi', PrestasiController::class);


    // =========================
    // PUBLIKASI
    // =========================

    Route::resource('galeri', GaleriController::class);

    Route::resource('berita', BeritaController::class);

    Route::resource('pengumuman', PengumumanController::class);



    Route::resource('user', UserController::class)
        ->middleware('admin');
});
