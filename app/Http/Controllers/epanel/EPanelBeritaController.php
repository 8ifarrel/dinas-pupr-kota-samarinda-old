<?php

namespace App\Http\Controllers\epanel;

use App\Http\Controllers\Controller;

use App\Models\Berita;
use App\Models\Kategori;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EPanelBeritaController extends Controller
{
  public function kategori()
  {
    $kategori_berita = Kategori::withCount('berita')->latest()->get();

    return view('epanel.pages.berita.kategori', [
      'title' => "Kategori Berita",
      'kategori_berita' => $kategori_berita
    ]);
  }

  public function pilih()
  {
    $kategori = Kategori::firstWhere('slug', request('kategori'));
    $berita = Berita::with(['kategori'])->whereHas('kategori', function ($query) use ($kategori) {
      $query->where('id', $kategori->id);
    })->latest()->get();

    return view('epanel.pages.berita.pilih', [
      "namaKategori" => $kategori->label,
      "berita" => $berita
    ]);
  }

  public function create()
  {
    $kategori = Kategori::firstWhere('slug', request('kategori'));

    return view('epanel.pages.berita.create', [
      'namaKategori' => $kategori->label
    ]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
      'judul' => 'required',
      'preview' => 'required',
      'isi' => 'required',
    ]);

    $createdAt = $request->input('created_at', now());

    $fotoPath = $request->file('foto')->store('Berita/' . date('Y-m') . '/' . date('d'));

    $berita = new Berita;
    $berita->foto = $fotoPath;
    $berita->judul = $request->judul;
    $berita->slug = Str::slug($request->judul);
    $berita->preview = $request->preview;
    $berita->isi = $request->isi;
    $berita->uuid = Str::uuid();
    $berita->created_at = $createdAt;

    $kategoriSlug = $request->query('kategori');
    $kategori = Kategori::where('slug', $kategoriSlug)->first();
    if ($kategori) {
      $berita->id_kategori = $kategori->id;
    }

    $berita->save();

    return redirect()->route('epanel.berita.kategori')->with('success', 'Berita berhasil ditambahkan.');
  }

  public function edit($uuid)
  {
    $berita = berita::find($uuid);

    return view('epanel.pages.berita.edit', [
      'title' => 'Ubah berita',
      'berita' =>  $berita
    ]);
  }

  public function update(Request $request, $uuid)
  {
    $request->validate([
      'judul' => 'required',
      'preview' => 'required',
      'isi' => 'required',
    ]);

    $berita = Berita::find($uuid);
    $berita->judul = $request->judul;
    $berita->slug = Str::slug($request->judul);
    $berita->preview = $request->preview;
    $berita->isi = $request->isi;

    if ($request->hasFile('foto')) {
      Storage::delete($berita->foto);

      $fotoPath = $request->file('foto')->store('Berita/' . date('Y-m') . '/' . date('d') . '/' . $request->uuid);
      $berita->foto = $fotoPath;
    }

    $berita->save();

    return redirect()->route('epanel.berita.kategori')->with('success', 'Berita berhasil diperbarui.');
  }

  public function destroy($uuid)
  {
    $berita = Berita::find($uuid);

    Storage::delete($berita->foto);
    $berita->delete();

    return redirect()->route('epanel.berita.kategori')->with('success', 'berita berhasil dihapus.');
  }
}
