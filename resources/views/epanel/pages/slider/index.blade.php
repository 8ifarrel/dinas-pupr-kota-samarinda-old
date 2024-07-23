@extends('epanel.layouts.main')

@section('content')

<div class="mb-3">
    <a href="{{ route('epanel.slider.create') }}" class="btn btn-primary">Tambah Slider</a>
</div>

<div class="mb-3">
    <table id="table-epanel" class="table table-bordered border-secondary-subtle py-3">
        <thead>
            <tr>
                <th scope="col" class="text-center" style="width: 5% !important;">No</th>
                <th scope="col" class="text-center" style="width: 35% !important;">Foto</th>
                <th scope="col" class="text-center" style="width: 30% !important;">Judul</th>
                <th scope="col" class="text-center">Tanggal Upload</th>
                <th scope="col" class="text-center" style="width: 10% !important;">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($slider as $item)
            <tr>
                <th scope="row" class="text-center">{{ $loop->iteration }}</th>

                <td>
                    <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->judul }}" class="img-fluid">
                </td>

                <td>{{ $item->judul }}</td>

                <td>
                    {{ $item->created_at->format('d F Y') }}
                    <br>
                    {{ $item->created_at->format('H:i') }} WITA
                </td>

                <td>
                    {{-- Edit --}}
                    <a href="{{ route('epanel.slider.edit', $item->uuid) }}" class="btn btn-primary">
                        <i class="bi bi-pencil-fill"></i>
                    </a>

                    {{-- Hapus --}}
                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#konfirmasiHapus">
                        <i class="bi bi-trash3-fill"></i>
                    </button>

                    {{-- Konfirmasi Hapus --}}
                    <div class="modal fade" id="konfirmasiHapus" tabindex="-1" aria-labelledby="konfirmasiHapus"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="konfirmasiHapus">Konfirmasi hapus</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    Anda akan menghapus slider
                                    <span class="fw-bold">
                                        {{ $item->judul }}
                                    </span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>

                                    <form action="{{ route('epanel.slider.destroy', $item->uuid) }}" method="POST"
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