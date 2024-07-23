<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{

    use HasFactory;

	protected $table = 'feedback';

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

	public function scopeUuid($query, $uuid) {
		return $query->whereUuid($uuid);
	}
}