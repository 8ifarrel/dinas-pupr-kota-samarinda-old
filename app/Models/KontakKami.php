<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakKami extends Model
{
	use HasFactory;

	protected $table = 'feedback';

	protected $primaryKey = 'uuid';

	public $incrementing = false;

	protected $fillable = [
		'uuid',
		'nama',
		'email',
		'telepon',
		'isi',
		'jawaban',
		'oleh',
		'status'
	];

	public function scopeUuid($query, $uuid)
	{
		return $query->whereUuid($uuid);
	}
}
