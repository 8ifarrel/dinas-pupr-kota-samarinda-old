<?php

namespace App\Http\Controllers\epanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\StrukturOgranisasi;

class EPanelBidangController extends Controller
{
	public function index()
	{
		$bidang = StrukturOgranisasi::get();

		return view('epanel.pages.bidang.	index', [
			'bidang' => $bidang,
			'title' => 'Bidang'
		]);
	}

	public function create()
	{
		$bidang =  StrukturOgranisasi::latest()->get();
		return view('epanel.pages.bidang.create', [
			'bidang' => $bidang,
			'title' => 'Tambah Bidang'
		]);
	}

	public function store(Request $request)
	{
		$request->validate([
			'label' => 'required',
			'jabatan' => 'required',
			'id_parent' => 'required',
			'tupoksi' => 'required',
		]);

		$bidang = new StrukturOgranisasi();
		$bidang->uuid = Str::uuid();
		$bidang->label = $request->label;
		$bidang->slug = Str::slug($request->label);
		$bidang->jabatan = $request->jabatan;
		$bidang->id_parent = $request->id_parent;
		$bidang->tupoksi = $request->tupoksi;
		$bidang->save();

		return redirect()->route('epanel.bidang.index')->with('success', 'Bidang berhasil ditambahkan.');
	}

	public function edit($uuid)
	{
		$bidang = StrukturOgranisasi::where('uuid', $uuid)->first();

		if (!$bidang) {
			return redirect()->route('epanel.bidang.index')->with('error', 'Bidang tidak ditemukan.');
		}

		$bidangList = StrukturOgranisasi::all();

		return view('epanel.pages.bidang.edit', [
			'bidang' => $bidang,
			'bidangList' => $bidangList,
			'title' => 'Edit Bidang'
		]);
	}

	public function update(Request $request, $uuid)
	{
		$request->validate([
			'label' => 'required',
			'jabatan' => 'required',
			'id_parent' => 'required',
			'tupoksi' => 'required',
		]);

		$bidang = StrukturOgranisasi::where('uuid', $uuid)->first();

		if (!$bidang) {
			return redirect()->route('epanel.bidang.index')->with('error', 'Bidang tidak ditemukan.');
		}

		$bidang->label = $request->label;
		$bidang->jabatan = $request->jabatan;
		$bidang->id_parent = $request->id_parent;
		$bidang->tupoksi = $request->tupoksi;
		$bidang->save();

		return redirect()->route('epanel.bidang.index')->with('success', 'Bidang berhasil diperbarui.');
	}


	public function destroy($uuid)
	{
		$bidang = StrukturOgranisasi::where('uuid', $uuid)->first();

		if (!$bidang) {
			return redirect()->route('epanel.bidang.index')->with('error', 'Bidang tidak ditemukan.');
		}

		$bidang->delete();

		return redirect()->route('epanel.bidang.index')->with('success', 'Bidang berhasil dihapus.');
	}
}
