<?php

namespace App\Http\Controllers\epanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Pimpinan;
use App\Models\RiwayatPimpinan;

class EPanelPimpinanController extends Controller
{
    public function edit() {
        $riwayat_pimpinan = RiwayatPimpinan::latest()->first();
        $pimpinan = Pimpinan::latest()->first();

        return view('epanel.pages.pimpinan.edit', [
            'riwayat_pimpinan' => $riwayat_pimpinan,
            'pimpinan' => $pimpinan,
            'title' => "Pimpinan"
        ]);
    }

    public function update(Request $request) {
        $request->validate([
            'nama' => 'required|string',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
            'periode' => 'required|string',
            'mulai_jabatan' => 'required|string',
            'akhir_jabatan' => 'required|string',
            'quotes' => 'required|string',
            'sambutan' => 'required|string'
        ]);
    
        $riwayat_pimpinan = RiwayatPimpinan::findOrFail($request->uuid);
    
        $riwayat_pimpinan->nama = $request->input('nama');
        $riwayat_pimpinan->periode = $request->input('periode');
        $riwayat_pimpinan->mulai_jabatan = $request->input('mulai_jabatan');
        $riwayat_pimpinan->akhir_jabatan = $request->input('akhir_jabatan');
    
        if ($request->hasFile('foto')) {
            Storage::delete($riwayat_pimpinan->foto);
      
            $fotoPath = $request->file('foto')->store('Pimpinan/' . date('Y-m') . '/' . date('d') . '/' . $request->uuid);
            $riwayat_pimpinan->foto = $fotoPath;
        }
    
        $riwayat_pimpinan->save();
    
        $pimpinan = Pimpinan::findOrFail($request->pimpinan_id);
    
        $pimpinan->quotes = $request->input('quotes');
        $pimpinan->sambutan = $request->input('sambutan');
    
        $pimpinan->save();
    
        return redirect()->back()->with('success', 'Data riwayat pimpinan dan pimpinan berhasil diperbarui.');
    }    
}
