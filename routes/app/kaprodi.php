<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kaprodi\DashboardController;
use App\Http\Controllers\Kaprodi\AccountController;
Route::group(
    [
        'middleware' => ['auth:kaprodi'],
        'prefix' => 'kaprodi',
        'as' => 'kaprodi.',
    ],
    function () {
        Route::redirect('/', '/kaprodi/dashboard')->name('index');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::delete('/pengajuan/{pengajuan}', [DashboardController::class, 'destroy'])->name('pengajuan.destroy');

        Route::get('/surat/{layanan}/{pengajuan:uuid}/pdf', [DashboardController::class, 'pdf'])->name('surat.pdf');

        // Route::view('/account', 'kaprodi.account')
        //     ->name('account');

        Route::get('/account', [AccountController::class, 'index'])->name('account');
        Route::put('/account/update', [AccountController::class, 'updateAccount'])->name('account.update');
        Route::put('/account/password', [AccountController::class, 'updatePassword'])->name('account.password');
    },
);
