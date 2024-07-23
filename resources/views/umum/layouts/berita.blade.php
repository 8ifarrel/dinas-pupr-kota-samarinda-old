@extends('umum.layouts.main')

@section('container')

<div class="p-5 bg-grey">
  <div class="text-center">
    <p class="badge rounded-pill px-3 py-2 bg-blue text-yellow fw-bold m-0 fs-default">
      BERITA
    </p>

    <h1 class="fs-lg fw-bold mt-3 mb-5">
      {{ $title }}
    </h1>
  </div>

  {{-- Kiri --}}
  <div class="row mb-5 mt-4">
    <div class="w-75">
      <div class="col">
        <div class="card rounded-5 bg-blue-18 border-0">
          <div class="card-body mt-2">
            @yield('content')

            @if (request()->is('berita/*'))
            <div class="mt-4 mb-4">
              <div class="d-flex justify-content-center align-items-center">
                <p class="fs-md m-0 mx-2">
                  {{-- TODO: .vertical-black --}}
                  Bagikan
                </p>

                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                  target="_blank">
                  <img src="{{ asset('logo/sosial-media/facebook.png') }}" alt="Facebook" style="height: 40px"
                    class="mx-2">
                </a>

                <a href="https://www.instagram.com/dpuprkotasamarinda/" target="_blank">
                  <img src="{{ asset('logo/sosial-media/instagram.svg') }}" alt="Instagram" style="height: 40px"
                    class="mx-2">
                </a>

                <a href="https://wa.me/?text={{ urlencode(url()->current()) }}" target="_blank">
                  <img src="{{ asset('logo/sosial-media/whatsapp.svg') }}" alt="WhatsApp" style="height: 40px"
                    class="mx-2">
                </a>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>

      @if (request()->is('berita/*'))
      <!-- 4 Berita Terbaru Lainnya -->

      <div class="rounded-5 bg-blue-18 border-0 mt-5">
        <h2 class="fw-bold py-4 d-flex justify-content-center">
          Berita Lainnya
        </h2>
        <div class="row row-cols-1 row-cols-md-2 g-4 pb-4 px-5">
          @foreach($berita_lainnya as $item)
          <div class="col-md-6 mb-4 mx-auto">
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

              <a href="../berita/{{ $item->slug }}" class="text-decoration-none text-black">
                <div class="img-container">
                  <img src="{{ Storage::url($item->foto) }}" class="card-img-top rounded-0 wide-img" alt="">
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
                  <a href="../berita/{{ $item->slug }}"
                    class="m-0 text-decoration-none text-blue fw-semibold horizontal-blue">
                    Selengkapnya
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @endif
    </div>

    {{-- Kanan --}}
    <div class="w-25">
      {{-- Kolom search --}}
      <div class="col mb-3">
        <div class="card rounded-5 bg-blue-18 border-0">
          <div class="card-body my-2">
            <h1 class="card-title fw-extrabold fs-md text-center mb-4">
              Cari Berita
            </h1>

            <div>
              <form action="/berita" class="input-group">
                <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                <input type="text" class="form-control border-dark rounded-pill" placeholder="Masukkan judul berita"
                  name="search" value="{{ request('search') }}">
              </form>
            </div>
          </div>
        </div>
      </div>

      {{-- Kategori lainnya --}}
      <div class="col">
        <div class="card rounded-5 bg-blue-18 border-0">
          <div class="card-body">
            <h1 class="card-title fw-extrabold fs-md text-center mb-4 mt-2">
              Kategori Lainnya
            </h1>

            <div>
              <hr>

              <a href="{{ url('berita?kategori=sekretariat') }}" class="text-decoration-none text-black">
                <p class="mb-3 fw-semibold">▷ Sekretariat</p>
              </a>

              <hr>

              <a href="{{ url('berita?kategori=bidang-sumber-daya-air') }}" class="text-decoration-none text-black">
                <p class="mb-3 fw-semibold">▷ Bidang Sumber Daya Air</p>
              </a>

              <hr>

              <a href="{{ url('berita?kategori=bidang-cipta-karya') }}" class="text-decoration-none text-black">
                <p class="mb-3 fw-semibold">▷ Bidang Cipta Karya</p>
              </a>

              <hr>

              <a href="{{ url('berita?kategori=bidang-bina-marga') }}" class="text-decoration-none text-black">
                <p class="mb-3 fw-semibold">▷ Bidang Bina Marga</p>
              </a>

              <hr>

              <a href="{{ url('berita?kategori=bidang-bina-konstruksi') }}" class="text-decoration-none text-black">
                <p class="mb-3 fw-semibold">▷ Bidang Bina Konstruksi</p>
              </a>

              <hr>

              <a href="{{ url('berita?kategori=bidang-tata-ruang') }}" class="text-decoration-none text-black">
                <p class="mb-3 fw-semibold">▷ Bidang Tata Ruang</p>
              </a>

              <hr>

              <a href="{{ url('berita?kategori=bidang-pertanahan') }}" class="text-decoration-none text-black">
                <p class="mb-3 fw-semibold">▷ Bidang Pertanahan</p>
              </a>

              <hr>

              <a href="{{ url('berita?kategori=uptd-pengelolaan-air-limbah-domestik') }}"
                class="text-decoration-none text-black">
                <p class="mb-3 fw-semibold">▷ UPTD Pengelolaan Air Limbah Domestik</p>
              </a>

              <hr>

              <a href="{{ url('berita?kategori=uptd-pemeliharaan-jalan-dan-jembatan') }}"
                class="text-decoration-none text-black">
                <p class="mb-3 fw-semibold">▷ UPTD Pemeliharaan Jalan dan Jembatan</p>


                <hr>
                <a href="{{ url('berita?kategori=uptd-pemeliharaan-saluran-drainase-dan-irigasi') }}"
                  class="text-decoration-none text-black">
                  <p class="fw-semibold">▷ UPTD Pemeliharaan Saluran Drainase dan Irigasi</p>
                  <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection