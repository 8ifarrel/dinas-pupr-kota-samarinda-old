<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
	use HasFactory;

	protected $table = 'slider';

	protected $primaryKey = 'uuid';

	public $incrementing = false;
	
	protected $fillable = [
		'foto',
		'judul',
		'keterangan',
	];

	public function scopeUuid($query, $uuid)
	{
		return $query->whereUuid($uuid);
	}
}
