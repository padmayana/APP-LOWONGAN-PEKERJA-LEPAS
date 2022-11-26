<?php

use App\Http\Controllers\bidangControler;
use App\Http\Controllers\dashboardControler;
use App\Http\Controllers\GoogleControler;
use App\Http\Controllers\homeControler;
use App\Http\Controllers\klienLowonganControler;
use App\Http\Controllers\klienPelamarController;
use App\Http\Controllers\klienPermintaanController;
use App\Http\Controllers\klienProfilController;
use App\Http\Controllers\LaporanLowonganController;
use App\Http\Controllers\LaporanPermintaanController;
use App\Http\Controllers\loginControler;
use App\Http\Controllers\lowonganControler;
use App\Http\Controllers\NavigasiController;
use App\Http\Controllers\pekerjaLamaranController;
use App\Http\Controllers\pekerjaLowonganController;
use App\Http\Controllers\pekerjaPermintaanController;
use App\Http\Controllers\pekerjaProfilController;
use App\Http\Controllers\permintaanControler;
use App\Http\Controllers\regisControler;
use App\Http\Controllers\resetControler;
use App\Http\Controllers\UpahPermintaanController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/anjing', function () {
//     return view('Klien.PermintaanLaporan');
// });

// Navigasi view

// Login dan regis
//login
Route::get('/login', [loginControler::class, 'index'])->middleware('guest');
Route::post('/login', [loginControler::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [loginControler::class, 'logout'])->middleware('auth');
// google login
Route::get('/auth/redirect', [GoogleControler::class, 'redirectToProvider']);
Route::get('/auth/google/calback', [GoogleControler::class, 'handleProviderCallback']);
Route::get('/google/daftar/{nama}/{email}', [GoogleControler::class, 'daftar']);
Route::get('/auth/google/level', [GoogleControler::class, 'level']);
Route::get('/auth/google/level/{jenis}', [GoogleControler::class, 'levelEdit']);
// regis
Route::get('/reglevel', [regisControler::class, 'index']);
Route::get('/reglevel/{level}', [regisControler::class, 'level']);
Route::put('/regemail/{level}', [regisControler::class, 'konfirmasi']);
Route::get('/registrasi/{level}/{email}', [regisControler::class, 'formulir']);
Route::put('/registrasi/daftar/{level}/{email}', [regisControler::class, 'simpan']);
// Reset password
Route::get('/reset/email', [resetControler::class, 'index'])->middleware('guest');
Route::post('/reset/link', [resetControler::class, 'link'])->middleware('guest');
Route::get('/reset/{email}', [resetControler::class, 'password'])->middleware('guest');
Route::put('/reset/simpan/{email}', [resetControler::class, 'simpan'])->middleware('guest');




// dashboard
Route::middleware(['admin'])->group(function(){
    Route::get('/admin/dashboard', [dashboardControler::class, 'index']);
// user dashboard route
    Route::get('/admin/pengguna', [userController::class, 'index']);
    Route::put('/admin/pengguna/{id}', [userController::class, 'update']);
    Route::get('/admin/pengguna/delete/{id}', [userController::class, 'delete']);
// Bidang dashboard
    Route::get('/admin/bidang', [bidangControler::class, 'index']);
    Route::put('/admin/bidang/{id}', [bidangControler::class, 'update']);
    Route::post('/admin/bidang', [bidangControler::class, 'tambah']);
    Route::get('/admin/bidang/delete/{id}', [bidangControler::class, 'delete']);
// Permintaan dashboard route
    Route::get('/admin/permintaan', [permintaanControler::class, 'index']);
    Route::get('/admin/permintaan/update', [permintaanControler::class, 'update']);
// Lowongan dasboard route
    Route::get('/admin/lowongan', [lowonganControler::class, 'index']);
    Route::get('/admin/lowongan/{id}', [lowonganControler::class, 'cek']);
    Route::get('/admin/lowongan/iklan/{id}', [lowonganControler::class, 'iklan']);
    Route::get('/admin/lowongan/tolak/{id}', [lowonganControler::class, 'tolak']);
    Route::get('/admin/lowongan/tutup/{id}', [lowonganControler::class, 'tutup']);
//dashboard edit profile admin
    Route::post('/admin/profil/edit', [dashboardControler::class, 'edit']);
    Route::post('/admin/profil/foto', [dashboardControler::class, 'foto']);
});


// home
Route::get('/', [homeControler::class, 'index']);

// Klien
Route::middleware(['klien'])->group(function(){
    Route::get('/klien/lowongan', [klienLowonganControler::class, 'index']);
// profile
    Route::get('/klien/profil', [klienProfilController::class, 'index']);
// Profile edit
    Route::post('/klien/profil/edit', [klienProfilController::class, 'edit']);
    Route::post('/klien/profil/foto', [klienProfilController::class, 'foto']);
// lowongan Klien
    Route::post('/klien/lowongan', [klienLowonganControler::class, 'simpan']);
    Route::get('/klien/lowongan/hapus/{id}', [klienLowonganControler::class, 'hapus']);
    Route::put('/klien/lowongan/edit/{id}', [klienLowonganControler::class, 'edit']);
    Route::get('/klien/lowongan/tutup/{id}', [klienLowonganControler::class, 'tutup']);
// Pelamar Klien
    Route::get('/klien/lowongan/pelamar/{id}', [klienPelamarController::class, 'index']);
    Route::get('/klien/lowongan/pelamar/{user}/{lamaran}/{pelamar}', [klienPelamarController::class, 'profil']);
    Route::get('/klien/lowongan/cv/{cv}', [klienPelamarController::class, 'view']);
    Route::get('/klien/lowongan/menerima/{pelamar}/{lowongan}', [klienPelamarController::class, 'terima']);
// Permintaan klien
    Route::get('/klien/permintaan', [klienPermintaanController::class, 'index']);
    Route::get('/klien/permintaan/cari', [klienPermintaanController::class, 'cari']);
    Route::get('/klien/permintaan/profil/{skil}', [klienPermintaanController::class, 'profil']);
    Route::get('/klien/permintaan/profil/{skil}/{permintaan}', [klienPermintaanController::class, 'informasi']);
    Route::put('/klien/permintaan/buat/{skill_id}', [klienPermintaanController::class, 'permintaan']);
    Route::get('/klien/permintaan/batal/{permintaan}', [klienPermintaanController::class, 'hapus']);
// PERMINTAAN UPAH
    Route::get('/klien/upah/setuju/{id}', [UpahPermintaanController::class, 'klienSetuju']);
    Route::get('/klien/upah/menolak/{id}', [UpahPermintaanController::class, 'klienMenolak']);
//laporan
    Route::get('/klien/permintaan/laporan', [LaporanPermintaanController::class, 'index']);
    Route::get('/klien/lowongan/laporan/{id}', [LaporanLowonganController::class, 'index']);
});




// Pekerja Lepas
// Lowongan pekerja
Route::middleware(['pekerja'])->group(function(){
// Profile pekerja
    Route::get('/pekerja/profil', [pekerjaProfilController::class, 'index']);
// Profile edit
    Route::post('/pekerja/profil/edit', [pekerjaProfilController::class, 'edit']);
    Route::post('/pekerja/profil/foto', [pekerjaProfilController::class, 'foto']);
    Route::post('/pekerja/profil/cv', [pekerjaProfilController::class, 'cv']);
    Route::get('/pekerja/profil/cv', [pekerjaProfilController::class, 'view']);
    Route::post('/pekerja/profil/skill', [pekerjaProfilController::class, 'skill']);
    Route::get('/pekerja/profil/hapus/{id}', [pekerjaProfilController::class, 'hapus']);
// vie lowongan pekerja
    Route::get('/pekerja/lowongan', [pekerjaLowonganController::class, 'index']);
    Route::get('/pekerja/lowongan/detail/{id}', [pekerjaLowonganController::class, 'detail']);
// Melamar pekerja
    Route::get('/pekerja/melamar/{id}', [pekerjaLamaranController::class, 'serahkan']);
    Route::get('/pekerja/batal/{id}', [pekerjaLamaranController::class, 'batalkan']);
    Route::get('/pekerja/lamaran', [pekerjaLamaranController::class, 'status']);
// Permintaan pekerja
    Route::get('/pekerja/permintaan', [pekerjaPermintaanController::class, 'index']);
    Route::get('/pekerja/permintaan/{id}', [pekerjaPermintaanController::class, 'detail']);
    Route::get('/pekerja/permintaan/terima/{id}', [pekerjaPermintaanController::class, 'terima']);
    Route::get('/pekerja/permintaan/tolak/{id}', [pekerjaPermintaanController::class, 'tolak']);
    Route::get('/pekerja/permintaan/kerja/{permintaan}/{upah}', [pekerjaPermintaanController::class, 'kerja']);
    Route::get('/pekerja/permintaan/selesai/{permintaan}/{upah}', [pekerjaPermintaanController::class, 'selesai']);
    //menentukan Upah
    Route::put('/pekerja/upah/buat/{id}', [UpahPermintaanController::class, 'tambah']);
    Route::put('/pekerja/upah/edit/{id}', [UpahPermintaanController::class, 'edit']);

});