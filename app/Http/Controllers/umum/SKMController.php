<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\SKM;

class SKMController extends Controller
{
    public function index()
    {
        $skm = SKM::latest()->get();
        $rerata = round($skm->avg('nilai'), 3);

        return view('umum.pages.skm', [
            'skm' => $skm,
            'rerata' => $rerata
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nilai' => 'required|integer|between:1,4'
        ]);

        SKM::create([
            'nilai' => $request->nilai,
            'created_at' => now()
        ]);

        return redirect('/skm')->with('berhasil', 'Survei berhasil dikirim.');
    }
}
