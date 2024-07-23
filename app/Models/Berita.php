<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Berita extends Model
{
	use HasFactory;

	protected $table = 'berita';

	protected $primaryKey = 'uuid';

	public $incrementing = false;

	protected $fillable = [
		'uuid',
		'foto',
		'sumber_foto',
		'judul',
		'slug',
		'preview',
		'isi',
		'sumber',
		'komentar',
		'headline',
		'view',
		'status',
		'id_operator',
		'id_kategori',
		'created_at'
	];

	public function scopeFilter($query, array $filters)
	{
		$query->when($filters['kategori'] ?? false, function ($query, $kategori) {
			return $query->whereHas('kategori', function ($query) use ($kategori) {
				$query->where('slug', $kategori);
			});
		});

		$query->when($filters['search'] ?? false, function ($query, $search) {
			return $query->where('judul', 'like', '%' . $search . '%');
		});
	}

	public function getFormattedTanggalAttribute()
	{
		return $this->created_at->format('d F Y');
	}

	public function getFormattedJudulAttribute()
	{
		return Str::limit(strip_tags($this->judul), 75, $end = ' ...');
	}


	public function kategori()
	{
		return $this->belongsTo(Kategori::class, 'id_kategori');
	}

	public function scopeUuid($query, $uuid)
	{
		return $query->whereUuid($uuid);
	}
}
