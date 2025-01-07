<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemproMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'sempro_mhs';
    protected $primaryKey = 'id_sempro_mhs';
    protected $fillable = ['mahasiswa_id', 'pembimbing_1_id', 'pembimbing_2_id', 'penguji_id', 'judul_sempro', 'file_sempro', 'komentar', 'status_ver_sempro', 'status_judul_sempro', 'status_sempro'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id_mahasiswa');
    }

    public function pembimbing1()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing_1_id', 'id_dosen');
    }

    public function pembimbing2()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing_2_id', 'id_dosen');
    }

    public function penguji()
    {
        return $this->belongsTo(Dosen::class, 'penguji_id', 'id_dosen');
    }
}
