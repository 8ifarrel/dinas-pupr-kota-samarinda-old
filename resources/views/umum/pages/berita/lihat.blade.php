@extends('umum.layouts.berita')

@section('content')

<div class="px-4 py-3 d-flex flex-column">
  <h1 class="fs-lg fw-bold">{{ $berita->judul }}</h1>

  <div class="d-flex">
    {{-- Tanggal --}}
    <div class="me-3">
      <p>
        <i class="bi bi-calendar-fill mb-1"></i>
        
        {{ $berita->created_at->format('d F Y') }}
      </p>
    </div>

    {{-- Jumlah views --}}
    <div>
      <p>
        <i class="bi bi-eye-fill mb-1"></i>
        
        {{ $berita->view }} kali
      </p>
    </div>
  </div>

  <img src="{{ Storage::url($berita->foto) }}" alt="{{ $berita->judul }}" class="my-3 w-75 mx-auto">

  <article class="mt-3 fs-md">
    {!! $berita->isi !!}
  </article>
</div>


@endsection
  