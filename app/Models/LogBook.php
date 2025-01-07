<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogBook extends Model
{
    use HasFactory;

    protected $table = 'log_book_pkl';
    protected $primaryKey = 'id_log_book_pkl';
    protected $fillable = ['pkl_mahasiswa_id', 'kegiatan', 'tgl_awal_kegiatan', 'tgl_akhir_kegiatan', 'dokumen_laporan', 'status', 'komentar'];

    public function pkl_mahasiswa()
    {
        return $this->belongsTo(PKLMahasiswa::class, 'pkl_mahasiswa_id', 'id_pkl_mahasiswa');
    }
}
