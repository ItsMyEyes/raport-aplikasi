<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/',[\App\Http\Controllers\HomeController::class,'countHome']);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', [\App\Http\Controllers\AuthController::class,'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class,'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class,'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class,'me']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'guru'
], function () {
    Route::get('/',[\App\Http\Controllers\GuruController::class,'index']);
    Route::get('/',[\App\Http\Controllers\GuruController::class,'search']);
    Route::post('/',[\App\Http\Controllers\GuruController::class,'store']);
    Route::post('/upload',[\App\Http\Controllers\GuruController::class,'import']);
    Route::get('/{id}',[\App\Http\Controllers\GuruController::class,'show']);
    Route::put('/{id}',[\App\Http\Controllers\GuruController::class,'edit']);
    Route::delete('/{id}',[\App\Http\Controllers\GuruController::class,'destroy']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'kelas'
], function () {
    Route::get('/',[\App\Http\Controllers\KelasController::class,'index']);
    Route::post('/',[\App\Http\Controllers\KelasController::class,'store']);
    Route::post('/mapping',[\App\Http\Controllers\KelasController::class,'mappingStore']);
    Route::get('/{id}',[\App\Http\Controllers\KelasController::class,'edit']);
    Route::put('/{id}',[\App\Http\Controllers\KelasController::class,'update']);
    Route::delete('/{id}',[\App\Http\Controllers\KelasController::class,'destroy']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'siswa'
], function () {
    Route::get('/',[\App\Http\Controllers\SiswaController::class,'index']);
    Route::post('/',[\App\Http\Controllers\SiswaController::class,'store']);
    Route::post('/import',[\App\Http\Controllers\SiswaController::class,'import']);
    Route::post('/import/mapping',[\App\Http\Controllers\SiswaController::class,'importMapping']);
    Route::get('/{id}',[\App\Http\Controllers\SiswaController::class,'show']);
    Route::put('/{id}',[\App\Http\Controllers\SiswaController::class,'update']);
    Route::delete('/{id}',[\App\Http\Controllers\SiswaController::class,'destroy']);
    Route::delete('/sekolah/{id}',[\App\Http\Controllers\SiswaController::class,'destroySiswa']);
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'matpel'
], function () {
    Route::get('/',[\App\Http\Controllers\MatpelController::class,'index']);
    Route::post('/',[\App\Http\Controllers\MatpelController::class,'store']);
    Route::get('/{id}',[\App\Http\Controllers\MatpelController::class,'edit']);
    Route::put('/{id}',[\App\Http\Controllers\MatpelController::class,'update']);
    Route::delete('/{id}',[\App\Http\Controllers\MatpelController::class,'destroy']);
    // Mapping
    Route::get('/get/mapping',[\App\Http\Controllers\MatpelGuruMappingController::class,'index']);
    Route::get('/kelompok/mapping',[\App\Http\Controllers\MatpelGuruMappingController::class,'kelompok']);
    Route::get('/get/mapping/{id}',[\App\Http\Controllers\MatpelGuruMappingController::class,'show']);
    Route::post('/mapping',[\App\Http\Controllers\MatpelGuruMappingController::class,'store']);
    Route::put('/{id}/mapping',[\App\Http\Controllers\MatpelGuruMappingController::class,'update']);
    Route::get('/guru/{id}/matpel',[\App\Http\Controllers\MatpelController::class,'showByGuru']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'nilai'
], function ()
{
    Route::get('/{id}/{id_matpel}',[\App\Http\Controllers\NilaiIndividuController::class, 'show']);
    Route::post('/',[\App\Http\Controllers\NilaiIndividuController::class, 'store']);
    Route::post('/upload',[\App\Http\Controllers\NilaiIndividuController::class, 'upload']);
    Route::get('/pdf',[\App\Http\Controllers\NilaiIndividuController::class, 'generate_pdf']);
    Route::get('/pdf/cetak/lagger',[\App\Http\Controllers\NilaiIndividuController::class, 'lagger']);
    Route::get('/pdf/cetak/rangking',[\App\Http\Controllers\NilaiIndividuController::class, 'rangking']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'cas'
], function ()
{
    Route::get('/{id}',[\App\Http\Controllers\CasController::class,'show']);
    Route::post('/',[\App\Http\Controllers\CasController::class,'store']);
    Route::put('/{id}',[\App\Http\Controllers\CasController::class,'update']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'prakerin'
], function ()
{
    Route::get('/',[\App\Http\Controllers\PrakerinController::class,'index']);
    Route::get('/{nis}',[\App\Http\Controllers\PrakerinController::class,'show']);
    Route::post('/',[\App\Http\Controllers\PrakerinController::class,'store']);
    Route::put('/{nisl}',[\App\Http\Controllers\PrakerinController::class,'update']);
    Route::delete('/',[\App\Http\Controllers\PrakerinController::class,'destroy']);
});