<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\PPIDPelaksana;
use App\Models\KategoriPPIDPelaksana;
use Illuminate\Support\Facades\Storage;

class PPIDPelaksanaController extends Controller
{
    public function index($slug)
    {
        $kategori = KategoriPPIDPelaksana::whereSlug($slug)->first();
        $berkas = PPIDPelaksana::where('id_kategori', $kategori->id)->get();

        return view('umum.pages.ppid-pelaksana', [
            'title' => $kategori->label,
            'berkas' => $berkas
        ]);
    }

    public function __invoke($berkas)
    {
        $file = PPIDPelaksana::where('uuid', $berkas)->first();

        if (!$file) {
            abort(404);
        }    

        $path = Storage::path($file->file);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->download($path);
    }
}
