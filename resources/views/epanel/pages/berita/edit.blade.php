@extends('epanel.layouts.main')

@section('header')
<div class="d-flex justify-content-between flex-md-nowrap align-items-center py-3 mb-3 border-bottom">
	<div>
		<h3 class="fw-semibold m-0">Edit Berita</h3>
		<p class="m-0">Edit berita yang sudah pernah diunggah</p>
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
	<div class="row">
		<form
			action="{{ route('epanel.berita.update', ['kategori' => request()->query('kategori'), 'uuid' => $berita->uuid]) }}"
			method="POST" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="d-flex">
				<div class="me-4 w-75">
					{{-- Judul --}}
					<div class="mb-3">
						<label for="judul" class="form-label wajib-diisi">Judul</label>
						<input class="form-control" id="judul" name="judul" value="{{ $berita->judul }}" required></input>
					</div>
					{{-- Preview --}}
					<div class="mb-3">
						<label for="preview" class="form-label wajib-diisi">Preview</label>
						<textarea class="form-control" id="preview" name="preview" rows="2" required
							style="resize: none;">{{ $berita->preview }}</textarea>
					</div>
					{{-- Isi --}}
					<div>
						<label for="isi" class="form-label wajib-diisi">Isi</label>
						<input type="hidden" id="isi" name="isi" value="{{ $berita->isi }}">
						<trix-editor input="isi" style="width: 100%; height: 8rem; overflow-y: auto;">{{ $berita->isi }}
						</trix-editor>
					</div>
				</div>

				<div class="w-25">
					{{-- Foto --}}
					<div>
						<div class="mb-3">
							<label for="foto" class="form-label">Foto</label>
							<input type="file" class="form-control" id="foto" name="foto" accept="image/*">
							@if ($berita->foto)
							<img src="{{ Storage::url($berita->foto) }}" alt="Foto" style="max-width: 200px; margin-top: 10px;">
							@endif
						</div>
					</div>
					{{-- Sumber Foto --}}
					<div class="mb-3">
						<label for="sumber-foto" class="form-label wajib-diisi">Sumber Foto</label>
						<input type="text" class="form-control" id="sumber-foto" name="sumber-foto"
							value="{{ $berita->sumber_foto }}" required>
					</div>
					{{-- Tanggal Buat --}}
					<div class="mb-3">
						<label for="created_at" class="form-label keterangan-lainnya">Tanggal Buat</label>
						<input type="datetime-local" class="form-control" id="created_at" name="created_at"
							value="{{ $berita->created_at->format('Y-m-d\TH:i') }}">
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</form>
	</div>

	<hr>

	<div class="d-flex flex-column">
		<small class="m-0 p-0">
			<span class="text-red">*</span>
			Wajib diisi
		</small>

		<small class="m-0 p-0">
			<span class="text-red">**</span>
			Kosongkan jika ingin menggunakan waktu sekarang
		</small>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

<style>
	trix-toolbar [data-trix-button-group="file-tools"] {
		display: none;
	}
</style>
@endsection