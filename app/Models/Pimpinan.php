<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pimpinan extends Model
{
    use HasFactory;

    protected $table = 'kepala';

    protected $primaryKey = 'id';

	protected $fillable = [
		'background', 
		'nama', 
		'quotes', 
		'sambutan', 
		'active',
		'riwayat_pimpinan_id'
	];

	public function riwayat() {
		return $this->belongsTo('Pimpinan\Riwayat', 'riwayat_pimpinan_id');
	}

	public function karir() {
		return $this->hasMany('Pimpinan\Karir', 'kepala_id');
	}

	public function pendidikan() {
		return $this->hasMany('Pimpinan\Pendidikan', 'kepala_id');
	}
}
