<?php

namespace App\Http\Controllers\epanel;

use App\Http\Controllers\Controller;

use App\Models\Foto;
use App\Models\Galeri;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EPanelFotoController extends Controller
{
    public function display()
    {
      $galeri = Galeri::firstWhere('slug', request('galeri'));
      $foto = Foto::with(['galeri'])->whereHas('galeri', function ($query) use ($galeri) {
        $query->where('id', $galeri->id);
    })->latest()->get();
  
      return view('epanel.pages.foto.pilih', [
        "title" => $galeri->judul,
        "foto" => $foto
      ]);
    }

    public function create()
    {
      return view('epanel.pages.foto.create', [
        'title' => 'Tambah Foto'
      ]);
    }
  
    public function store(Request $request)
    {
      $request->validate([
        'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
      ]);
  
      $fotoPath = $request->file('foto')->store('Media/Galeri/' . date('Y-m') . '/' . date('d'));
  
      $foto = new Foto;
      $foto->foto = $fotoPath;
      $foto->uuid = Str::uuid(); 
    
      $galeriSlug = $request->query('galeri');
      $galeri = Galeri::where('slug', $galeriSlug)->first();
      if ($galeri) {
        $foto->id_album = $galeri->id;
      }
  
      $foto->save();
  
      return redirect()->route('epanel.galeri')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function destroy($uuid)
    {
      $foto = Foto::find($uuid);
  
      Storage::delete($foto->foto);
      $foto->delete();
  
      return redirect()->route('epanel.galeri')->with('success', 'berita berhasil dihapus.');
    }
}
