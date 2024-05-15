<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PerwalianController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\MahasiswadosenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KknController;
use App\Http\Controllers\KknDosenController;
use App\Http\Controllers\KknMahasiswaController;
use App\Http\Controllers\KpController;
use App\Http\Controllers\KpDosenController;
use App\Http\Controllers\KpMahasiswaController;
use App\Http\Controllers\TaController;
use App\Http\Controllers\TaDosenController;
use App\Http\Controllers\TaMahasiswaController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\LombaDosenController;
use App\Http\Controllers\LombaMahasiswaController;
use App\Http\Controllers\MbkmController;
use App\Http\Controllers\MbkmDosenController;
use App\Http\Controllers\MbkmMahasiswaController;
use App\Http\Controllers\PkmController;
use App\Http\Controllers\PkmDosenController;
use App\Http\Controllers\PkmMahasiswaController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/create', [AdminController::class, 'create']);
    Route::post('admin/admin/create', [AdminController::class, 'tambah']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

    Route::get('admin/mahasiswa/list', [MahasiswaController::class, 'list']);
    Route::get('admin/mahasiswa/create', [MahasiswaController::class, 'create']);
    Route::post('admin/mahasiswa/create', [MahasiswaController::class, 'tambah']);
    Route::get('admin/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit']);
    Route::post('admin/mahasiswa/edit/{id}', [MahasiswaController::class, 'update']);
    Route::get('admin/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete']);
    Route::post('admin/mahasiswa/csv', [MahasiswaController::class, 'exportToCSV']);

    // Route::get('admin/perwalian/list', [PerwalianController::class, 'listadmin']);
    // Route::post('admin/perwalian/seluruh', [PerwalianController::class, 'seluruh']);
    // Route::post('admin/perwalian/updatetidakhadir/{id}', [PerwalianController::class, 'adminupdatetidakhadir']);
    // Route::post('admin/perwalian/updatehadir/{id}', [PerwalianController::class, 'adminupdatehadir']);

    Route::get('admin/dosen/list', [DosenController::class, 'list']);
    Route::get('admin/dosen/create', [DosenController::class, 'create']);
    Route::post('admin/dosen/create', [DosenController::class, 'tambah']);
    Route::get('admin/dosen/edit/{id}', [DosenController::class, 'edit']);
    Route::post('admin/dosen/edit/{id}', [DosenController::class, 'update']);
    Route::get('admin/dosen/delete/{id}', [DosenController::class, 'delete']);
    Route::post('admin/dosen/csv', [DosenController::class, 'exportToCSV']);

    Route::get('admin/kkn/list', [KknController::class, 'list']);
    Route::get('admin/kkn/create', [KknController::class, 'create']);
    Route::post('admin/kkn/create', [KknController::class, 'tambah']);
    Route::get('admin/kkn/edit/{id}', [KknController::class, 'edit']);
    Route::post('admin/kkn/edit/{id}', [KknController::class, 'update']);
    Route::get('admin/kkn/delete/{id}', [KknController::class, 'delete']);
    Route::post('admin/kkn/csv', [KknController::class, 'exportToCSV']);

    Route::get('admin/kp/list', [KpController::class, 'list']);
    Route::get('admin/kp/create', [KpController::class, 'create']);
    Route::post('admin/kp/create', [KpController::class, 'tambah']);
    Route::get('admin/kp/edit/{id}', [KpController::class, 'edit']);
    Route::post('admin/kp/edit/{id}', [KpController::class, 'update']);
    Route::get('admin/kp/delete/{id}', [KpController::class, 'delete']);
    Route::get('admin/kp/download/{id}', [KpController::class, 'download']);
    Route::post('admin/kp/csv', [KpController::class, 'exportToCSV']);
    

    Route::get('admin/ta/list', [TaController::class, 'list']);
    Route::get('admin/ta/create', [TaController::class, 'create']);
    Route::post('admin/ta/create', [TaController::class, 'tambah']);
    Route::get('admin/ta/edit/{id}', [TaController::class, 'edit']);
    Route::post('admin/ta/edit/{id}', [TaController::class, 'update']);
    Route::get('admin/ta/delete/{id}', [TaController::class, 'delete']);
    Route::post('admin/ta/csv', [TaController::class, 'exportToCSV']);

    Route::get('admin/prestasi/list', [LombaController::class, 'list']);
    Route::get('admin/prestasi/create', [LombaController::class, 'create']);
    Route::post('admin/prestasi/create', [LombaController::class, 'tambah']);
    Route::get('admin/prestasi/edit/{id}', [LombaController::class, 'edit']);
    Route::post('admin/prestasi/edit/{id}', [LombaController::class, 'update']);
    Route::get('admin/prestasi/delete/{id}', [LombaController::class, 'delete']);
    Route::get('admin/prestasi/download/{id}', [LombaController::class, 'download']);
    Route::post('admin/prestasi/csv', [LombaController::class, 'exportToCSV']);

    Route::get('admin/mbkm/list', [MbkmController::class, 'list']);
    Route::get('admin/mbkm/create', [MbkmController::class, 'create']);
    Route::post('admin/mbkm/create', [MbkmController::class, 'tambah']);
    Route::get('admin/mbkm/edit/{id}', [MbkmController::class, 'edit']);
    Route::post('admin/mbkm/edit/{id}', [MbkmController::class, 'update']);
    Route::get('admin/mbkm/delete/{id}', [MbkmController::class, 'delete']);
    Route::get('admin/mbkm/download/{id}', [MbkmController::class, 'download']);
    Route::post('admin/mbkm/csv', [MbkmController::class, 'exportToCSV']);



    Route::get('admin/pkm/list', [PkmController::class, 'list']);
    Route::get('admin/pkm/create', [PkmController::class, 'create']);
    Route::post('admin/pkm/create', [PkmController::class, 'tambah']);
    Route::get('admin/pkm/edit/{id}', [PkmController::class, 'edit']);
    Route::post('admin/pkm/edit/{id}', [PkmController::class, 'update']);
    Route::get('admin/pkm/delete/{id}', [PkmController::class, 'delete']);
    Route::get('admin/pkm/download/{id}', [PkmController::class, 'download']);
    Route::post('admin/pkm/csv', [PkmController::class, 'exportToCSV']);

});

Route::group(['middleware' => 'dosen'], function(){
    Route::get('dosen/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('dosen/kkn/list', [KknDosenController::class, 'list']);
    Route::get('dosen/kkn/create', [KknDosenController::class, 'create']);
    Route::post('dosen/kkn/create', [KknDosenController::class, 'tambah']);
    Route::get('dosen/kkn/edit/{id}', [KknDosenController::class, 'edit']);
    Route::post('dosen/kkn/edit/{id}', [KknDosenController::class, 'update']);
    Route::get('dosen/kkn/delete/{id}', [KknDosenController::class, 'delete']);
    Route::post('dosen/kkn/csv', [KknDosenController::class, 'exportToCSV']);

    Route::get('dosen/kp/list', [KpDosenController::class, 'list']);
    Route::get('dosen/kp/create', [KpDosenController::class, 'create']);
    Route::post('dosen/kp/create', [KpDosenController::class, 'tambah']);
    Route::get('dosen/kp/edit/{id}', [KpDosenController::class, 'edit']);
    Route::post('dosen/kp/edit/{id}', [KpDosenController::class, 'update']);
    Route::get('dosen/kp/delete/{id}', [KpDosenController::class, 'delete']);
    Route::get('dosen/kp/download/{id}', [KpDosenController::class, 'download']);
    Route::post('dosen/kp/csv', [KpDosenController::class, 'exportToCSV']);

    Route::get('dosen/mahasiswa/list', [MahasiswadosenController::class, 'list']);
    Route::get('dosen/mahasiswa/create', [MahasiswadosenController::class, 'create']);
    Route::post('dosen/mahasiswa/create', [MahasiswadosenController::class, 'tambah']);
    Route::get('dosen/mahasiswa/edit/{id}', [MahasiswadosenController::class, 'edit']);
    Route::post('dosen/mahasiswa/edit/{id}', [MahasiswadosenController::class, 'update']);
    Route::get('dosen/mahasiswa/delete/{id}', [MahasiswadosenController::class, 'delete']);
    Route::post('dosen/mahasiswa/csv', [MahasiswadosenController::class, 'exportToCSV']);

    Route::get('dosen/pesan/list', [PesanController::class, 'list']);
    Route::get('dosen/pesan/create', [PesanController::class, 'create']);
    Route::post('dosen/pesan/create', [PesanController::class, 'tambah']);
    Route::get('dosen/pesan/edit/{id}', [PesanController::class, 'edit']);
    Route::post('dosen/pesan/edit/{id}', [PesanController::class, 'update']);
    Route::get('dosen/pesan/delete/{id}', [PesanController::class, 'delete']);

    Route::get('dosen/perwalian/list', [PerwalianController::class, 'list']);
    Route::get('dosen/perwalian/word', [PerwalianController::class, 'formword']);
    Route::post('dosen/perwalian/word', [PerwalianController::class, 'word']);
    Route::post('dosen/perwalian/seluruh', [PerwalianController::class, 'seluruh']);
    Route::post('dosen/perwalian/updatetidakhadir/{id}', [PerwalianController::class, 'updatetidakhadir']);
    Route::post('dosen/perwalian/updatehadir/{id}', [PerwalianController::class, 'updatehadir']);

    Route::get('dosen/ta/list', [TaDosenController::class, 'list']);
    Route::get('dosen/ta/create', [TaDosenController::class, 'create']);
    Route::post('dosen/ta/create', [TaDosenController::class, 'tambah']);
    Route::get('dosen/ta/edit/{id}', [TaDosenController::class, 'edit']);
    Route::post('dosen/ta/edit/{id}', [TaDosenController::class, 'update']);
    Route::get('dosen/ta/delete/{id}', [TaDosenController::class, 'delete']);
    Route::post('dosen/ta/csv', [TaDosenController::class, 'exportToCSV']);

    Route::get('dosen/prestasi/list', [LombaDosenController::class, 'list']);
    Route::get('dosen/prestasi/create', [LombaDosenController::class, 'create']);
    Route::post('dosen/prestasi/create', [LombaDosenController::class, 'tambah']);
    Route::get('dosen/prestasi/edit/{id}', [LombaDosenController::class, 'edit']);
    Route::post('dosen/prestasi/edit/{id}', [LombaDosenController::class, 'update']);
    Route::get('dosen/prestasi/delete/{id}', [LombaDosenController::class, 'delete']);
    Route::get('dosen/prestasi/download/{id}', [LombaDosenController::class, 'download']);
    Route::post('dosen/prestasi/csv', [LombaDosenController::class, 'exportToCSV']);

    Route::get('dosen/mbkm/list', [MbkmDosenController::class, 'list']);
    Route::get('dosen/mbkm/create', [MbkmDosenController::class, 'create']);
    Route::post('dosen/mbkm/create', [MbkmDosenController::class, 'tambah']);
    Route::get('dosen/mbkm/edit/{id}', [MbkmDosenController::class, 'edit']);
    Route::post('dosen/mbkm/edit/{id}', [MbkmDosenController::class, 'update']);
    Route::get('dosen/mbkm/delete/{id}', [MbkmDosenController::class, 'delete']);
    Route::get('dosen/mbkm/download/{id}', [MbkmDosenController::class, 'download']);
    Route::post('dosen/mbkm/csv', [MbkmDosenController::class, 'exportToCSV']);

    Route::get('dosen/pkm/list', [PkmDosenController::class, 'list']);
    Route::get('dosen/pkm/create', [PkmDosenController::class, 'create']);
    Route::post('dosen/pkm/create', [PkmDosenController::class, 'tambah']);
    Route::get('dosen/pkm/edit/{id}', [PkmDosenController::class, 'edit']);
    Route::post('dosen/pkm/edit/{id}', [PkmDosenController::class, 'update']);
    Route::get('dosen/pkm/delete/{id}', [PkmDosenController::class, 'delete']);
    Route::get('dosen/pkm/download/{id}', [PkmDosenController::class, 'download']);
    Route::post('dosen/pkm/csv', [PkmDosenController::class, 'exportToCSV']);

});

Route::group(['middleware' => 'mahasiswa'], function(){
    Route::get('mahasiswa/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('mahasiswa/kkn/list', [KknMahasiswaController::class, 'list']);
    Route::get('mahasiswa/kkn/create', [KknMahasiswaController::class, 'create']);
    Route::post('mahasiswa/kkn/create', [KknMahasiswaController::class, 'tambah']);
    Route::get('mahasiswa/kkn/edit/{id}', [KknMahasiswaController::class, 'edit']);
    Route::post('mahasiswa/kkn/edit/{id}', [KknMahasiswaController::class, 'update']);
    Route::get('mahasiswa/kkn/delete/{id}', [KknMahasiswaController::class, 'delete']);

    Route::get('mahasiswa/kp/list', [KpMahasiswaController::class, 'list']);
    Route::get('mahasiswa/kp/create', [KpMahasiswaController::class, 'create']);
    Route::post('mahasiswa/kp/create', [KpMahasiswaController::class, 'tambah']);
    Route::get('mahasiswa/kp/edit/{id}', [KpMahasiswaController::class, 'edit']);
    Route::post('mahasiswa/kp/edit/{id}', [KpMahasiswaController::class, 'update']);
    Route::get('mahasiswa/kp/delete/{id}', [KpMahasiswaController::class, 'delete']);

    Route::get('mahasiswa/ta/list', [TaMahasiswaController::class, 'list']);
    Route::get('mahasiswa/ta/create', [TaMahasiswaController::class, 'create']);
    Route::post('mahasiswa/ta/create', [TaMahasiswaController::class, 'tambah']);
    Route::get('mahasiswa/ta/edit/{id}', [TaMahasiswaController::class, 'edit']);
    Route::post('mahasiswa/ta/edit/{id}', [TaMahasiswaController::class, 'update']);
    Route::get('mahasiswa/ta/delete/{id}', [TaMahasiswaController::class, 'delete']);

    Route::get('mahasiswa/prestasi/list', [LombaMahasiswaController::class, 'list']);
    Route::get('mahasiswa/prestasi/create', [LombaMahasiswaController::class, 'create']);
    Route::post('mahasiswa/prestasi/create', [LombaMahasiswaController::class, 'tambah']);
    Route::get('mahasiswa/prestasi/edit/{id}', [LombaMahasiswaController::class, 'edit']);
    Route::post('mahasiswa/prestasi/edit/{id}', [LombaMahasiswaController::class, 'update']);
    Route::get('mahasiswa/prestasi/delete/{id}', [LombaMahasiswaController::class, 'delete']);

    Route::get('mahasiswa/mbkm/list', [MbkmMahasiswaController::class, 'list']);
    Route::get('mahasiswa/mbkm/create', [MbkmMahasiswaController::class, 'create']);
    Route::post('mahasiswa/mbkm/create', [MbkmMahasiswaController::class, 'tambah']);
    Route::get('mahasiswa/mbkm/edit/{id}', [MbkmMahasiswaController::class, 'edit']);
    Route::post('mahasiswa/mbkm/edit/{id}', [MbkmMahasiswaController::class, 'update']);
    Route::get('mahasiswa/mbkm/delete/{id}', [MbkmMahasiswaController::class, 'delete']);
    Route::get('mahasiswa/mbkm/download/{id}', [MbkmMahasiswaController::class, 'download']);

    Route::get('mahasiswa/pkm/list', [PkmMahasiswaController::class, 'list']);
    Route::get('mahasiswa/pkm/create', [PkmMahasiswaController::class, 'create']);
    Route::post('mahasiswa/pkm/create', [PkmMahasiswaController::class, 'tambah']);
    Route::get('mahasiswa/pkm/edit/{id}', [PkmMahasiswaController::class, 'edit']);
    Route::post('mahasiswa/pkm/edit/{id}', [PkmMahasiswaController::class, 'update']);
    Route::get('mahasiswa/pkm/delete/{id}', [PkmMahasiswaController::class, 'delete']);
    Route::get('mahasiswa/pkm/download/{id}', [PkmMahasiswaController::class, 'download']);
});