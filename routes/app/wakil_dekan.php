<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WakilDekan\SuratController;
use App\Http\Controllers\WakilDekan\AccountController;
use App\Http\Controllers\WakilDekan\DashboardController;
use App\Http\Controllers\WakilDekan\PengumumanController;
use App\Http\Controllers\WakilDekan\UserController;

Route::group([
        'middleware' => ['auth:dekan', 'wakil-dekan:wakil_dekan'],
        'prefix' => 'wakil-dekan',
        'as' => 'wakil_dekan.'
    ], function () {

    Route::redirect('/', '/wakil-dekan/dashboard')->name('index');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/pengumuman', [PengumumanController::class, 'index'])
        ->name('pengumuman');

    Route::post('/pengumuman', [PengumumanController::class, 'store'])
        ->name('pengumuman.store');

    Route::put('/pengumuman/{pengumuman}', [PengumumanController::class, 'update'])
        ->name('pengumuman.update');

    Route::delete('/pengumuman/{pengumuman}', [PengumumanController::class, 'destroy'])
        ->name('pengumuman.destroy');

    Route::get('/mahasiswa', [UserController::class, 'index'])
        ->name('mahasiswa');

    Route::post('/mahasiswa', [UserController::class, 'store'])
        ->name('mahasiswa.store');

    Route::get('/mahasiswa/{user}/edit', [UserController::class, 'edit'])
        ->name('mahasiswa.edit');

    Route::put('/mahasiswa/{user}', [UserController::class, 'update'])
        ->name('mahasiswa.update');

    Route::delete('/mahasiswa/{user}', [UserController::class, 'destroy'])
        ->name('mahasiswa.destroy');

    Route::get('/surat/{layanan}', [SuratController::class, 'index'])
        ->name('surat');

    Route::get('/surat/{layanan}/{pengajuan:uuid}', [SuratController::class, 'show'])
        ->name('surat.show');

    Route::get('/surat/{layanan}/{pengajuan:uuid}/pdf', [SuratController::class, 'pdf'])
        ->name('surat.pdf');

    Route::post('/surat/{layanan}/terima/{pengajuan:uuid}', [SuratController::class, 'terima'])
        ->name('surat.terima');

    Route::post('/surat/{layanan}/tolak/{pengajuan:uuid}', [SuratController::class, 'tolak'])
        ->name('surat.tolak');

    Route::get('/account', [AccountController::class, 'index'])
        ->name('account');

    Route::put('/account/update', [AccountController::class, 'updateAccount'])
        ->name('account.update');

    Route::put('/account/password', [AccountController::class, 'updatePassword'])
        ->name('account.password');
});
