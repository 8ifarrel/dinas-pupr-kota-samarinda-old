<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Pengumuman;

class PengumumanController extends Controller
{
    public function index() {
        $pengumuman = Pengumuman::latest()->get();

        return view('umum.pages.pengumuman', [
            'title' => "Pengumuman",
            'pengumuman' => $pengumuman
        ]);
    }
}
