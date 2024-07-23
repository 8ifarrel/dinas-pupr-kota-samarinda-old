@extends('epanel.layouts.main')

@section('header')

<div class="d-flex justify-content-between flex-md-nowrap align-items-center py-3 mb-3 border-bottom">
	<div>
		<h3 class="fw-semibold m-0">Daftar Berita</h3>
		<p class="m-0">Berikut daftar berita pada kategori <span class="fw-bold">{{ $namaKategori }}</span></p>
	</div>

	<div class="d-flex">
		<div class="text-center me-3">
			<a href="{{ route('epanel.berita.create', ['kategori' => request()->query('kategori')]) }}"
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
				<th scope="col" class="text-center">Judul</th>
				<th scope="col" class="text-center">Views</th>
				<th scope="col" class="text-center" style="width: 15% !important">Upload</th>
				<th scope="col" class="text-center">Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($berita as $item)
			<tr>
				<th scope="row" class="text-center">
					{{ $loop->iteration }}
				</th>

				<td>
					{{ $item->judul }}
				</td>

				<td>
					{{ $item->view }}
				</td>

				<td class="">
					{{ $item->created_at->format('d F Y') }}
					<br>
					{{ $item->created_at->format('H:i') }} WITA
				</td>

				<td class="text-center">
					<div class="d-flex">
						{{-- Edit --}}
						<a href="{{ route('epanel.berita.edit', $item->uuid) }}" class="btn btn-primary m-0 me-1">
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
						aria-labelledby="konfirmasiHapusLabel{{ $item->uuid }}" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="konfirmasiHapusLabel{{ $item->uuid }}">Konfirmasi hapus</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body text-start">
									Anda akan menghapus berita
									<span class="fw-bold">{{ $item->judul }}</span>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
									<form action="{{ route('epanel.berita.destroy', $item->uuid) }}" method="POST"
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