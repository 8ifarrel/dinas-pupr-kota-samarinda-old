<?php

namespace App\Http\Controllers\epanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\AgendaKegiatan;

class EPanelAgendaKegiatanController extends Controller
{
	public function index()
	{
		$agendaKegiatan = AgendaKegiatan::latest()->get();

		return view('epanel.pages.agenda-kegiatan.index', [
			'agendaKegiatan' => $agendaKegiatan,
			'title' => 'Agenda Kegiatan'
		]);
	}
	public function create()
	{
		return view('epanel.pages.agenda-kegiatan.create', [
			'title' => 'Tambah Agenda Kegiatan'
		]);
	}

	public function store(Request $request)
	{
		$request->validate([
			'nama' => 'required',
			'waktu' => 'required',
			'tempat' => 'required',
			'dihadiri_oleh' => 'required',
			'tanggal' => 'required|date',
		]);

		$agendaKegiatan = new AgendaKegiatan();
		$agendaKegiatan->uuid = Str::uuid();
		$agendaKegiatan->nama = $request->nama;
		$agendaKegiatan->waktu = $request->waktu;
		$agendaKegiatan->tempat = $request->tempat;
		$agendaKegiatan->dihadiri_oleh = $request->dihadiri_oleh;
		$agendaKegiatan->tanggal = $request->tanggal;

		$agendaKegiatan->save();

		return redirect()->route('epanel.agenda-kegiatan.index')->with('success', 'Agenda kegiatan berhasil disimpan.');
	}

	public function edit($uuid)
	{
		$agendaKegiatan = AgendaKegiatan::where('uuid', $uuid)->first();

		if (!$agendaKegiatan) {
			return redirect()->route('epanel.agenda-kegiatan.index')->with('error', 'Agenda kegiatan tidak ditemukan.');
		}

		return view('epanel.pages.agenda-kegiatan.edit', [
			'agendaKegiatan' => $agendaKegiatan,
			'title' => 'Edit Agenda Kegiatan'
		]);
	}

	public function update(Request $request, $uuid)
	{
		$agendaKegiatan = AgendaKegiatan::where('uuid', $uuid)->first();

		if (!$agendaKegiatan) {
			return redirect()->route('epanel.agenda-kegiatan.index')->with('error', 'Agenda kegiatan tidak ditemukan.');
		}

		$agendaKegiatan->update($request->all());

		return redirect()->route('epanel.agenda-kegiatan.index')->with('success', 'Agenda kegiatan berhasil diperbarui.');
	}

	public function destroy($uuid)
	{
		$agendaKegiatan = AgendaKegiatan::where('uuid', $uuid)->first();

		if (!$agendaKegiatan) {
			return redirect()->route('epanel.agenda-kegiatan.index')->with('error', 'Agenda kegiatan tidak ditemukan.');
		}

		$agendaKegiatan->delete();

		return redirect()->route('epanel.agenda-kegiatan.index')->with('success', 'Agenda kegiatan berhasil dihapus.');
	}
}
