<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemproNilai extends Model
{
    use HasFactory;

    protected $table = 'sempro_nilai';
    protected $primaryKey = 'id_sempro_nilai';
    protected $fillable = ['sempro_mhs_id', 'dosen_id', 'nilai', 'sebagai'];

    public function sempro_mhs()
    {
        return $this->belongsTo(SemproMahasiswa::class, 'sempro_mhs_id', 'id_sempro_mhs');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id', 'id_dosen');
    }
}
