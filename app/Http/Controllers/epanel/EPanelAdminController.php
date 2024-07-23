<?php

namespace App\Http\Controllers\epanel;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

use App\Models\User;

class EPanelAdminController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$akun = User::latest()->get();

		return view('epanel.pages.akun-admin.index', [
			'title' => "Akun",
			'akun' => $akun,
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('epanel.pages.akun-admin.create', [
			'title' => 'Tambah Akun Admin'
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request): RedirectResponse
	{
		$request->validate([
			'name' => ['required', 'string', 'max:255'],
			'username' => ['required', 'string', 'lowercase', 'max:255', 'unique:users'],
			'password' => ['required', 'confirmed', Rules\Password::min(8)->letters()->numbers()],
		]);

		$user = User::create([
			'name' => $request->name,
			'username' => $request->username,
			'uuid' => Str::uuid(),
			'password' => Hash::make($request->password),
		]);

		event(new Registered($user));

		return redirect()->route('epanel.akun-admin.index')->with('success', 'Akun admin berhasil dibuat');
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit($uuid)
	{
		$akun = User::find($uuid);

		return view('epanel.pages.akun-admin.edit', [
			'title' => 'Ubah Akun',
			'akun' =>  $akun
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, $uuid)
	{
		// Temukan pengguna berdasarkan UUID
		$akun = User::find($uuid);

		// Validasi input
		$request->validate([
			'name' => ['required', 'string', 'max:255'],
			'username' => ['required', 'string', 'lowercase', 'max:255', 'unique:users'],
			'old_password' => ['required', 'string'],
			'password' => ['required', 'confirmed', Rules\Password::min(8)->mixedCase()->letters()->numbers()->uncompromised()],

		]);

		// Validasi kata sandi lama
		if (!Hash::check($request->old_password, $akun->password)) {
			return redirect()->back()->withErrors(['old_password' => 'Kata sandi lama tidak sesuai']);
		}

		// Update informasi pengguna
		$akun->name = $request->name;
		$akun->username = $request->username;
		$akun->password = Hash::make($request->password);
		$akun->save();

		return redirect()->route('epanel.akun-admin.index')->with('success', 'Informasi akun berhasil diperbarui');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy($uuid)
	{
		$akun = User::where('uuid', $uuid)->first();

		if (!$akun) {
			return redirect()->back()->withErrors('Akun tidak ditemukan');
		}

		$akun->delete();

		return redirect()->route('epanel.akun-admin.index')->with('success', 'Akun berhasil dihapus');
	}
}
