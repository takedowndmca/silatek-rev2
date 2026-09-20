<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LayananAkademikController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest:admin,dekan,staf,user,kaprodi'], function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::view('/', 'welcome')->name('index');

Route::get('/surat', [SuratController::class, 'index'])->name('surat');

Route::get('/layanan', [LayananAkademikController::class, 'index'])->name('layanan');

Route::get('/layanan/{layanan}', [PengajuanController::class, 'index'])->name('pengajuan');
Route::post('/layanan/{layanan}', [PengajuanController::class, 'store'])->name('pengajuan.store');
Route::get('/layanan/{layanan}/surat/{pengajuan:uuid}', [PengajuanController::class, 'pdf'])->name('pengajuan.pdf');

Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');

Route::get('/surat', [SuratController::class, 'index'])->name('surat');

Route::view('/tentang', 'about')->name('about');

Route::group(['middleware' => 'auth', 'as' => 'user.'], function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::put('/account/update', [AccountController::class, 'updateAccount'])->name('account.update');
    Route::put('/account/password', [AccountController::class, 'updatePassword'])->name('account.password');
});

require __DIR__ . '/app/admin.php';
require __DIR__ . '/app/dekan.php';
require __DIR__ . '/app/wakil_dekan.php';
require __DIR__ . '/app/staf.php';
require __DIR__ . '/app/kaprodi.php';

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth:admin,dekan,staf,user,kaprodi');
