<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SKM extends Model
{
    use HasFactory;

    protected $table = 'skm';

    protected $fillable = [
        'nilai',
        'created_at',
        'updated_at'
    ];
}
