@extends('epanel.layouts.main')

@section('content')

<div class="mb-3">
    <a href="{{ route('epanel.galeri.create') }}" class="btn btn-primary">Tambah Galeri</a>
</div>

<div class="mb-3">
    <table id="table-epanel" class="table table-bordered border-secondary-subtle py-3">
        <thead>
            <tr>
                <th scope="col" class="text-center" style="width: 5% !important;">No</th>
                <th scope="col" class="text-center" style="width: 15% !important;">Thumnail</th>
                <th scope="col" class="text-center">Label</th>
                <th scope="col" class="text-center" style="width: 15% !important;">Banyak Foto</th>
                <th scope="col" class="text-center" style="width: 20% !important">Terakhir Upload</th>
                <th scope="col" class="text-center" style="width: 15% !important;">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($galeri as $item)
            <tr>
                <th scope="row" class="text-center">
                    {{ $loop->iteration }}
                </th>

                <td class="">
                    @if ($item->foto->isNotEmpty())
                    <img src="{{ Storage::url($item->foto->sortByDesc('created_at')->first()->foto) }}"
                        class="card-img-top" alt="">
                    @else
                    <p class="d-flex justify-content-center align-items-center m-0">
                        Belum ada foto
                    </p>
                    @endif
                </td>

                <td>
                    {{ $item->judul }}
                </td>

                <td>
                    {{ $item->foto_count }}
                </td>

                <td>
                    @if($item->foto()->exists())
                    {{ $item->foto()->latest()->first()->created_at->format('d F Y') }}
                    <br>
                    {{ $item->foto()->latest()->first()->created_at->format('H:i') }} WITA
                    @else
                    Belum pernah upload foto
                    @endif
                </td>

                <td class="text-center">
                    {{-- Kelola Foto --}}
                    <div>
                        <a href="{{ route('epanel.foto.pilih', ['galeri' => $item->slug]) }}"
                            class="btn btn-primary fw-bold btn-sm">
                            KELOLA FOTO
                        </a>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mt-1">
                        {{-- Edit Galeri --}}
                        <a href="{{ route('epanel.galeri.edit', $item->uuid) }}" class="btn btn-primary me-1">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
    
                        {{-- Hapus Galeri --}}
                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#konfirmasiHapus">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
    
                        {{-- Konfirmasi Hapus Galeri --}}
                        <div class="modal fade" id="konfirmasiHapus" tabindex="-1" aria-labelledby="konfirmasiHapus"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="konfirmasiHapus">Konfirmasi hapus</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        Anda akan menghapus galeri
                                        <span class="fw-bold">
                                            {{ $item->judul }}
                                        </span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
    
                                        <form action="{{ route('epanel.galeri.destroy', $item->uuid) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
    
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
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