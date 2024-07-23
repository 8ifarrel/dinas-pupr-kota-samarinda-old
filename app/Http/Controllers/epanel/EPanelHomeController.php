<?php

namespace App\Http\Controllers\epanel;

use App\Http\Controllers\Controller;

use App\Models\Berita;
use App\Models\AgendaKegiatan;
use App\Models\Feedback;
use App\Models\Pengumuman;
use Carbon\Carbon;

class EPanelHomeController extends Controller
{
    public function index() 
    {   
        // Tanggal pada minggu ini
        $tanggal_awal_minggu_ini = Carbon::now()->startOfWeek(); 
        $tanggal_akhir_minggu_ini = Carbon::now()->endOfWeek();

        // Berita
        $banyak_berita_minggu_ini = Berita::whereBetween('created_at', [$tanggal_awal_minggu_ini, $tanggal_akhir_minggu_ini])->count();
        $banyak_berita_keseluruhan = Berita::count();

        // Agenda Kegiatan
        $banyak_agenda_kegiatan_minggu_ini = AgendaKegiatan::whereBetween('created_at', [$tanggal_awal_minggu_ini, $tanggal_akhir_minggu_ini])->count();
        $banyak_agenda_kegiatan_keseluruhan = AgendaKegiatan::count();

        // Pengumuman
        $banyak_pengumuman_minggu_ini = Pengumuman::whereBetween('created_at', [$tanggal_awal_minggu_ini, $tanggal_akhir_minggu_ini])->count();
        $banyak_pengumuman_keseluruhan = Pengumuman::count();

        // Feedback
        $banyak_feedback_minggu_ini = Feedback::whereBetween('created_at', [$tanggal_awal_minggu_ini, $tanggal_akhir_minggu_ini])->count();
        $banyak_feedback_keseluruhan = Feedback::count();

        return view('epanel.pages.home', [
            'title' => 'Beranda',
            'banyak_berita_minggu_ini' => $banyak_berita_minggu_ini,
            'banyak_berita_keseluruhan' => $banyak_berita_keseluruhan,
            'banyak_agenda_kegiatan_minggu_ini' => $banyak_agenda_kegiatan_minggu_ini,
            'banyak_agenda_kegiatan_keseluruhan' => $banyak_agenda_kegiatan_keseluruhan,
            'banyak_feedback_minggu_ini' => $banyak_feedback_minggu_ini,
            'banyak_feedback_keseluruhan' => $banyak_feedback_keseluruhan,
            'banyak_pengumuman_minggu_ini' => $banyak_pengumuman_minggu_ini,
            'banyak_pengumuman_keseluruhan' => $banyak_pengumuman_keseluruhan,
        ]);
    }
}
