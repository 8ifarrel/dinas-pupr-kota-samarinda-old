<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pegawai;
class Bidang extends Model

{
    use HasFactory;

    protected $table = 'bidang';

    // protected $primaryKey = 'uuid';

	// public $incrementing = false;

	protected $fillable = [
		'uuid', 
		'label', 
		'slug', 
		'jabatan', 
        'status_layanan', 
		'tupoksi', 
		'id_parent',
        'uptd', 
        'sotk', 
        'file_sotk'
	];

	public function bidang() {
        return $this->hasMany(Pegawai::class, 'id_bidang');
    }

    public function pegawai() {
        return $this->hasOne(Pegawai::class, 'id_bidang');
    }

    public function jabatan() {
        return $this->hasMany(Pegawai::class, 'id_jabatan');
    }

    public function bParent() {
        return $this->belongsTo(Bidang::class, 'id_parent');
    }

    public function hParent() {
        return $this->hasMany(Bidang::class, 'id_parent');
    }

}
