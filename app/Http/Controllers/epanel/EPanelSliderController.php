<?php

namespace App\Http\Controllers\epanel;

use App\Http\Controllers\Controller;

use App\Models\Slider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EPanelSliderController extends Controller
{
    public function index()
    {
        $slider = Slider::all();

        return view('epanel.pages.slider.index', [
            'title' => 'Slider',
            'slider' => $slider
        ]);
    }

    public function edit($uuid)
    {
        $slider = Slider::find($uuid);

        return view('epanel.pages.slider.edit', [
            'title' => 'Ubah Slider',
            'slider' =>  $slider
        ]);
    }

    public function create() {
        return view('epanel.pages.slider.create', [
            'title' => 'Tambah Slider'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:3072',
            'judul' => 'required',
            'keterangan' => 'required',
        ]);

        $fotoPath = $request->file('foto')->store('Slider/' . date('Y-m') . '/' . date('d') . $request->uuid);
        $slider = new Slider;
        $slider->foto = $fotoPath;
        $slider->judul = $request->judul;
        $slider->keterangan = $request->keterangan;
        $slider->uuid = Str::uuid();
        $slider->save();

        return redirect()->route('epanel.slider.index')->with('success', 'Slider berhasil ditambahkan.');
    }

    public function update(Request $request, $uuid)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
        ]);

        $slider = Slider::find($uuid);
        $slider->judul = $request->judul;
        $slider->keterangan = $request->keterangan;

        if ($request->hasFile('foto')) {
            Storage::delete($slider->foto);
            $fotoPath = $request->file('foto')->store('Slider/' . date('Y-m') . '/' . date('d') . '/' . $request->uuid);
            $slider->foto = $fotoPath;
        }

        $slider->save();

        return redirect()->route('epanel.slider.index')->with('success', 'Slider berhasil diperbarui.');
    }

    public function destroy($uuid)
    {
        $slider = Slider::find($uuid);
        
        Storage::delete($slider->foto);
        $slider->delete();

        return redirect()->route('epanel.slider.index')->with('success', 'Slider berhasil dihapus.');
    }
}
