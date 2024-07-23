<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Bidang;
use App\Models\StrukturOrganisasi;

class Pegawai extends Model
{
	use HasFactory;

	protected $table = 'personil';

	protected $primaryKey = 'uuid';

	public $incrementing = false;

	protected $fillable = [
		'uuid',
		'foto',
		'nama',
		'nip',
		'telepon',
		'email',
		'alamat',
		'tupoksi',
		'username',
		'password',
		'plain',
		'apes_akses',
		'apes_status',
		'golongan',
		'id_bidang',
		'id_jabatan'
	];

	public function bidang()
	{
		return $this->belongsTo(StrukturOrganisasi::class, 'id_bidang');
	}

	public function jabatan()
	{
		return $this->belongsTo(Bidang::class, 'id_jabatan');
	}
}
