<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Foto;

class GaleriController extends Controller
{
    public function index() {
        $galeri = Galeri::withCount('foto')->latest()->get();

        return view('umum.pages.e-library.galeri', [
            'galeri' => $galeri,
        ]);
    }
}
