@extends('umum.layouts.main')

@section('container')

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('img/header/ppid-pelaksana.jpeg') }}" class="d-block w-100" alt="..."
        style="filter: brightness(70%);">

      <div class="carousel-caption d-flex justify-content-center align-items-start flex-column h-100">
        <h1 class="fs-lg fw-medium m-0 text-start">Informasi Dinas</h1>
        <p class="fs-xl fw-bold m-0 text-start">{{ $title }}</p>
      </div>
    </div>
  </div>
</div>

<div class="container">
  {{-- Breadcrumb --}}
  <div class="badge rounded-4 bg-blue mt-4">
    <div class="px-2 py-1">
      <p class="p-0 my-auto text-yellow fs-default">
        <span>
          Home
        </span>
        /
        <span>
          Informasi Dinas
        </span>
        /
        <span>
          {{ $title }}
        </span>
      </p>
    </div>
  </div>

  {{-- Daftar Pengumuman --}}
  <div class="d-flex justify-content-center my-5">
    <table class="table table-hover rounded-4 shadow overflow-hidden">
      <thead class="">
        <tr>
          <th scope="col" class="bg-yellow-70 fs-md ps-3">No</th>
          <th scope="col" class="bg-yellow-70 fs-md" style="width: 70%;">Judul</th>
          <th scope="col" class="bg-yellow-70 fs-md">Tanggal Terbit</th>
          <th scope="col" class="bg-yellow-70 fs-md pe-3">Lampiran</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($pengumuman as $item)
        <tr>
          <th scope="row" class="text-center fs-md">{{ $loop->iteration }}</th>
          <td class="fs-md" style="width: 70%;">{{ $item->judul }}</td>
          <td class="fs-md">{{ $item->created_at->format('d F Y') }}</td>
          <td>
            <a href="" class="fw-semibold" data-bs-toggle="modal" data-bs-target="#lihatPengumuman{{ $item->id }}" type="submit">
              Klik di sini
            </a>

            {{-- Modal Pengumuman --}}
            <div class="modal fade" id="lihatPengumuman{{ $item->id }}" tabindex="-1"
              aria-labelledby="lihatPengumuman{{ $item->id }}" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="lihatPengumuman{{ $item->id }}">{{ $item->judul }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-start">
                    {!! $item->perihal !!}

                    <div>
                      @if($item->lampiran)
                      <a href="{{ Storage::url($item->lampiran) }}" class="btn btn-primary" download>Unduh Lampiran</a>
                      @endif
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
</div>



@endsection
