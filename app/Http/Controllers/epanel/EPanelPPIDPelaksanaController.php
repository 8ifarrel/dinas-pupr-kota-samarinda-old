<?php

namespace App\Http\Controllers\epanel;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\KategoriPPIDPelaksana;
use App\Models\PPIDPelaksana;


class EPanelPPIDPelaksanaController extends Controller
{
  public function kategori()
  {
    $kategori_ppid_pelaksana = KategoriPPIDPelaksana::latest()->get();

    return view('epanel.pages.ppid-pelaksana.kategori', [
      'title' => "Kategori PPID Pelaksana",
      'kategori_ppid_pelaksana' => $kategori_ppid_pelaksana
    ]);
  }

  public function pilih()
  {
    $kategori = KategoriPPIDPelaksana::firstWhere('slug', request('kategori'));
    
    $berkas = PPIDPelaksana::with(['kategori'])->whereHas('kategori', function ($query) use ($kategori) {
        $query->where('id', $kategori->id);
    })->latest()->get();

    return view('epanel.pages.ppid-pelaksana.pilih', [
      "title" => $kategori->label,
      "berkas" => $berkas
    ]);
  }

  public function create()
  {
    
    return view('epanel.pages.ppid-pelaksana.create', [
      'title' => 'Tambah PPID Pelaksan'
    ]);
  }

  public function store(Request $request)
  {
    $request->validate([
      'file' => 'required|mimes:pdf',
      'judul' => 'required',
    ]);

    $filePath = $request->file('file')->store('Unduhan/' . date('Y-m') . '/' . date('d'));

    $unduhan = new PPIDPelaksana;
    $unduhan->file = $filePath;
    $unduhan->judul = $request->judul;
    $unduhan->slug = Str::slug($request->judul);
    $unduhan->uuid = Str::uuid();

    $kategoriSlug = $request->query('kategori');
    $kategori = KategoriPPIDPelaksana::where('slug', $kategoriSlug)->first();
    if ($kategori) {
      $unduhan->id_kategori = $kategori->id;
    }

    $unduhan->save();

    return redirect()->route('epanel.ppid-pelaksana.kategori')->with('success', 'Berkas berhasil ditambahkan.');
  }

  public function edit($uuid)
  {
    $berkas = PPIDPelaksana::find($uuid);

    return view('epanel.pages.ppid-pelaksana.edit', [
      'title' => 'Ubah PPID Pelaksana',
      'berkas' =>  $berkas
    ]);
  }

  public function update(Request $request, $uuid)
  {
    $request->validate([
      'file' => 'required|mimes:pdf',
      'judul' => 'required',
    ]);

    $unduhan = PPIDPelaksana::find($uuid);
    $unduhan->judul = $request->judul;
    $unduhan->slug = Str::slug($request->judul);

    if ($request->hasFile('file')) {
      Storage::delete($unduhan->file);

      $filePath = $request->file('file')->store('Unduhan/' . date('Y-m') . '/' . date('d') . '/' . $request->uuid);
      $unduhan->file = $filePath;
    }

    $unduhan->save();

    return redirect()->route('epanel.ppid-pelaksana.kategori')->with('success', 'Berkas berhasil diperbarui.');
  }

  public function destroy($uuid)
  {
    $berkas = PPIDPelaksana::find($uuid);

    Storage::delete($berkas->file);
    $berkas->delete();

    return redirect()->route('epanel.ppid-pelaksana.kategori')->with('success', 'Berkas berhasil dihapus.');
  }
}
