<?php

namespace App\Http\Controllers\epanel;

use App\Http\Controllers\Controller;
use App\Models\Tautan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EPanelTautanController extends Controller
{
    public function index()
    {
        $tautan = Tautan::all();

        return view('epanel.pages.tautan.index', [
            'title' => 'Tautan',
            'tautan' => $tautan
        ]);
    }

    public function create() {
        return view('epanel.pages.tautan.create', [
            'title' => 'Tambah Tautan'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'label' => 'required',
            'url' => 'required',
        ]);

        $fotoPath = $request->file('banner')->store('Tautan/' . date('Y-m') . '/' . date('d') . $request->uuid);
        $tautan = new Tautan;
        $tautan->banner = $fotoPath;
        $tautan->label = $request->label;
        $tautan->url = $request->url;
        $tautan->uuid = Str::uuid();
        $tautan->save();

        return redirect()->route('epanel.tautan.index')->with('success', 'pantek berhasil ditambahkan.');
    }

    public function edit($uuid)
    {
        $tautan = Tautan::find($uuid);

        return view('epanel.pages.tautan.edit', [
            'title' => 'Ubah Tautan',
            'tautan' =>  $tautan
        ]);
    }

    public function update(Request $request, $uuid)
    {
        $request->validate([
            'label' => 'required',
            'url' => 'required',
        ]);

        $tautan = Tautan::find($uuid);
        $tautan->label = $request->label;
        $tautan->url = $request->url;

        if ($request->hasFile('banner')) {
            Storage::delete($tautan->banner);
            $fotoPath = $request->file('banner')->store('Tautan/' . date('Y-m') . '/' . date('d') . '/' . $request->uuid);
            $tautan->banner = $fotoPath;
        }

        $tautan->save();

        return redirect()->route('epanel.tautan.index')->with('success', 'yayaya berhasil diperbarui.');
    }

    public function destroy($uuid)
    {
        $tautan = Tautan::find($uuid);
        
        Storage::delete($tautan->banner);
        $tautan->delete();

        return redirect()->route('epanel.tautan.index')->with('success', 'Tau berhasil dihapus.');
    }
}