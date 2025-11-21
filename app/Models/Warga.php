<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Warga extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'nik',
        'alamat',
        'no_telepon',
        'jenis_kelamin',
    ];

    /**
     * Filter dinamis berdasarkan request
     */
    public function scopeFilter(Builder $query, $request, array $filterableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                $query->where($column, $request->input($column));
            }
        }
        return $query;
    }

    // SEARCH
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
