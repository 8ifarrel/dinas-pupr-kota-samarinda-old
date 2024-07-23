<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Berita;
use App\Models\Kategori;

class BeritaController extends Controller
{
  public function pilih()
  {
    $kategori = Kategori::firstWhere('slug', request('kategori'));
    $berita = Berita::with(['kategori'])->latest()->filter(request(['search', 'kategori']))->paginate(5)->withQueryString();

    return view('umum.pages.berita.pilih', [
      "title" => $kategori->label,
      "berita" => $berita
    ]);
  }

  public function lihat(Berita $berita)
  {
    $uuid = $berita->uuid;

    $berita = Berita::where('uuid', $uuid)->firstOrFail();

    $berita_lainnya = Berita::where('uuid', '!=', $uuid)
      ->latest()
      ->limit(4)
      ->get();

    return view('umum.pages.berita.lihat', [
      "title" => null,
      "berita" => $berita,
      'berita_lainnya' => $berita_lainnya,
    ]);
  }


  public function kategori()
  {
    return view('umum.pages.berita.kategori', [
      'kategori' => Kategori::withCount('berita')->latest()->get()
    ]);
  }
}
