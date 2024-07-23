<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'struktur_organisasi';

    protected $fillable = [
        'uuid',
        'label',
        'slug',
        'icon',
        'jabatan',
        'status_layanan',
        'tupoksi',
        'id_parent',
        'uptd',
        'sotk',
        'file_sotk',
        'created_at',
        'updated_at'
    ];
}
