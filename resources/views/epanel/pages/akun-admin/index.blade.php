@extends('epanel.layouts.main')

@section('header')

<div class="d-flex justify-content-between flex-md-nowrap align-items-center py-3 mb-3 border-bottom">
	<div>
		<h3 class="fw-semibold m-0">Akun</h3>
		<p class="m-0">Berikut daftar akun yang dapat mengelola website</p>
	</div>

	<div class="d-flex">
		<div class="text-center me-3">
			<a href="{{ route('epanel.akun-admin.create') }}"
				class="text-decoration-none">
				<i class="fa-solid fa-circle-plus fa-2xl mb-3 text-secondary"></i>

				<p class="m-0 text-secondary fw-semibold">
					<small>
						Tambah
					</small>
				</p>
			</a>
		</div>

		<div class="text-center">
			<a type="button" onclick="history.back();" class="text-decoration-none">
				<i class="fa-solid fa-chevron-left fa-2xl mb-3 text-secondary"></i>

				<p class="m-0 text-secondary fw-semibold">
					<small>
						Kembali
					</small>
				</p>
			</a>
		</div>
	</div>
</div>

@endsection

@section('content')

<div class="mb-3">
	<table id="table-epanel" class="table table-bordered border-secondary-subtle py-3">
		<thead>
			<tr>
				<th scope="col" class="text-center">No</th>
				<th scope="col" class="text-center">Avatar</th>
				<th scope="col" class="text-center">Nama</th>
				<th scope="col" class="text-center">Username</th>
				<th scope="col" class="text-center">Superadmin</th>
				<th scope="col" class="text-center">Terakhir Log In</th>
				<th scope="col" class="text-center">Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($akun as $item)
			<tr>
				<th scope="row" class="text-center">
					{{ $loop->iteration }}
				</th>

				<td> {{-- Tolong buatkan statement kalau ga ada foto, tampilkan foto default aja --}}
					<img src="{{ Storage::url($item->avatar) }}" alt="">
				</td>

				<td>
					{{ $item->name }}
				</td>

				<td>
					{{ $item->username }}
				</td>


				<td>
					@if ($item->is_superadmin == 0)
					Tidak
					@else
					Ya
					@endif
				</td>

				<td>
					@if ($item->last_ip_login != NULL)
					{{ (new DateTime($item->last_time_login))->format('d F Y, H:i') }} WITA
					<br>
					<small>{{ $item->last_ip_login }}</small>
					@else
					Belum pernah log in
					@endif
				</td>

				<td class="text-center">
					<div class="d-flex">
						{{-- Edit --}}
						<a href="{{ route('epanel.akun-admin.edit', $item->uuid) }}" class="btn btn-primary m-0 me-1">
							<i class="fa-solid fa-pen"></i>
						</a>

						{{-- Hapus --}}
						<button type="submit" class="btn btn-danger m-0" data-bs-toggle="modal"
							data-bs-target="#konfirmasiHapus{{ $item->uuid }}">
							<i class="fa-solid fa-trash-can"></i>
						</button>
					</div>

					{{-- Konfirmasi Hapus --}}
					<div class="modal fade" id="konfirmasiHapus{{ $item->uuid }}" tabindex="-1"
						aria-labelledby="konfirmasiHapus{{ $item->uuid }}" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="konfirmasiHapus">Konfirmasi hapus</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body text-start">
									Anda akan menghapus Akun
									<span class="fw-bold">
										{{ $item->name }}
									</span>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

									<form action="{{ route('epanel.akun-admin.destroy', $item->uuid) }}" method="POST"
										style="display: inline-block;">
										@csrf
										@method('DELETE')

										<button type="submit" class="btn btn-danger">Hapus</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection