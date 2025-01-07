<?php

namespace App\Models;

use App\Models\Prodi;
use App\Models\SemesterTahunAkademik;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['prodi_id', 'smt_thnakd_id', 'kode_kelas', 'nama_kelas'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id_prodi');
    }

    public function smt_thnakd()
    {
        return $this->belongsTo(SemesterTahunAkademik::class, 'smt_thnakd_id', 'id_smt_thnakd');
    }
}
