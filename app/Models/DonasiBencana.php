<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    /**
     * Filter dinamis berdasarkan request
     */
    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
{
    foreach ($filterableColumns as $column) {
        if ($request->has($column) && $request->input($column) !== '') {
            $query->where($column, $request->input($column));
        }
    }

    return $query;
}

public function scopeSearch(Builder $query, $request, array $columns): Builder
{
    if ($request->filled('search')) {
        $query->where(function ($q) use ($request, $columns) {
            foreach ($columns as $column) {
                $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
            }
        });
    }

    return $query;
}


}
