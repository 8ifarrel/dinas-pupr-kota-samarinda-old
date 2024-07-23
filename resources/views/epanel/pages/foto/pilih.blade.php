@extends('epanel.layouts.main')

@section('content')
<style>
    .img-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 255, 0.5);
        /* Warna biru dengan kejelasan 50% */
        opacity: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: opacity 0.3s ease;
    }

    .img-overlay:hover {
        opacity: 1;
    }

    .delete-button {
        background-color: red;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
    }
</style>

<div class="mb-3">
    <a href="{{ route('epanel.foto.create', ['galeri' => request()->query('galeri')]) }}" class="btn btn-primary">Tambah Foto</a>
</div>

<div class="mx-3 row d-flex justify-content-center">
    @foreach ($foto as $item)
    <div class="col-md-4 mb-4">
        <div>
            <div class="card card-hover h-100 rounded-4 border-0 mx-1">
                <div class="img-container">
                    <img src="{{ Storage::url($item->foto) }}" class="card-img-top rounded-0 wide-img" alt="">

                    {{-- Hapus --}}
                    <div class="img-overlay">
                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#konfirmasiHapus">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </div>

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
                                    Anda akan menghapus foto
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Batal</button>

                                    <form action="{{ route('epanel.foto.destroy', $item->uuid) }}" method="POST"
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

            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection