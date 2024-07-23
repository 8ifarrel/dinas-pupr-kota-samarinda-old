<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;

use App\Models\Berita;
use App\Models\AgendaKegiatan;
use App\Models\Tautan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
  public $selectedDate;

  public function index()
  {
    // Agenda kegiatan
    $agenda_kegiatan = AgendaKegiatan::latest()->get();

    // Berita
    $berita = Berita::with(['kategori'])->latest()->take(6)->get();

    $berita->each(function ($item) {
      $item->tanggal = $item->formatted_tanggal;
      $item->judul = $item->formatted_judul;
    });

    // Agenda Kegiatan
    $agenda_kegiatan->each(function ($item) {
      $item->dihadiri_oleh = $item->formatted_dihadiri_oleh;
    });

    // Tautan
    $tautan = Tautan::latest()->select('banner', 'url')->get();

    // Statistik Pengunjung
    $statistik_pengunjung = DB::table('statistik_pengunjung')->first();

    // Return
    return view('umum.pages.home', [
      'berita' => $berita,
      'agenda_kegiatan' => $agenda_kegiatan,
      'tautan' => $tautan,
      'statistik_pengunjung' => $statistik_pengunjung
    ]);
  }

  public function show(Berita $berita)
  {
    return view('umum.pages.berita.lihat', [
      "title" => null,
      "berita" => $berita
    ]);
  }
}
