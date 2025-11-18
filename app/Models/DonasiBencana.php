<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonasiBencana extends Model
{
    protected $table = 'donasi_bencana';
    protected $primaryKey = 'donasi_id';
    protected $fillable = [
        'posko_id',
        'donatur_nama',
        'jenis_donasi',
        'nilai'
    ];

    public function posko()
    {
        return $this->belongsTo(PoskoBencana::class, 'posko_id');
    }
}
