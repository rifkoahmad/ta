<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKLMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'pkl_mahasiswa';
    protected $primaryKey = 'id_pkl_mahasiswa';
    protected $fillable = ['pembimbing_id', 'penguji_id', 'usulan_tempat_pkl_id', 'judul_laporan', 'pembimbing_pkl', 'file_nilai', 'file_laporan', 'nilai_industri', 'status_ver_pkl'];

    public function pembimbing()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing_id', 'id_dosen');
    }

    public function penguji()
    {
        return $this->belongsTo(Dosen::class, 'penguji_id', 'id_dosen');
    }


    public function usulan()
    {
        return $this->belongsTo(UsulanTempatPKL::class, 'usulan_tempat_pkl_id', 'id_usulan');
    }

    // utk pkl nilai
    // public function pklNilai()
    // {
    //     return $this->hasMany(PklNilai::class, 'pkl_mahasiswa_id', 'id_pkl_mahasiswa');
    // }
}
