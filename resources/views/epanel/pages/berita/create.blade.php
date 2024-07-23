@extends('epanel.layouts.main')

@section('header')
<div class="d-flex justify-content-between flex-md-nowrap align-items-center py-3 mb-3 border-bottom">
	<div>
		<h3 class="fw-semibold m-0">Tambah Berita Baru</h3>
		<p class="m-0">Berita untuk kategori <span class="fw-bold">{{ $namaKategori }}</span></p>
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
		<form action="{{ route('epanel.berita.store', ['kategori' => request()->query('kategori')]) }}" method="POST"
			enctype="multipart/form-data">
			@csrf
			<div class="d-flex">
				<div class="me-4 w-75">
					{{-- Judul --}}
					<div class="mb-3">
						<label for="judul" class="form-label wajib-diisi">Judul</label>
						<input class="form-control" id="judul" name="judul" required></input>
					</div>
					{{-- Preview --}}
					<div class="mb-3">
						<label for="preview" class="form-label wajib-diisi">Preview</label>
						<textarea class="form-control" id="preview" name="preview" rows="2" required
							style="resize: none;"></textarea>
					</div>
					{{-- Isi --}}
					<div class="mb-3">
						<label for="isi" class="form-label wajib-diisi">Isi</label>
						<input type="hidden" id="isi" name="isi">
						<trix-editor input="isi" style="width: 100%; height: 8rem"></trix-editor>
					</div>
				</div>

				<div class="w-25">
					{{-- Foto --}}
					<div>
						<div class="mb-3">
							<label for="foto" class="form-label wajib-diisi">Foto</label>
							<input type="file" class="form-control" id="foto" name="foto" accept="image/*">
						</div>
					</div>
					{{-- Sumber Foto --}}
					<div class="mb-3">
						<label for="sumber-foto" class="form-label wajib-diisi">Sumber Foto</label>
						<input type="text" class="form-control" id="sumber-foto" name="sumber-foto" required>
					</div>
					{{-- Tanggal Buat --}}
					<div class="mb-3">
						<label for="created_at" class="form-label keterangan-lainnya">Tanggal Buat</label>
						<input type="datetime-local" class="form-control" id="created_at" name="created_at">
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Tambah</button>
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