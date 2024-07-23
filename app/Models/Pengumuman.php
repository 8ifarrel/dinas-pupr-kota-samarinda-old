<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
	use HasFactory;

	protected $table = 'pengumuman';

	protected $primaryKey = 'uuid';

	public $incrementing = false;

	protected $fillable = [
		'uuid',
		'judul',
		'slug',
		'waktu',
		'perihal',
		'lampiran',
		'komentar',
		'view'
	];

	public function scopeUuid($query, $uuid)
	{
		return $query->whereUuid($uuid);
	}
}
