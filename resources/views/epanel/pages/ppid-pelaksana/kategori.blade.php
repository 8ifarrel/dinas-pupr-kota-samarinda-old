@extends('epanel.layouts.main')

@section('content')

<div class="mb-3">
    <table id="table-epanel" class="table table-bordered border-secondary-subtle py-3">
        <thead>
            <tr>
                <th scope="col" class="text-center" style="width: 5% !important;">No</th>
                <th scope="col" class="text-center">Nama</th>
                {{-- <th scope="col" class="text-center" style="width: 15% !important;">Banyak Berkas</th> --}}
                <th scope="col" class="text-center" style="width: 20% !important">Terakhir Upload</th>
                <th scope="col" class="text-center" style="width: 15% !important;">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($kategori_ppid_pelaksana as $item)
            <tr>
                <th scope="row" class="text-center">
                    {{ $loop->iteration }}
                </th>

                <td>
                    {{ $item->label }}
                </td>

                {{-- <td>
                    {{ $item->berkas_count }}
                </td> --}}

                <td>
                    @if($item->unduhan()->exists())
                        {{ $item->unduhan()->latest()->first()->created_at->format('d F Y') }}
                        <br>
                        {{ $item->unduhan()->latest()->first()->created_at->format('H:i') }} WITA
                    @else
                        Belum pernah upload berkas
                    @endif
                </td>
                
                <td class="text-center">
                    {{-- Edit --}}
                    <a href="{{ route('epanel.ppid-pelaksana.pilih', ['kategori' => $item->slug]) }}" class="btn btn-primary fw-bold btn-sm">
                        KELOLA BERKAS
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection