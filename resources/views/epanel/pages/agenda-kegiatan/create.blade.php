@extends('epanel.layouts.main')

@section('header')
<div class="d-flex justify-content-between flex-md-nowrap align-items-center py-3 mb-3 border-bottom">
	<div>
		<h3 class="fw-semibold m-0">Tambah Agenda Kegiatan</h3>
		<p class="m-0">Jadwalkan agenda kegiatan di sini</p>
	</div>
	<div class="d-flex">
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

<div class="container">
	<form action="{{ route('epanel.agenda-kegiatan.store') }}" method="POST">
		@csrf

		<div class="d-flex">
			<div class="w-50 me-4">
				{{-- Nama --}}
				<div class="mb-3">
					<label for="nama" class="form-label wajib-diisi">Nama Kegiatan</label>
					<input type="text" class="form-control" id="nama" name="nama" required>
				</div>

				<div class="d-flex">
					{{-- Tanggal --}}
					<div class="mb-3 w-50 me-3">
						<label for="tanggal" class="form-label wajib-diisi">Tanggal</label>
						<input type="date" class="form-control" id="tanggal" name="tanggal" required>
					</div>

					{{-- Waktu --}}
					<div class="mb-3 w-50">
						<label for="waktu" class="form-label wajib-diisi">Waktu</label>
						<input type="time" class="form-control" id="waktu" name="waktu" required>
					</div>
				</div>
			</div>

			<div class="w-50">
				{{-- Tempat --}}
				<div class="mb-3">
					<label for="tempat" class="form-label wajib-diisi">Tempat</label>
					<input type="text" class="form-control" id="tempat" name="tempat" required>
				</div>

				{{-- Dihadiri oleh --}}
				<div class="mb-3">
					<label for="dihadiri_oleh" class="form-label wajib-diisi">Dihadiri Oleh</label>
					<input type="text" class="form-control" id="dihadiri_oleh" name="dihadiri_oleh" required>
				</div>

			</div>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>

@endsection