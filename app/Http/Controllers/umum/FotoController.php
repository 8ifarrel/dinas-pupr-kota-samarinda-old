<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;

use App\Models\Foto;
use App\Models\Galeri;

class FotoController extends Controller
{
    public function index($slug) {
        $galeri = Galeri::whereSlug($slug)->first();
        $foto = Foto::where('id_album', $galeri->id)->get();

        return view('umum.pages.e-library.foto', [
            'foto' => $foto
        ]);
    }
}
