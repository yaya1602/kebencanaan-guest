<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class KejadianBencana extends Model
{
    protected $table      = 'kejadian_bencana';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_bencana',
        'tanggal',
        'lokasi',
        'deskripsi',
        'gambar',
    ];

    /**
     * Dynamic Filter (seperti model PoskoBencana)
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

    // --- Search Dinamis ---
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
