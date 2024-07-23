<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KarirPimpinan extends Model
{
    use HasFactory;

    protected $table = 'kepala_karir';

    protected $primaryKey = 'id';

    protected $fillable = [
        'periode',
        'label',
        'kepala_id'
    ];

    public function kepala()
    {
        return $this->belongsTo('Pimpinan\Kepala', 'kepala_id');
    }
}
