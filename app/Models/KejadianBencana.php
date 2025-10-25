<?php
namespace App\Models;

use App\Models\KejadianBencana;
use Illuminate\Database\Eloquent\Model;

class KejadianBencana extends Model
{

    protected $table      = 'kejadian_bencana';
    //protected $primarykey = 'kejadian_id';
    protected $fillable   = [
        'nama_bencana',
        'tanggal',
        'lokasi',
        'deskripsi',
        'gambar'
    ];

}
