@extends('epanel.layouts.main')

@section('header')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<div>
		<h3 class="fw-semibold m-0">Daftar Kontak</h3>
		<p class="m-0">Berikut adalah daftar kontak yang telah diterima.</p>
	</div>
</div>
@endsection

@section('content')
<div class="mb-3">
	<table id="table-epanel" class="table table-bordered border-secondary-subtle py-3">
		<thead>
			<tr>
				<th scope="col" class="text-center" style="width: 5% !important;">No</th>
				<th scope="col" class="text-center">Nama Lengkap</th>
				<th scope="col" class="text-center">Email</th>
				<th scope="col" class="text-center">Nomor Telepon</th>
				<th scope="col" class="text-center">Isi</th>
				<th scope="col" class="text-center" style="width: 15% !important;">Dibuat Pada</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($kontak as $item)
			<tr>
				{{-- Nomor --}}
				<th scope="row" class="text-center">
					{{ $loop->iteration }}
				</th>
				{{-- Nama Lengkap --}}
				<td>{{ $item->nama }}</td>
				{{-- Email --}}
				<td>{{ $item->email }}</td>
				{{-- Nomor Telepon --}}
				<td>{{ $item->telepon }}</td>
				{{-- Isi --}}
				<td>
					<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
						data-bs-target="#lihatModal{{ $loop->index }}">
						Lihat
					</button>
					{{-- Modal untuk menampilkan isi kontak --}}
					<div class="modal fade" id="lihatModal{{ $loop->index }}" tabindex="-1" aria-labelledby="exampleModalLabel"
						aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Isi Kontak</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									{{ $item->isi }}
								</div>
							</div>
						</div>
					</div>
				</td>
				{{-- Dibuat Pada --}}
				<td class="text-center"> {{ $item->created_at->format('d F Y') }}
					<br>
					{{ $item->created_at->format('H:i') }} WITA
						</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection