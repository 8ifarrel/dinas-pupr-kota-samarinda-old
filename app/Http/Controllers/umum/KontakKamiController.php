<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KontakKami;

class KontakKamiController extends Controller
{
	public function index()
	{
		return view('umum.pages.kontak-kami', [
			"title" => "Kontak Kami"
		]);
	}

	public function store(Request $request)
	{
		// Validasi data yang diterima dari form
		$validatedData = $request->validate([
			'nama' => 'required',
			'email' => 'required|email',
			'telepon' => 'required',
			'pesan' => 'required',
		]);

		// Simpan data ke dalam database
		KontakKami::create($validatedData);

		// Redirect dengan pesan sukses
		return redirect()->route('umum.pages.kontak-kami')->with('success', 'Pesan Anda telah berhasil dikirim!');
	}
}
