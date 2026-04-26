<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitra'; // pastikan ini sesuai dengan nama tabel
    protected $primaryKey = 'mitra_id'; // gunakan mitra_id sebagai primary key
    public $incrementing = true; // auto increment
    protected $fillable = [
        'nama_mitra',
        'alamat',
        'email',
        'nomor_telepon',
        'jenis_kemitraan',
        'tanggal_bergabung',
    ];

    public function scopeFilter(Builder $query, $request, array $filterableColumns, array $searchableColumns): Builder
    {
        foreach ($filterableColumns as $column) {
            if ($request->filled($column)) {
                if ($column == 'nama_mitrai') {
                    $query->wherenama('nama_mitra', $request->nama);
                } else {
                    $query->where($column, $request->input($column));

                }
            }
        }
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $searchableColumns) {
                foreach ($searchableColumns as $column) {
                    $q->orWhere($column, 'LIKE', '%' . $request->input('search') . '%');
                }
            });
        }

        return $query;
    }
}
