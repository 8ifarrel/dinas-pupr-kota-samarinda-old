<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tautan extends Model
{
  use HasFactory;

  protected $table = 'tautan';

	protected $primaryKey = 'uuid';

	public $incrementing = false;

	protected $fillable = [
		'banner', 
		'label', 
		'url'
	];

	public function scopeUuid($query, $uuid) {
		return $query->whereUuid($uuid);
	}
}