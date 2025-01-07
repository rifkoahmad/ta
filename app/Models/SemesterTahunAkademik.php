<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterTahunAkademik extends Model
{
    use HasFactory;

    protected $table = 'smt_thnakd';
    protected $primaryKey = 'id_smt_thnakd';
    protected $fillable = ['kode_smt_thnakd', 'nama_smt_thnakd', 'status_smt_thnakd'];
}
