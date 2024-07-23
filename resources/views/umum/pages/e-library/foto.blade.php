@extends('umum.layouts.main')

@section('container')

<div class="py-5 px-5 bg-grey">
  <div class="text-center">
    <p class="badge rounded-pill px-3 py-2 bg-blue text-yellow fw-bold m-0 fs-default">
      Galeri
    </p>

    <h1 class="fs-lg fw-bold mt-3 mb-5">
      {{ $foto->first()->galeri->judul }}
    </h1>
  </div>

  <div class="mx-3 row d-flex justify-content-center">

    @foreach ($foto as $item)
      <div class="col-md-4 mb-4">
        <div>
          <div class="card card-hover h-100 rounded-4 border-0 mx-1">
            <a href="" class="text-decoration-none text-black">
              <div class="img-container">
                <img src="{{ Storage::url($item->foto) }}" class="card-img-top rounded-0 wide-img" alt="">
              </div>
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection