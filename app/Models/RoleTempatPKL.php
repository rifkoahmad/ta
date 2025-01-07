<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleTempatPKL extends Model
{
    use HasFactory;

    protected $table = 'role_tempat_pkl';
    protected $primaryKey = 'id_role_tempat_pkl';
    protected $fillable = ['nama_role'];

    public function tempat_pkl()
    {
        return $this->belongsTo(TempatPKL::class, 'tempat_pkl_id', 'id_tempat_pkl');
    }
}
