@extends('epanel.layouts.main')

@section('content')

<div class="mb-3">
    <a href="{{ route('epanel.ppid-pelaksana.create', ['kategori' => request()->query('kategori')]) }}" class="btn btn-primary">
        Tambah Berkas
    </a>
</div>

<div class="mb-3">
    <table id="table-epanel" class="table table-bordered border-secondary-subtle py-3">
        <thead>
            <tr>
                <th scope="col" class="text-center" style="width: 5% !important;">No</th>
                <th scope="col" class="text-center">Judul</th>
                <th scope="col" class="text-center" style="width: 15% !important;">Downlads</th>
                <th scope="col" class="text-center" style="width: 20% !important">Upload</th>
                <th scope="col" class="text-center" style="width: 15% !important;">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($berkas as $item)
            <tr>
                <th scope="row" class="text-center">
                    {{ $loop->iteration }}
                </th>

                <td>
                    {{ $item->judul }}
                </td>

                <td>
                    {{ $item->download }}
                </td>

                <td>
                    {{ $item->created_at->format('d F Y') }}
                    <br>
                    {{ $item->created_at->format('H:i') }} WITA
                </td>
                
                <td class="text-center">
                    {{-- Edit --}}
                    <a href="{{ route('epanel.ppid-pelaksana.edit', $item->uuid) }}" class="btn btn-primary">
                        <i class="bi bi-pencil-fill"></i>
                    </a>

                    {{-- Hapus --}}
                    <form action="{{ route('epanel.ppid-pelaksana.destroy', $item->uuid) }}" method="POST"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection