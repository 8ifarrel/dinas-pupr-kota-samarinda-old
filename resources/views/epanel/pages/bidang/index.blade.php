@extends('epanel.layouts.main')

@section('content')

<div class="mb-3">
    <a href="{{ route('epanel.bidang.create') }}" class="btn btn-primary">
        Tambah Bidang
    </a>
</div>

<div class="mb-3">
    <table id="table-epanel" class="table table-bordered border-secondary-subtle py-3">
        <thead>
            <tr>
                <th scope="col" class="text-center" style="width: 5% !important;">No</th>
                <th scope="col" class="text-center">Label</th>
                <th scope="col" class="text-center" style="width: 15% !important;">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($bidang as $item)
            <tr>
                <th scope="row" class="text-center">
                    {{ $loop->iteration }}
                </th>

                <td>
                    {{ $item->label }}
                </td>

                <td class="text-center">
                    {{-- Edit --}}
                    <a href="{{ route('epanel.bidang.edit', $item->uuid) }}" class="btn btn-primary">
                        <i class="bi bi-pencil-fill"></i>
                    </a>

                    {{-- Hapus --}}
                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#konfirmasiHapus{{ $item->id }}">
                        <i class="bi bi-trash3-fill"></i>
                    </button>

                    {{-- Konfirmasi Hapus --}}
                    <div class="modal fade" id="konfirmasiHapus{{ $item->id }}" tabindex="-1" aria-labelledby="konfirmasiHapus{{ $item->id }}"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="konfirmasiHapus{{ $item->id }}">Konfirmasi hapus</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    Anda akan menghapus bidang
                                    <span class="fw-bold">
                                        {{ $item->label }}
                                    </span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                                    <form action="{{ route('epanel.bidang.destroy', $item->uuid) }}" method="POST"
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
