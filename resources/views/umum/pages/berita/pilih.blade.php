@extends('umum.layouts.berita')

@section('content')

@foreach ($berita as $item)
<div class="mx-2">
  <div class="d-flex">
    {{-- Foto --}}
    <div class="me-3 ms-1 w-25">
      <div class="img-container">
        <img src="{{ Storage::url($item->foto) }}" alt="" class="wide-img">
      </div>
    </div>

    {{-- Teks --}}
    <div class="d-flex flex-column w-75">
      <a href="/berita/{{ $item->slug }}" class="text-decoration-none">
        <h1 class="fs-md fw-semibold text-black">
          {{ $item->judul }}
        </h1>
      </a>

      <p class="mt-auto mb-0">
        {{ $item->created_at->format('d F Y') }}
      </p>
    </div>
  </div>

  <hr>
</div>
@endforeach

<div class="d-flex justify-content-center mt-5">
  {{ $berita->links() }}
</div>

@endsection