<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoskoBencana extends Model
{
    protected $table = 'posko_bencana';
    protected $primaryKey = 'posko_id';
    protected $fillable = [
        'nama_posko',
        'alamat',
        'kontak',
        'penanggung_jawab'
    ];

    public function donasi()
    {
        return $this->hasMany(DonasiBencana::class, 'posko_id');
    }
}
