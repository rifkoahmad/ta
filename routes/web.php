<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProdiController;
use Illuminate\Contracts\Session\Session;
use App\Http\Controllers\PKLMhsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LogBookController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\PKLNilaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TempatPKLController;
use App\Http\Controllers\LogBookPemController;
use App\Http\Controllers\SemproNilaiController;
use App\Http\Controllers\PKLMahasiswaController;
use App\Http\Controllers\Sesi\SessionController;
use App\Http\Controllers\RoleTempatPKLController;
use App\Http\Controllers\JabatanPimpinanController;
use App\Http\Controllers\PKLNilaiPembimbingController;
use App\Http\Controllers\PKLNilaiPengujiController;
use App\Http\Controllers\SemproMahasiswaController;
use App\Http\Controllers\UsulanTempatPKLController;
use App\Http\Controllers\VerifikasiUsulanController;
use App\Http\Controllers\SemproMahasiswaKapController;
use App\Http\Controllers\SemesterTahunAkademikController;
use App\Http\Controllers\SemproNilaiPembimbingController;
use App\Http\Controllers\SemproNilaiPengujiController;

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


Route::get('/session', [SessionController::class, 'index'])->name('session.index')->middleware('isTamu');
Route::post('/session/login', [SessionController::class, 'login'])->name('login.index')->middleware('isTamu');
Route::get('/session/logout', [SessionController::class, 'logout'])->name('logout.index');





Route::get('/', [FrontEndController::class, 'index'])->name('frontend.index');

// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Dasboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => ['role:admin']], function () {
        // Jurusan
        Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
        Route::get('/jurusan-create', [JurusanController::class, 'create'])->name('jurusan.create');
        Route::post('/jurusan-store', [JurusanController::class, 'store'])->name('jurusan.store');
        Route::get('/{id}/jurusan-edit', [JurusanController::class, 'edit'])->name('jurusan.edit');
        Route::patch('/{id}/jurusan-update', [JurusanController::class, 'update'])->name('jurusan.update');
        Route::delete('/{id}/jurusan-destroy', [JurusanController::class, 'destroy'])->name('jurusan.destroy');

        // Prodi
        Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
        Route::get('/prodi-create', [ProdiController::class, 'create'])->name('prodi.create');
        Route::post('/prodi-store', [ProdiController::class, 'store'])->name('prodi.store');
        Route::get('/{id}/prodi-edit', [ProdiController::class, 'edit'])->name('prodi.edit');
        Route::patch('/{id}/prodi-update', [ProdiController::class, 'update'])->name('prodi.update');
        Route::delete('/{id}/prodi-destroy', [ProdiController::class, 'destroy'])->name('prodi.destroy');

        // Jabatan Pimpinan
        Route::get('/jabatan-pimpinan', [JabatanPimpinanController::class, 'index'])->name('jabatan-pimpinan.index');
        Route::get('/jabatan-pimpinan-create', [JabatanPimpinanController::class, 'create'])->name('jabatan-pimpinan.create');
        Route::post('/jabatan-pimpinan-store', [JabatanPimpinanController::class, 'store'])->name('jabatan-pimpinan.store');
        Route::get('/{id}/jabatan-pimpinan-edit', [JabatanPimpinanController::class, 'edit'])->name('jabatan-pimpinan.edit');
        Route::patch('/{id}/jabatan-pimpinan-update', [JabatanPimpinanController::class, 'update'])->name('jabatan-pimpinan.update');
        Route::delete('/{id}/jabatan-pimpinan-destroy', [JabatanPimpinanController::class, 'destroy'])->name('jabatan-pimpinan.destroy');

        // Semester Tahun Akademik
        Route::get('/semester-tahun-akademik', [SemesterTahunAkademikController::class, 'index'])->name('semester.index');
        Route::get('/semester-tahun-akademik-create', [SemesterTahunAkademikController::class, 'create'])->name('semester.create');
        Route::post('/semester-tahun-akademik-store', [SemesterTahunAkademikController::class, 'store'])->name('semester.store');
        Route::get('/{id}/semester-tahun-akademik-edit', [SemesterTahunAkademikController::class, 'edit'])->name('semester.edit');
        Route::patch('/{id}/semester-tahun-akademik-update', [SemesterTahunAkademikController::class, 'update'])->name('semester.update');
        Route::delete('/{id}/semester-tahun-akademik-destroy', [SemesterTahunAkademikController::class, 'destroy'])->name('semester.destroy');

        // Kelas
        Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
        Route::get('/kelas-create', [KelasController::class, 'create'])->name('kelas.create');
        Route::post('/kelas-store', [KelasController::class, 'store'])->name('kelas.store');
        Route::get('/{id}/kelas-edit', [KelasController::class, 'edit'])->name('kelas.edit');
        Route::patch('/{id}/kelas-update', [KelasController::class, 'update'])->name('kelas.update');
        Route::delete('/{id}/kelas-destroy', [KelasController::class, 'destroy'])->name('kelas.destroy');

        // Mahasiswa
        Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
        Route::get('/mahasiswa-create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
        Route::post('/mahasiswa-store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
        Route::get('/{id}/mahasiswa-edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
        Route::patch('/{id}/mahasiswa-update', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
        Route::delete('/{id}/mahasiswa-destroy', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

        // Golongan
        Route::get('/golongan', [GolonganController::class, 'index'])->name('golongan.index');
        Route::get('/golongan-create', [GolonganController::class, 'create'])->name('golongan.create');
        Route::post('/golongan-store', [GolonganController::class, 'store'])->name('golongan.store');
        Route::get('/{id}/golongan-edit', [GolonganController::class, 'edit'])->name('golongan.edit');
        Route::patch('/{id}/golongan-update', [GolonganController::class, 'update'])->name('golongan.update');
        Route::delete('/{id}/golongan-destroy', [GolonganController::class, 'destroy'])->name('golongan.destroy');

        // Dosen
        Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
        Route::get('/dosen-create', [DosenController::class, 'create'])->name('dosen.create');
        Route::post('/dosen-store', [DosenController::class, 'store'])->name('dosen.store');
        Route::get('/{id}/dosen-edit', [DosenController::class, 'edit'])->name('dosen.edit');
        Route::patch('/{id}/dosen-update', [DosenController::class, 'update'])->name('dosen.update');
        Route::delete('/{id}/dosen-destroy', [DosenController::class, 'destroy'])->name('dosen.destroy');

        // Pimpinan
        Route::get('/pimpinan', [PimpinanController::class, 'index'])->name('pimpinan.index');
        Route::get('/pimpinan-create', [PimpinanController::class, 'create'])->name('pimpinan.create');
        Route::post('/pimpinan-store', [PimpinanController::class, 'store'])->name('pimpinan.store');
        Route::get('/{id}/pimpinan-edit', [PimpinanController::class, 'edit'])->name('pimpinan.edit');
        Route::patch('/{id}/pimpinan-update', [PimpinanController::class, 'update'])->name('pimpinan.update');
        Route::delete('/{id}/pimpinan-destroy', [PimpinanController::class, 'destroy'])->name('pimpinan.destroy');

        //Ruangan
        Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
        Route::get('/ruangan-create', [RuanganController::class, 'create'])->name('ruangan.create');
        Route::post('/ruangan-store', [RuanganController::class, 'store'])->name('ruangan.store');
        Route::get('/{id}/ruangan-edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
        Route::patch('/{id}/ruangan-update', [RuanganController::class, 'update'])->name('ruangan.update');
        Route::delete('/{id}/ruangan-destroy', [RuanganController::class, 'destroy'])->name('ruangan.destroy');

        // Sesi
        Route::get('/sesi', [SesiController::class, 'index'])->name('sesi.index');
        Route::get('/sesi-create', [SesiController::class, 'create'])->name('sesi.create');
        Route::post('/sesi-store', [SesiController::class, 'store'])->name('sesi.store');
        Route::get('/{id}/sesi-edit', [SesiController::class, 'edit'])->name('sesi.edit');
        Route::patch('/{id}/sesi-update', [SesiController::class, 'update'])->name('sesi.update');
        Route::delete('/{id}/sesi-destroy', [SesiController::class, 'destroy'])->name('sesi.destroy');

        // Tempat PKL
        Route::get('/tempat-pkl', [TempatPKLController::class, 'index'])->name('tempat-pkl.index');
        Route::get('/tempat-pkl-create', [TempatPKLController::class, 'create'])->name('tempat-pkl.create');
        Route::post('/tempat-pkl-store', [TempatPKLController::class, 'store'])->name('tempat-pkl.store');
        Route::get('/{id}/tempat-pkl-edit', [TempatPKLController::class, 'edit'])->name('tempat-pkl.edit');
        Route::patch('/{id}/tempat-pkl-update', [TempatPKLController::class, 'update'])->name('tempat-pkl.update');
        Route::delete('/{id}/tempat-pkl-destroy', [TempatPKLController::class, 'destroy'])->name('tempat-pkl.destroy');

        // Role Tempat PKL
        Route::get('/role-tempat-pkl', [RoleTempatPKLController::class, 'index'])->name('role-tempat-pkl.index');
        Route::get('/role-tempat-pkl-create', [RoleTempatPKLController::class, 'create'])->name('role-tempat-pkl.create');
        Route::post('/role-tempat-pkl-store', [RoleTempatPKLController::class, 'store'])->name('role-tempat-pkl.store');
        Route::get('/{id}/role-tempat-pkl-edit', [RoleTempatPKLController::class, 'edit'])->name('role-tempat-pkl.edit');
        Route::patch('/{id}/role-tempat-pkl-update', [RoleTempatPKLController::class, 'update'])->name('role-tempat-pkl.update');
        Route::delete('/{id}/role-tempat-pkl-destroy', [RoleTempatPKLController::class, 'destroy'])->name('role-tempat-pkl.destroy');
    });

    Route::group(['middleware' => ['role:mahasiswa']], function () {
        // Usulan Tempat PKL
        Route::get('/usulan-pkl', [UsulanTempatPKLController::class, 'index'])->name('usulan-pkl.index');
        Route::get('/usulan-pkl-create', [UsulanTempatPKLController::class, 'create'])->name('usulan-pkl.create');
        Route::post('/usulan-pkl-store', [UsulanTempatPKLController::class, 'store'])->name('usulan-pkl.store');
        Route::get('/{id}/usulan-pkl-edit', [UsulanTempatPKLController::class, 'edit'])->name('usulan-pkl.edit');
        Route::patch('/{id}/usulan-pkl-update', [UsulanTempatPKLController::class, 'update'])->name('usulan-pkl.update');
        Route::delete('/{id}/usulan-pkl-destroy', [UsulanTempatPKLController::class, 'destroy'])->name('usulan-pkl.destroy');

        // Mahasiswa PKL
        Route::get('/mahasiswa-pkl-kap', [PKLMhsController::class, 'index'])->name('pkl-mhs.index');
        Route::get('/{id}/mahasiswa-pkl-kap-edit', [PKLMhsController::class, 'edit'])->name('pkl-mhs.edit');
        Route::patch('/{id}/mahasiswa-pkl-kap-update', [PKLMhsController::class, 'update'])->name('pkl-mhs.update');

        // LogBook
        Route::get('/logbook', [LogBookController::class, 'index'])->name('logbook.index');
        Route::get('/logbook-create', [LogBookController::class, 'create'])->name('logbook.create');
        Route::post('/logbook-store', [LogBookController::class, 'store'])->name('logbook.store');
        Route::get('/{id}/logbook-edit', [LogBookController::class, 'edit'])->name('logbook.edit');
        Route::patch('/{id}/logbook-update', [LogBookController::class, 'update'])->name('logbook.update');
        // Route::delete('/{id}/logbook-destroy', [LogBookController::class, 'destroy'])->name('logbook.destroy');

        //Sempro Mahasiswa
        Route::get('/sempro-mhs', [SemproMahasiswaController::class, 'index'])->name('sempro-mhs.index');
        Route::get('/sempro-mhs-create', [SemproMahasiswaController::class, 'create'])->name('sempro-mhs.create');
        Route::post('/sempro-mhs-store', [SemproMahasiswaController::class, 'store'])->name('sempro-mhs.store');
        Route::get('/{id}/sempro-mhs-edit', [SemproMahasiswaController::class, 'edit'])->name('sempro-mhs.edit');
        Route::patch('/{id}/sempro-mhs-update', [SemproMahasiswaController::class, 'update'])->name('sempro-mhs.update');
    });

    Route::group(['middleware' => ['role:pimpinanProdi']], function () {
        // Booking  [BELUM SELESAI!!!!!]
        Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
        Route::get('/booking-create', [BookingController::class, 'create'])->name('booking.create');
        Route::post('/booking-store', [BookingController::class, 'store'])->name('booking.store');
        Route::get('/{id}/booking-edit', [BookingController::class, 'edit'])->name('booking.edit');
        Route::put('/{id}/booking-update', [BookingController::class, 'update'])->name('booking.update');
        Route::delete('/{id}/booking-destroy', [BookingController::class, 'destroy'])->name('booking.destroy');

        // Verifikasi Usulan PKL
        Route::get('/verifikasi-usulan-pkl', [VerifikasiUsulanController::class, 'index'])->name('verifikasi-usulan-pkl.index');
        Route::get('/{id}/verifikasi-usulan-pkl-edit', [VerifikasiUsulanController::class, 'edit'])->name('verifikasi-usulan-pkl.edit');
        Route::patch('/{id}/verifikasi-usulan-pkl-update', [VerifikasiUsulanController::class, 'update'])->name('verifikasi-usulan-pkl.update');

        // Mahasiswa PKL Kap
        Route::get('/mahasiswa-pkl', [PKLMahasiswaController::class, 'index'])->name('pkl-mahasiswa.index');
        Route::get('/mahasiswa-pkl-create', [PKLMahasiswaController::class, 'create'])->name('pkl-mahasiswa.create');
        Route::post('/mahasiswa-pkl-store', [PKLMahasiswaController::class, 'store'])->name('pkl-mahasiswa.store');
        Route::get('/{id}/mahasiswa-pkl-edit', [PKLMahasiswaController::class, 'edit'])->name('pkl-mahasiswa.edit');
        Route::patch('/{id}/mahasiswa-pkl-update', [PKLMahasiswaController::class, 'update'])->name('pkl-mahasiswa.update');
        Route::delete('/{id}/mahasiswa-pkl-destroy', [PKLMahasiswaController::class, 'destroy'])->name('pkl-mahasiswa.destroy');

        //Sempro Mahasiswa Kap
        Route::get('/sempro-mhs-kap', [SemproMahasiswaKapController::class, 'index'])->name('sempro-mhs-kap.index');
        Route::get('/{id}/sempro-mhs-kap-edit', [SemproMahasiswaKapController::class, 'edit'])->name('sempro-mhs-kap.edit');
        Route::patch('/{id}/sempro-mhs-kap-update', [SemproMahasiswaKapController::class, 'update'])->name('sempro-mhs-kap.update');
    });

    Route::group(['middleware' => ['role:dosenPembimbing']], function () {
        // PKL Nilai
        Route::get('/pkl-nilai-pembimbing', [PKLNilaiPembimbingController::class, 'index'])->name('pkl-nilai-pembimbing.index');
        Route::get('/pkl-nilai-pembimbing-create', [PKLNilaiPembimbingController::class, 'create'])->name('pkl-nilai-pembimbing.create');
        Route::post('/pkl-nilai-pembimbing-store', [PKLNilaiPembimbingController::class, 'store'])->name('pkl-nilai-pembimbing.store');
        Route::get('/{id}/pkl-nilai-pembimbing-edit', [PKLNilaiPembimbingController::class, 'edit'])->name('pkl-nilai-pembimbing.edit');
        Route::patch('/{id}/pkl-nilai-pembimbing-update', [PKLNilaiPembimbingController::class, 'update'])->name('pkl-nilai-pembimbing.update');
        Route::delete('/{id}/pkl-nilai-pembimbing-destroy', [PKLNilaiPembimbingController::class, 'destroy'])->name('pkl-nilai-pembimbing.destroy');

        //Sempro Mahasiswa Nilai
        Route::get('/sempro-nilai-pembimbing', [SemproNilaiPembimbingController::class, 'index'])->name('sempro-nilai-pembimbing.index');
        Route::get('/sempro-nilai-pembimbing-create', [SemproNilaiPembimbingController::class, 'create'])->name('sempro-nilai-pembimbing.create');
        Route::post('/sempro-nilai-pembimbing-store', [SemproNilaiPembimbingController::class, 'store'])->name('sempro-nilai-pembimbing.store');
        Route::get('/{id}/sempro-nilai-pembimbing-edit', [SemproNilaiPembimbingController::class, 'edit'])->name('sempro-nilai-pembimbing.edit');
        Route::patch('/{id}/sempro-nilai-pembimbing-update', [SemproNilaiPembimbingController::class, 'update'])->name('sempro-nilai-pembimbing.update');
        Route::delete('/{id}/sempro-nilai-pembimbing-destroy', [SemproNilaiPembimbingController::class, 'destroy'])->name('sempro-nilai-pembimbing.destroy');

        //LogBook Pembimbing
        Route::get('/logbook-pem', [LogBookPemController::class, 'index'])->name('logbook-pem.index');
        Route::get('/{id}/logbook-pem-edit', [LogBookPemController::class, 'edit'])->name('logbook-pem.edit');
        Route::patch('/{id}/logbook-pem-update', [LogBookPemController::class, 'update'])->name('logbook-pem.update');
    });

    Route::group(['middleware' => ['role:dosenPenguji']], function () {
        // PKL Nilai
        Route::get('/pkl-nilai-penguji', [PKLNilaiPengujiController::class, 'index'])->name('pkl-nilai-penguji.index');
        Route::get('/pkl-nilai-penguji-create', [PKLNilaiPengujiController::class, 'create'])->name('pkl-nilai-penguji.create');
        Route::post('/pkl-nilai-penguji-store', [PKLNilaiPengujiController::class, 'store'])->name('pkl-nilai-penguji.store');
        Route::get('/{id}/pkl-nilai-penguji-edit', [PKLNilaiPengujiController::class, 'edit'])->name('pkl-nilai-penguji.edit');
        Route::patch('/{id}/pkl-nilai-penguji-update', [PKLNilaiPengujiController::class, 'update'])->name('pkl-nilai-penguji.update');
        Route::delete('/{id}/pkl-nilai-penguji-destroy', [PKLNilaiPengujiController::class, 'destroy'])->name('pkl-nilai-penguji.destroy');

        //Sempro Mahasiswa Nilai
        Route::get('/sempro-nilai-penguji', [SemproNilaiPengujiController::class, 'index'])->name('sempro-nilai-penguji.index');
        Route::get('/sempro-nilai-penguji-create', [SemproNilaiPengujiController::class, 'create'])->name('sempro-nilai-penguji.create');
        Route::post('/sempro-nilai-penguji-store', [SemproNilaiPengujiController::class, 'store'])->name('sempro-nilai-penguji.store');
        Route::get('/{id}/sempro-nilai-penguji-edit', [SemproNilaiPengujiController::class, 'edit'])->name('sempro-nilai-penguji.edit');
        Route::patch('/{id}/sempro-nilai-penguji-update', [SemproNilaiPengujiController::class, 'update'])->name('sempro-nilai-penguji.update');
        Route::delete('/{id}/sempro-nilai-penguji-destroy', [SemproNilaiPengujiController::class, 'destroy'])->name('sempro-nilai-penguji.destroy');
    });
});
