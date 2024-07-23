<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PPIDPelaksana;

class KategoriPPIDPelaksana extends Model
{
    use HasFactory;

    protected $table = 'unduhan_kategori';

	protected $fillable = [
		'uuid', 
		'label', 
		'slug', 
		'hit', 
		'segmen'
	];

	public function scopeUuid($query, $uuid) {
        return $query->whereUuid($uuid);
    }

	public function unduhan() {
        return $this->hasMany(PPIDPelaksana::class, 'id_kategori');
    }
}
