<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\jurusanController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\mataKuliahController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//kelas
Route::get('/kelas', [kelasController::class, 'index']);
Route::post('/kelas', [kelasController::class, 'store']);
Route::get('/kelas/{id}', [kelasController::class, 'show']);
Route::put('/kelas/{id}', [kelasController::class, 'update']);
Route::delete('/kelas/{id}', [kelasController::class, 'destroy']);

//jurusan
Route::get('/jurusan', [jurusanController::class, 'index']);
Route::post('/jurusan', [jurusanController::class, 'store']);
Route::get('/jurusan/{id}', [jurusanController::class, 'show']);
Route::put('/jurusan/{id}', [jurusanController::class, 'update']);
Route::delete('/jurusan/{id}', [jurusanController::class, 'destroy']);

//mahasiswa
Route::get('/mahasiswa', [mahasiswaController::class, 'index']);
Route::post('/mahasiswa', [mahasiswaController::class, 'store']);
Route::get('/mahasiswa/{id}', [mahasiswaController::class, 'show']);
Route::put('/mahasiswa/{id}', [mahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{id}', [mahasiswaController::class, 'destroy']);

//mata kuliah
Route::get('/matakuliah', [mataKuliahController::class, 'index']);
Route::post('/matakuliah', [mataKuliahController::class, 'store']);
Route::get('/matakuliah/{id}', [mataKuliahController::class, 'show']);
Route::put('/matakuliah/{id}', [mataKuliahController::class, 'update']);
Route::delete('/matakuliah/{id}', [mataKuliahController::class, 'destroy']);

