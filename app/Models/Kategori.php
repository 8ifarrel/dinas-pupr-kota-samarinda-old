<?php

namespace App\Models;

use App\Models\Berita;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'berita_kategori';

	protected $fillable = [
		'uuid', 
		'label', 
		'slug', 
		'hit'
	];

	public function scopeUuid($query, $uuid)
    {
        return $query->whereUuid($uuid);
    }

	public function berita()
    {
        return $this->hasMany(Berita::class, 'id_kategori');
    }

    public function countBerita()
    {
        return $this->berita()->count();
    }
}