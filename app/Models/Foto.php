<?php

namespace App\Models;

use App\Models\Galeri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
	use HasFactory;

	protected $table = 'media_galeri';
	
	protected $primaryKey = 'uuid';

	public $incrementing = false;

	protected $fillable = [
		'uuid',
		'caption',
		'foto',
		'url_video',
		'jenis',
		'id_operator',
		'id_album'
	];

	public function scopeUuid($query, $uuid)
	{
		return $query->whereUuid($uuid);
	}

	public function galeri()
	{
		return $this->belongsTo(Galeri::class, 'id_album');
	}
}
