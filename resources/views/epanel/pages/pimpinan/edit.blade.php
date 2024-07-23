@extends('epanel.layouts.main')

@section('content')

<div class="container">
	<form action="{{ route('epanel.pimpinan.update')}}" method="POST" enctype="multipart/form-data">
		<div class="row justify-content-center">
			<div class="col-md-9">
				@csrf
				@method('PUT')

				{{-- Nama --}}
				<div class="mb-3">
					<label for="nama" class="form-label">Nama</label>
					<input type="text" class="form-control" id="nama" name="nama" value="{{ $riwayat_pimpinan->nama }}" required>
				</div>

				{{-- Periode --}}
				<div class="mb-3">
					<label for="periode" class="form-label">Periode</label>
					<input type="text" class="form-control" id="periode" name="periode" value="{{ $riwayat_pimpinan->periode }}"
						required>
				</div>

				{{-- Quotes --}}
				<div class="mb-3">
					<label for="quotes" class="form-label">Quotes</label>
					<textarea class="form-control" id="quotes" name="quotes" rows="3" required
						style="resize: none;">{{ $pimpinan->quotes }}</textarea>
				</div>

				{{-- Sambutan --}}
				<div class="mb-3">
					<label for="sambutan" class="form-label">Sambutan</label>
					<textarea class="form-control" id="sambutan" name="sambutan" rows="3" required
						style="resize: none;">{{ $pimpinan->sambutan }}</textarea>
				</div>

				{{-- UUID --}}
				<input type="hidden" name="uuid" value="{{ $riwayat_pimpinan->uuid }}">
				<input type="hidden" name="pimpinan_id" value="{{ $pimpinan->id }}">
			</div>
			<div class="col-md-3">
				{{-- Foto --}}
				<div class="mb-3">
					<label for="foto" class="form-label">Foto</label>
					<input type="file" class="form-control" id="foto" name="foto" accept="image/*">
					@if ($riwayat_pimpinan->foto)
					<img src="{{ Storage::url($riwayat_pimpinan->foto) }}" alt="Foto" style="max-width: 175px; margin-top: 10px;">
					@endif
				</div>

				{{-- Mulai Jabatan --}}
				<div class="mb-3">
					<label for="mulai_jabatan" class="form-label">Mulai Jabatan</label>
					<input type="text" class="form-control" id="mulai_jabatan" name="mulai_jabatan"
						value="{{ $riwayat_pimpinan->mulai_jabatan }}" required>
				</div>

				{{-- Akhir Jabatan --}}
				<div class="mb-3">
					<label for="akhir_jabatan" class="form-label">Akhir Jabatan</label>
					<input type="text" class="form-control" id="akhir_jabatan" name="akhir_jabatan"
						value="{{ $riwayat_pimpinan->akhir_jabatan }}" required>
				</div>
			</div>
		</div>

		{{-- Button Simpan --}}
		<div>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
	</form>
</div>

@endsection