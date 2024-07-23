<?php

namespace App\Http\Controllers\epanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Pegawai;
use App\Models\Bidang;
use App\Models\StrukturOrganisasi;

class EPanelPegawaiController extends Controller
{
	public function index()
	{
		$pegawai = Pegawai::latest()->get();

		return view('epanel.pages.pegawai.index', [
			'pegawai' => $pegawai,
			'title' => 'Pegawai'
		]);
	}

	public function create()
	{
		$bidangList = Bidang::all();
		return view('epanel.pages.pegawai.create', [
			'bidangList' => $bidangList,
			'title' => 'Tambah Pegawai'
		]);
	}

	public function store(Request $request)
	{
		$request->validate([
			'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
			'nip' => 'required|string|max:255',
			'nama' => 'required|string|max:255',
			'telepon' => 'required|string|max:255',
			'email' => 'required|string|max:255',
			'alamat' => 'required|string|max:255',
			'tupoksi' => 'required|string|max:255',
			'golongan' => 'required|string|max:255',
			'id_bidang' => 'required|exists:App\Models\Bidang,id',
		]);

		$pegawai = new Pegawai();
		$pegawai->nip = $request->nip;
		$pegawai->nama = $request->nama;
		$pegawai->telepon = $request->telepon;
		$pegawai->email = $request->email;
		$pegawai->alamat = $request->alamat;
		$pegawai->tupoksi = $request->tupoksi;
		$pegawai->golongan = $request->golongan;
		$pegawai->id_bidang = $request->id_bidang;
		$pegawai->uuid = Str::uuid(); 

		if ($request->hasFile('foto')) {
			$path = $request->file('foto')->store('Personil/' . date('Y-m-d') . '/' . $request->nip);
			$pegawai->foto = $path;
		}

		$pegawai->save();

		return redirect()->route('epanel.pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan.');
	}

	public function edit($uuid)
	{
		$pegawai = Pegawai::with('bidang')->where('uuid', $uuid)->firstOrFail();

		$bidangList = StrukturOrganisasi::all();

		return view('epanel.pages.pegawai.edit', [
			'pegawai' => $pegawai,
			'bidangList' => $bidangList,
			'title' => 'Edit Pegawai'
		]);
	}

	public function update(Request $request, $uuid)
	{
		$request->validate([
			'nip' => 'required|string|max:255',
			'nama' => 'required|string|max:255',
			'telepon' => 'required|string|max:255',
			'email' => 'required|string|max:255',
			'alamat' => 'required|string|max:255',
			'tupoksi' => 'required|string|max:255',
			'golongan' => 'required|string|max:255',
			'id_bidang' => 'required|exists:App\Models\Bidang,id',
			'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);

		$pegawai = Pegawai::where('uuid', $uuid)->firstOrFail();
		$pegawai->nip = $request->nip;
		$pegawai->nama = $request->nama;
		$pegawai->telepon = $request->telepon;
		$pegawai->email = $request->email;
		$pegawai->alamat = $request->alamat;
		$pegawai->tupoksi = $request->tupoksi;
		$pegawai->golongan = $request->golongan;
		$pegawai->id_bidang = $request->id_bidang;

		if ($request->hasFile('foto')) {
			if ($pegawai->foto) {
				Storage::delete($pegawai->foto);
			}

			$path = $request->file('foto')->store('Personil/' . date('Y-m-d') . '/' . $pegawai->nip);
			$pegawai->foto = $path;
		}

		$pegawai->save();

		return redirect()->route('epanel.pegawai.index')->with('success', 'Data pegawai berhasil diperbarui.');
	}

	public function destroy($uuid)
	{
		$pegawai = Pegawai::where('uuid', $uuid)->firstOrFail();

		if ($pegawai->foto) {
			Storage::delete($pegawai->foto);
		}

		$pegawai->delete();

		return redirect()->route('epanel.pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
	}
}
