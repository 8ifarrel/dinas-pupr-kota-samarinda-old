@extends('umum.layouts.main')

@section('container')
<div class="py-5 px-5 bg-grey">
  <div class="text-center">
    <p class="badge rounded-pill px-3 py-2 bg-blue text-yellow fw-bold m-0 fs-default">
      Galeri
    </p>

    <h1 class="fs-lg fw-bold mt-3 mb-5">
      Foto-Foto Kegiatan
    </h1>
  </div>

  <div class="mx-3 row d-flex justify-content-center">
    @foreach ($galeri as $item)
    @if ($item->foto->isNotEmpty())
    <div class="col-md-4 mb-4">
      <div>
        <div class="card card-hover h-100 rounded-4 border-0 mx-1">
          <a href="/e-library/galeri/{{ $item->slug }}" class="text-decoration-none text-black">
            <div class="position-absolute pb-2 pt-5 px-3 text-white w-100 z-2"
              style="background: linear-gradient(360deg, rgba(0,0,0,0.8785714969581583) 0%, rgba(0,0,0,0) 100%); bottom: 0; ">
              <p class="card-title fs-default fw-bold text-center">
                {{ $item->judul }}
              </p>
            </div>

            <div class="img-container z-0">
              <img src="{{ Storage::url($item->foto->sortByDesc('created_at')->first()->foto) }}"
                class="card-img-top rounded-0 img-fluid wide-img" alt="">
            </div>
          </a>
        </div>
      </div>

      <div class="card-body d-flex justify-content-between mx-2">
        <p class="card-title fs-default">
          <i class="bi bi-image"></i>
          {{ $item->foto_count }} foto
        </p>

        <p class="card-title fs-default">
          <i class="bi bi-eye-fill"></i>
          {{ $item->view }} kali
        </p>
      </div>
    </div>
    @endif
    @endforeach
  </div>
</div>
@endsection