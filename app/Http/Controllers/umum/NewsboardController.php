<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgendaKegiatan;
// use App\Models\Foto;
use App\Models\Galeri;
use App\Models\Pegawai;
use Carbon\Carbon;


class NewsboardController extends Controller
{
    public function index()
    {
        $agenda_kegiatan = AgendaKegiatan::whereDate('tanggal', '2023-12-12')->latest()->get();
        $personil = Pegawai::get();
        $galeri = Galeri::latest()->get();

        return view('umum.pages.newsboard', [
            'agenda_kegiatan' => $agenda_kegiatan,
            'foto' => $galeri,
            'personil' => $personil
        ]);
    }
}
