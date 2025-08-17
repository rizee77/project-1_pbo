<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\Admin\CatatanController;
use App\Http\Controllers\Pegawai\DashboardPegawaiController;
use App\Http\Controllers\Pegawai\CatatanPegawaiController;
use App\Http\Controllers\Admin\HistoryController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('dashboard.admin');
    } elseif (Auth::user()->role === 'pegawai') {
        return redirect()->route('pegawai.dashboard');
    }
    abort(403); // kalau rolenya nggak dikenal
})->middleware(['auth'])->name('dashboard');

Route::get('/admin', function () {
    return 'Ini halaman admin';
})->middleware(['auth', 'role:admin']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard.admin');

    // CRUD Catatan
    Route::get('/catatan', [CatatanController::class, 'index'])->name('admin.catatan.index');
    Route::get('/catatan/create', [CatatanController::class, 'create'])->name('admin.catatan.create');
    Route::post('/catatan', [CatatanController::class, 'store'])->name('admin.catatan.store');
    Route::get('/catatan/{id}/edit', [CatatanController::class, 'edit'])->name('admin.catatan.edit');
    Route::put('/catatan/{id}', [CatatanController::class, 'update'])->name('admin.catatan.update');
    Route::delete('/catatan/{id}', [CatatanController::class, 'destroy'])->name('admin.catatan.destroy');

    // Hapus akun pegawai
    Route::delete('/pegawai/{id}', [\App\Http\Controllers\DashboardAdminController::class, 'destroyPegawai'])
        ->name('admin.pegawai.destroy');

    // History
    Route::get('/history', [App\Http\Controllers\Admin\HistoryController::class, 'index'])->name('history.index');
    Route::get('/history/cetak', [App\Http\Controllers\Admin\HistoryController::class, 'cetakPDF'])->name('history.cetak_pdf');
});

Route::middleware(['auth', 'role:pegawai'])->prefix('pegawai')->group(function () {

    // Dashboard Pegawai
    Route::get('/dashboard', [App\Http\Controllers\Pegawai\DashboardPegawaiController::class, 'index'])
        ->name('pegawai.dashboard');

    // Catatan Perjalanan Pegawai
    // Route::get('/catatan', [App\Http\Controllers\Pegawai\CatatanPegawaiController::class, 'index'])
    //     ->name('pegawai.catatan.index'); // list catatan milik pegawai
    // Route::get('/catatan/create', [App\Http\Controllers\Pegawai\CatatanPegawaiController::class, 'create'])
    //     ->name('pegawai.catatan.create'); // form tambah
    Route::post('/catatan', [App\Http\Controllers\Pegawai\CatatanPegawaiController::class, 'store'])
        ->name('pegawai.catatan.store'); // simpan data baru
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
