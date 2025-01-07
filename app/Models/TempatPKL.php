<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatPKL extends Model
{
    use HasFactory;

    protected $table = 'tempat_pkl';
    protected $primaryKey = 'id_tempat_pkl';
    protected $fillable = ['nama_tempat_pkl'];
}
