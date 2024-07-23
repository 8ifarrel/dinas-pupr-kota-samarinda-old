@extends('umum.layouts.main')

@section('container')
<div class="p-5 bg-grey">
  <div class="text-center">
    <p class="badge rounded-pill px-3 py-2 bg-blue text-yellow fw-bold m-0 fs-default">
      BERITA
    </p>

    <h1 class="fs-lg fw-bold mt-3 mb-5">
      KATEGORI BERITA
    </h1>
  </div>

  <div class="mx-3 row d-flex justify-content-center">
    @foreach ($kategori as $item)
      <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-duration="1500">
        <div class="card card-hover rounded-4 border-0 shadow mx-1 h-100">
          <a href="/berita?kategori={{ $item->slug }}" class="text-decoration-none text-black">
            <div class="card-body d-flex align-items-start flex-column">
              <div class="mx-auto my-4">
                <img src="{{ asset('logo/kategori-berita/' . Str::slug($item->slug) . '.png') }}" alt="" style="height: 120px">
              </div>

              <div class="mx-auto">
                <h5 class="card-title fw-semibold mb-4 text-center" style="height: 52px">
                  {{ $item->label }}
                </h5>
              </div>

              <div class="mx-auto">
                <p class="card-title mb-3 mt-4 text-center fs-md">
                  <i class="bi bi-folder mb-1" style="height: 18px"></i>
                  
                  {{ $item->berita_count }} Berita
                </p>
              </div>
            </div>
          </a>
        </div>
      </div>
    @endforeach
  </div>
</div>
  
@endsection

