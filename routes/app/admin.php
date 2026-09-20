<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DekanController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\KaprodiController;
use App\Http\Controllers\Admin\StafController;
use App\Http\Controllers\Admin\UserController;

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
  Route::redirect('/', '/admin/dashboard')->name('index');

  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi');
  Route::post('/prodi', [ProdiController::class, 'store'])->name('prodi.store');
  Route::delete('/prodi/{prodi}', [ProdiController::class, 'destroy'])->name('prodi.destroy');

  Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
  Route::post('/pengumuman', [PengumumanController::class, 'store'])->name('pengumuman.store');
  Route::put('/pengumuman/{pengumuman}', [PengumumanController::class, 'update'])->name('pengumuman.update');
  Route::delete('/pengumuman/{pengumuman}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

  Route::group(['prefix' => 'manajemen-akun'], function () {
    Route::get('/dekan', [DekanController::class, 'index'])->name('dekan');
    Route::post('/dekan', [DekanController::class, 'store'])->name('dekan.store');
    Route::get('/dekan/{dekan}/edit', [DekanController::class, 'edit'])->name('dekan.edit');
    Route::put('/dekan/{dekan}', [DekanController::class, 'update'])->name('dekan.update');
    Route::delete('/dekan/{dekan}', [DekanController::class, 'destroy'])->name('dekan.destroy');

    Route::get('/staf', [StafController::class, 'index'])->name('staf');
    Route::post('/staf', [StafController::class, 'store'])->name('staf.store');
    Route::get('/staf/{staf}/edit', [StafController::class, 'edit'])->name('staf.edit');
    Route::put('/staf/{staf}', [StafController::class, 'update'])->name('staf.update');
    Route::delete('/staf/{staf}', [StafController::class, 'destroy'])->name('staf.destroy');

    Route::get('/mahasiswa', [UserController::class, 'index'])->name('mahasiswa');
    Route::post('/mahasiswa', [UserController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/{user}/edit', [UserController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{user}', [UserController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/{user}', [UserController::class, 'destroy'])->name('mahasiswa.destroy');

    Route::get('/kaprodi', [KaprodiController::class, 'index'])->name('kaprodi');
    Route::post('/kaprodi', [KaprodiController::class, 'store'])->name('kaprodi.store');
    Route::get('/kaprodi/{kaprodi}/edit', [KaprodiController::class, 'edit'])->name('kaprodi.edit');
    Route::put('/kaprodi/{kaprodi}', [KaprodiController::class, 'update'])->name('kaprodi.update');
    Route::delete('/kaprodi/{kaprodi}', [KaprodiController::class, 'destroy'])->name('kaprodi.destroy');
  });

  Route::get('/account', [AccountController::class, 'index'])->name('account');
  Route::put('/account/update', [AccountController::class, 'updateAccount'])->name('account.update');
  Route::put('/account/password', [AccountController::class, 'updatePassword'])->name('account.password');
});
