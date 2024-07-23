@extends('epanel.layouts.main')

@section('content')

<div class="mb-3">
	<a href="{{ route('epanel.pegawai.create') }}" class="btn btn-primary">
		Tambah Pegawai
	</a>
</div>

<div class="mb-3">
	<table id="table-epanel" class="table table-bordered border-secondary-subtle py-3">
		<thead>
			<tr>
				<th scope="col" class="text-center" style="width: 5% !important;">No</th>
				<th scope="col" class="text-center">Foto</th>
				<th scope="col" class="text-center">Nama</th>
				<th scope="col" class="text-center">Telepon</th>
				<th scope="col" class="text-center">Email</th>
				<th scope="col" class="text-center">Golongan</th>
				<th scope="col" class="text-center">Bidang</th>
				<th scope="col" class="text-center">Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($pegawai as $item)
			<tr>
				<th scope="row" class="text-center">
					{{ $loop->iteration }}
				</th>

				<td class="text-center">
					<img src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama }}" style="width: 100px; height: 100px;">
				</td>

				<td>
					{{ $item->nama }}
				</td>

				<td>
					{{ $item->telepon }}
				</td>

				<td>
					{{ $item->email }}
				</td>

				<td>
					{{ $item->golongan }}
				</td>

				<td>
					{{ $item->bidang->label }}
				</td>

				<td class="text-center">
					{{-- Edit --}}
					<a href="{{ route('epanel.pegawai.edit', $item->uuid) }}" class="btn btn-primary">
						<i class="bi bi-pencil-fill"></i>
					</a>

					{{-- Hapus --}}
					<button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#konfirmasiHapus">
						<i class="bi bi-trash3-fill"></i>
					</button>

					{{-- Konfirmasi Hapus --}}
					<div class="modal fade" id="konfirmasiHapus" tabindex="-1" aria-labelledby="konfirmasiHapus"
						aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="konfirmasiHapus">Konfirmasi hapus</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body text-start">
									Anda akan menghapus pegawai
									<span class="fw-bold">
										{{ $item->nama }}
									</span>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

									<form action="{{ route('epanel.pegawai.destroy', $item->uuid) }}" method="POST"
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
