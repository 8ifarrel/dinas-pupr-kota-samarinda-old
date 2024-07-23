<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AgendaKegiatan extends Model
{
    use HasFactory;

    protected $table = 'agenda_kegiatan';

    protected $primaryKey = 'uuid';

	public $incrementing = false;

    protected $fillable = [
        'uuid',
        'nama',
        'waktu',
        'tempat',
        'dihadiri_oleh',
        'tanggal'
    ];

    public function getFormattedDihadiriOlehAttribute()
    {
        return Str::limit(strip_tags($this->dihadiri_oleh), 50, $end = ' ...');
    }

    public function scopeUuid($query, $uuid)
    {
        return $query->whereUuid($uuid);
    }
}
