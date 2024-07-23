<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Bidang;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BidangController extends Controller
{
    public function index(Request $request, $namaBidang) {
        // Berita
        $bidang = Bidang::where('slug', $namaBidang)->firstOrFail();

        $berita = Berita::whereHas('kategori', function ($query) use ($bidang) {
            $query->where('slug', $bidang->slug);
        })->with(['kategori'])->latest()->take(6)->get();

        foreach ($berita as $item) {
            $item->tanggal = $item->created_at->format('d F Y');
            $item->judul = Str::limit(strip_tags($item->judul), 75, $end = ' ...');
        }

        // Return
        return view("umum.pages.bidang", [
            "bidang" => $bidang,
            "berita" => $berita,
            "slugBidang" => $namaBidang
        ]);
    }

    // Download tupoksi
    public function __invoke($berkas)
    {
        $file = Bidang::where('slug', $berkas)->first();

        if (!$file) {
            abort(404);
        }    

        $path = 'storage/' . $file->tupoksi . '.pdf';

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->download($path);
    }
}
