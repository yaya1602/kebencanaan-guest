<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    //use HasFactory;

   
    protected $fillable = [
        'nama_lengkap',
        'nik',
        'alamat',
        'no_telepon',
        'jenis_kelamin',
    ];
}

