<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebCasController;
use App\Http\Controllers\WebKelasController;
use App\Http\Controllers\WebMatpelController;
use App\Http\Controllers\WebNilaiController;
use App\Http\Controllers\WebSiswaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::prefix('/admin')->group(function() {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/',[LoginController::class, 'login'])->name('login.action');

    Route::middleware(['auth'])->group(function() {
        Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');    

        Route::resource('user', UserController::class);
        Route::get('user/{id}/delete', [UserController::class,'destroy'])->name('user.delete');

        Route::resource('kelas', WebKelasController::class);
        Route::get('kelas/{id}/delete', [WebKelasController::class,'destroy'])->name('kelas.delete');

        Route::resource('siswa', WebSiswaController::class);
        Route::get('siswa/{id}/out', [WebSiswaController::class,'destroy'])->name('siswa.out');
        Route::post('siswas/mapping',[WebSiswaController::class, 'mapping'])->name('siswa.mapping');
        Route::post('siswas/import', [WebSiswaController::class,'import'])->name('siswa.import');

        Route::resource('matpel', WebMatpelController::class);
        Route::get('/matpel/{id}/delete', [WebMatpelController::class, 'destroy'])->name('matpel.delete');

        Route::resource('nilai', WebNilaiController::class);
        Route::get('/nilai/upload', [WebNilaiController::class, 'upload'])->name('nilai.import');

        Route::resource('cas', WebCasController::class);

        Route::get('/cetak', [WebNilaiController::class,'cetak'])->name('cetak');

        
        Route::get('/pdf',[WebNilaiController::class, 'generate_pdf'])->name('cetak.satu');
        Route::get('/pdf/cetak/lagger',[WebNilaiController::class, 'lagger'])->name('cetak.dua');
        Route::get('/pdf/cetak/rangking',[WebNilaiController::class, 'rangking'])->name('cetak.tiga');
    });

});
