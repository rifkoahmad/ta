<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKLNilai extends Model
{
    use HasFactory;

    protected $table = 'pkl_nilai';
    protected $primaryKey = 'id_pkl_nilai';
    protected $fillable = ['pkl_mahasiswa_id', 'dosen_id', 'nilai', 'sebagai'];

    public function pkl_mahasiswa()
    {
        return $this->belongsTo(PKLMahasiswa::class, 'pkl_mahasiswa_id', 'id_pkl_mahasiswa');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id', 'id_dosen');
    }
}
