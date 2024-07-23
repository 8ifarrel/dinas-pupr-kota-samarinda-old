<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanPimpinan extends Model
{
    use HasFactory;

    protected $table = 'kepala_pendidikan';

    protected $primaryKey = 'id';

	protected $fillable = [
		'label',
		'kepala_id'
	];

	public function kepala()
	{
		return $this->belongsTo('Pimpinan\Kepala', 'kepala_id');
	}
}
