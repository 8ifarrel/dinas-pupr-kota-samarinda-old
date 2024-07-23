<?php

namespace App\Models;

use App\Models\Foto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'media_album';

	protected $fillable = [
		'uuid', 
		'judul', 
		'slug', 
		'view', 
		'komentar', 
		'status'
	];

	public function scopeUuid($query, $uuid) {
        return $query->whereUuid($uuid);
    }

	public function foto() {
        return $this->hasMany(Foto::class, 'id_album');
    }

	public function countFoto()
	{
			return $this->foto()->count();
	}
}
