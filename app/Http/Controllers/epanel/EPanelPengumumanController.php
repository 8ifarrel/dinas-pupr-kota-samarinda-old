<?php

namespace App\Http\Controllers\epanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Pengumuman;

class EPanelPengumumanController extends Controller
{
	public function index()
	{
		$pengumuman = Pengumuman::latest()->get();

		return view('epanel.pages.pengumuman.index', [
			'title' => "Pengumuman",
			'pengumuman' => $pengumuman
		]);
	}

	public function create()
	{
		return view('epanel.pages.pengumuman.create', [
			'title' => 'Tambah Pengumuman'
		]);
	}

	public function store(Request $request)
	{
			$request->validate([
					'judul' => 'required',
					'perihal' => 'required',
					'lampiran' => 'nullable|file|mimes:pdf|max:10240',
			]);
	
			$uuid = Str::uuid();
	
			$slug = Str::slug($request->judul);
	
			$lampiranPath = null;
			if ($request->hasFile('lampiran')) {
					$lampiranPath = $request->file('lampiran')->storeAs('Pengumuman/' . $slug, $request->file('lampiran')->getClientOriginalName());
			}
	
			$pengumuman = new Pengumuman();
			$pengumuman->uuid = $uuid;
			$pengumuman->judul = $request->judul;
			$pengumuman->slug = $slug;
			$pengumuman->perihal = $request->perihal;
			$pengumuman->lampiran = $lampiranPath;
	
			$pengumuman->save();
	
			return redirect()->route('epanel.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan.');
	}

	public function edit($uuid)
	{
		$pengumuman = Pengumuman::where('uuid', $uuid)->firstOrFail();

		return view('epanel.pages.pengumuman.edit', [
			'title' => 'Ubah Pengumuman',
			'pengumuman' =>  $pengumuman
		]);
	}

	public function update(Request $request, $uuid)
	{
			$pengumuman = Pengumuman::where('uuid', $uuid)->firstOrFail();
	
			$request->validate([
					'judul' => 'required',
					'perihal' => 'required',
					'lampiran' => 'nullable|file|mimes:pdf|max:4096',
			]);
	
			$slug = Str::slug($request->judul);
	
			if ($request->hasFile('lampiran')) {
					$lampiranPath = $request->file('lampiran')->storeAs('Pengumuman/' . $slug, $request->file('lampiran')->getClientOriginalName());
					$pengumuman->lampiran = $lampiranPath;
			}
	
			$pengumuman->judul = $request->judul;
			$pengumuman->slug = $slug;
			$pengumuman->perihal = $request->perihal;
			$pengumuman->save();
	
			return redirect()->route('epanel.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui.');
	}

	public function destroy($uuid)
	{
		$pengumuman = Pengumuman::where('uuid', $uuid)->firstOrFail();
		$pengumuman->delete();

		return redirect()->route('epanel.pengumuman.index')->with('success', 'Pengumuman berhasil dihapus.');
	}
}
