<?php

namespace App\Http\Controllers\epanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Galeri;

class EPanelGaleriController extends Controller
{
	public function display()
	{
		$galeri = Galeri::withCount('foto')->latest()->get();

		return view('epanel.pages.galeri.galeri', [
			'title' => 'Galeri',
			'galeri' => $galeri
		]);
	}

	public function create()
	{
		return view('epanel.pages.galeri.create', [
			'title' => 'Tambah Galeri'
		]);
	}

	public function store(Request $request)
	{
		$request->validate([
			'judul' => 'required|string|max:255',
		]);

		$uuid = Str::uuid();

		$slug = Str::slug($request->judul);

		$galeri = new Galeri();
		$galeri->uuid = $uuid;
		$galeri->judul = $request->judul;
		$galeri->slug = $slug;
		$galeri->save();

		return redirect()->route('epanel.galeri')->with('success', 'Galeri berhasil ditambahkan.');
	}

	public function edit($uuid)
	{
		$galeri = Galeri::where('uuid', $uuid)->first();

		return view('epanel.pages.galeri.edit', [
			'galeri' => $galeri,
			'title' => "Edit Galeri"
		]);
	}

	public function update(Request $request, $uuid)
	{
		$request->validate([
			'judul' => 'required|string|max:255',
		]);

		$galeri = Galeri::findOrFail($uuid);
		$galeri->judul = $request->judul;
		$galeri->save();

		return redirect()->route('epanel.galeri')->with('success', 'Galeri berhasil diperbarui.');
	}

	public function destroy($uuid)
	{
		$galeri = Galeri::where('uuid', $uuid)->firstOrFail();
		$galeri->delete();

		return redirect()->route('epanel.galeri')->with('success', 'Galeri berhasil dihapus.');
	}
}
