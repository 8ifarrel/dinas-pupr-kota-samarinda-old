@extends('umum.layouts.main')

@section('container')

@if(Storage::disk('public')->exists('bidang/'.$bidang->slug.'/slide/slide-1.jpg'))

<div class="container my-5" id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-i~nner">
    <div class="carousel-item active" data-bs-interval="5000">
      <img src="{{ asset('storage/bidang/'.$bidang->slug.'/slide/slide-1.jpg') }}" class="d-block w-100 img-fluid" alt="...">
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>

  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

@endif

{{-- Struktur --}}
<div class="p-5 bg-grey">
  <div class="text-center">
    <p class="badge rounded-pill px-3 py-2 bg-blue text-yellow fw-bold m-0 fs-default">
      BIDANG TEKNIS
    </p>

    <h1 class="fs-lg fw-bold mt-3 mb-5">
      {{ $bidang->nama_bidang }}
    </h1>
  </div>

  {{-- Struktur --}}
  <div class="d-flex justify-content-center mb-5 pb-4">
    <img src="{{ asset($bidang->struktur) }}" style="width: 1000px">
  </div>
</div>

{{-- Tupoksi --}}
<div class="bg-white py-5">
  <div class="d-flex flex-column">
    <div class="text-center">
      <p class="badge rounded-pill px-3 py-2 bg-blue text-yellow fw-bold m-0 fs-default">
        TUPOKSI
      </p>

      <h5 class="fw-bold fs-lg mt-3 mb-5">
        Tugas Pokok dan Fungsi
      </h5>
    </div>

    <div class="mx-auto">
      <a href="{{ route('umum.download.tupoksi', ['berkas' => $bidang->slug]) }}" title="Download">
        <button class="btn rounded-5 py-2 px-4 fw-bold">
          Unduh Tugas Pokok dan Fungsi
        </button>
      </a>
    </div>
    
  </div>
</div>

{{-- Berita --}}
<div class="bg-grey py-4">
  <div class="container mt-5">
    <div class="text-center">
      <p class="badge rounded-pill px-3 py-2 bg-blue text-yellow fw-bold m-0 fs-default">
        BERITA TERBARU
      </p>

      <h1 class="fs-lg fw-bold mt-3 mb-5">
        SEPUTAR {{ $bidang->nama_bidang }} DPUPR SAMARINDA
      </h1>
    </div>

    <div class="mx-3 row w-100">
      @foreach ($berita as $item)
      <div class="col-md-4 mb-4 mx-auto" data-aos="zoom-in" data-aos-duration="1000">
        <div class="card card-hover h-100 rounded-4 border-0 shadow mx-1">
          <a href="{{ 'berita/' . $item->kategori->slug }}" class="text-decoration-none">
            <div class="py-2 px-3 text-white rounded-top-4 bg-blue">
              <p class="text-center m-0 fw-bold">
                <small>
                  {{ $item->kategori->label }}
                </small>
              </p>
            </div>
          </a>

          <a href="/berita/{{ $item->slug }}" class="text-decoration-none text-black">
            <div class="img-container">
              <img src="{{ Storage::url($item->foto) }}" class="card-img-top rounded-0 wide-img" alt="test">
            </div>
          </a>

          <div class="card-body d-flex flex-column">
            <div class="mb-4">
              <h5 class="card-title fw-bold">
                {{ $item->judul }}
              </h5>

              <p class="card-text">
                {{ $item->tanggal }}
              </p>
            </div>

            <div class="mt-auto mb-1">
              <a href="{{ url('berita/') . $item->slug }}"
                class="m-0 text-decoration-none text-blue fw-semibold horizontal-blue">
                Selengkapnya
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>


    <div class="text-center mt-5 mb-5">
      <a href="{{ url('berita?kategori=' . $slugBidang) }}">
        <button class="btn rounded-5 py-2 px-4 bg-yellow text-blue fw-bold fs-md">
          Lihat Semua Berita
        </button>
      </a>
    </div>
  </div>
</div>

@endsection