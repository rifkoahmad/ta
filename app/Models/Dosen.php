<?php

namespace App\Models;

use App\Models\User;
use App\Models\Prodi;
use App\Models\Golongan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';
    // public $incrementing = true; // Jika primary key adalah auto-increment
    protected $fillable = ['user_id', 'prodi_id', 'golongan_id', 'nama_dosen', 'nidn_dosen', 'gender', 'status_dosen'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id_prodi');
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'golongan_id', 'id_golongan');
    }
}
