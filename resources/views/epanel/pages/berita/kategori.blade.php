	@extends('epanel.layouts.main')

	@section('header')

	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<div>
			<h3 class="fw-semibold m-0">Pilih Kategori Berita</h3>
			<p class="m-0">Silakan pilih salah satu kategori untuk menampilkan seluruh berita terkait.</p>
		</div>
	</div>

	@endsection

	@section('content')

	<div class="mb-3">
		<table id="table-epanel" class="table table-bordered border-secondary-subtle py-3">
			<thead>
				<tr>
					<th scope="col" class="text-center" style="width: 5% !important;">No</th>
					<th scope="col" class="text-center" style="width: 10% !important;">Logo</th>
					<th scope="col" class="text-center">Label</th>
					<th scope="col" class="text-center" style="width: 15% !important;">Banyak Berita</th>
					<th scope="col" class="text-center" style="width: 20% !important">Terakhir Upload</th>
					<th scope="col" class="text-center" style="width: 15% !important;">Action</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($kategori_berita as $item)
				<tr>
					{{-- Nomor --}}
					<th scope="row" class="text-center">
						{{ $loop->iteration }}
					</th>
					{{-- Foto --}}
					<td>
						<img src="{{ asset('logo/kategori-berita/' . Str::slug($item->slug) . '.png') }}" alt="" class="img-fluid">
					</td>
					{{-- Label --}}
					<td>
						{{ $item->label }}
					</td>
					{{-- Banyak berita --}}
					<td>
						{{ $item->berita_count }}
					</td>
					{{-- Terakhir upload --}}
					<td>
						@if($item->berita()->exists())
						{{ $item->berita()->latest()->first()->created_at->format('d F Y') }}
						<br>
						{{ $item->berita()->latest()->first()->created_at->format('H:i') }} WITA
						@else
						Belum pernah upload berita
						@endif
					</td>
					{{-- Action --}}
					<td class="text-center">
						{{-- Kelola Berita --}}
						<a href="{{ route('epanel.berita.pilih', ['kategori' => $item->slug]) }}"
							class="btn fw-bold btn-sm btn-primary text-white">
							KELOLA BERITA
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	@endsection