<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    protected $fillable = ['user_id', 'kelas_id', 'nama_mahasiswa', 'nim_mahasiswa', 'gender', 'status_mahasiswa'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id_kelas');
    }


    //utk pkl
    // public function usulanTempatPkl()
    // {
    //     return $this->hasMany(UsulanTempatPkl::class, 'mahasiswa_id', 'id_mahasiswa');
    // }
}
