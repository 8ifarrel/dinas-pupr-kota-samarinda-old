<?php

namespace App\Http\Controllers\EPanel;

use App\Http\Controllers\Controller;
use App\Models\KontakKami;
use Illuminate\Http\Request;

class EPanelKontakKamiController extends Controller
{
	public function index()
	{
		$kontak = KontakKami::orderByDesc('created_at')->get();
		return view('epanel.pages.kontak-kami.index', [
			'kontak' => $kontak
		]);
	}
}
