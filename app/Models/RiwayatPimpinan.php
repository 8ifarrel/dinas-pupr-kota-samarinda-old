<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPimpinan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pimpinan';

    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $fillable = [
        'uuid',
        'foto',
        'nama',
        'periode',
        'mulai_jabatan',
        'akhir_jabatan',
        'profile',
        'order'
    ];

    public function scopeUuid($query, $uuid)
    {
        return $query->whereUuid($uuid);
    }

    public function kepala()
    {
        return $this->hasOne('Pimpinan\Kepala', 'riwayat_pimpinan_id');
    }
}
