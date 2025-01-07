<?php

namespace App\Models;

use App\Models\Mahasiswa;
use App\Models\TempatPKL;
use App\Models\RoleTempatPKL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsulanTempatPKL extends Model
{
    use HasFactory;

    protected $table = 'usulan_tempat_pkl';
    protected $primaryKey = 'id_usulan';
    protected $fillable = ['tempat_pkl_id', 'mahasiswa_id', 'role_tempat_pkl_id', 'file_usulan', 'komentar', 'alamat_tempat_pkl', 'kota_perusahaan', 'tgl_awal_pkl', 'tgl_akhir_pkl', 'status_usulan'];

    public function tempat_pkl()
    {
        return $this->belongsTo(TempatPKL::class, 'tempat_pkl_id', 'id_tempat_pkl');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id_mahasiswa');
    }

    public function role_tempat_pkl()
    {
        return $this->belongsTo(RoleTempatPKL::class, 'role_tempat_pkl_id', 'id_role_tempat_pkl');
    }



    //Untuk memanggil nama mahasiswa di PKLMahasiswa(index.blade.php & PKLMahasiswaController.php)
    public function pklMahasiswa()
    {
        return $this->hasMany(PKLMahasiswa::class, 'usulan_id', 'id_usulan');
    }
}
