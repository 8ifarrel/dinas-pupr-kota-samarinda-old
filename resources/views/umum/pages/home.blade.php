@extends('umum.layouts.main')

@section('container')

{{-- Gambar Slide --}}
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">

    <div class="carousel-item active" data-bs-interval="5000">
      <img src="{{ asset('img/slides/slide_3.jpg') }}" class="d-block w-100" alt="..." style="filter: brightness(35%);">
      <div class="container">
        <div class="carousel-caption d-flex justify-content-center flex-column h-100">
          <h1 class="fw-bold fs-xl pb-2">Website Resmi Dinas Pekerjaan Umum dan Penantaan Ruang Kota Samarinda</h1>
          <p class="fs-md">Selamat datang di website Dinas Pekerjaan Umum dan Penantaan Ruang Kota Samarinda, tempat
            informasi mengenai pembangunan, pemeliharaan, dan pengelolaan infrastruktur, serta tata ruang dan pengawasan
            bangunan di wilayah Kota Samarinda.</p>
        </div>
      </div>
    </div>

    <div class="carousel-item" data-bs-interval="5000">
      <img src="{{ asset('img/slides/pembukaan.png') }}" class="d-block w-100" alt="...">
    </div>

    <div class="carousel-item" data-bs-interval="5000">
      <img src="{{ asset('img/slides/jadwal.png') }}" class="d-block w-100" alt="...">
    </div>

    <div class="carousel-item" data-bs-interval="5000">
      <img src="{{ asset('img/slides/penutup.png') }}" class="d-block w-100" alt="...">
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

{{-- Sambutan Kepala Dinas --}}
<div class="p-5 bg-grey">
  <div class="p-4 d-flex">
    {{-- Biodata Kepala Dinas --}}
    <div data-aos="fade-right" data-aos-duration="1500">
      <div style="width: 625px; height: 608px;">
        <div class="d-flex justify-content-end">
          <img src="{{ asset('element/dots.svg') }}" alt="" class="position-absolute">
        </div>

        <div class="d-flex justify-content-center flex-row z-3" style="padding-top: 2rem;">
          <div class="rounded-start-pill bg-blue z-3" style="width: 530px !important;">
            <img src="{{ asset('temp/desy-damayanti-st-mt.png') }}" alt="" style="width: 530px; height: 530px;"
              class="rounded-top-pill bg-blue">
          </div>
        </div>

        <div class="shadow py-2 bg-white rounded-4">
          <p class="fw-extrabold text-center m-0 fs-md">
            DESY DAMAYANTI S.T., M.T.
          </p>

          <p class="fw-semibold text-center m-0 fs-md">
            Kepala Dinas Pekerjaan Umum dan Penataan Ruang Kota Samarinda
          </p>
        </div>
      </div>
    </div>

    {{-- Teks Sambutan --}}
    <div class="ms-5 my-auto" style="width: 40%" data-aos="fade-left" data-aos-duration="1500">
      <p class="badge rounded-pill px-3 py-2 bg-blue text-yellow fw-bold m-0 fs-default">
        SAMBUTAN
      </p>

      <h1 class="fs-lg fw-bold my-3">
        SAMBUTAN KEPALA DINAS
      </h1>

      <p class="fs-md">
        Kami menampilkan informasi dalam bentuk Pelayanan E-Goverment sehingga seluruh masyarakat dapat mengakses data
        terkait perdagangan.
      </p>

      <a href="{{ url('/profil/profil-kepala-dinas') }}">
        <button class="btn rounded-5 py-2 px-4 fw-bold fs-md">
          Lihat Profil Selengkapnya
        </button>
      </a>
    </div>
  </div>
</div>

{{-- Berita Terbaru --}}
<div class="container mt-5">
  <div class="container mt-5">
    <div class="text-center">
      <p class="badge rounded-pill px-3 py-2 bg-blue text-yellow fw-bold m-0 fs-default">
        BERITA TERBARU
      </p>

      <h1 class="fs-lg fw-bold mt-3 mb-5">
        SEPUTAR DPUPR SAMARINDA
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

          <a href="berita/{{ $item->slug }}" class="text-decoration-none text-black">
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
              <a href="/berita/{{ $item->slug }}"
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
      <a href="{{ url('/kategori-berita') }}">
        <button class="btn rounded-5 py-2 px-4 bg-yellow text-blue fw-bold fs-md">
          Lihat Semua Berita
        </button>
      </a>
    </div>
  </div>
</div>

{{-- Bidang-Bidang Kami --}}
<div class="p-5 bg-grey flex-column">
  <div class="text-center">
    <p class="badge rounded-pill px-3 py-2 bg-blue text-yellow fw-bold m-0 fs-default">
      STRUKTUR ORGANISASI
    </p>

    <h1 class="fs-lg fw-bold mt-3 mb-5">
      ORGANISASI KAMI
    </h1>
  </div>

  <div class="d-flex justify-content-center">
    <div class="mx-3 row">

      {{-- Sekretariat --}}
      <div class="d-flex justify-content-center mb-4">
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1500" style="width: 30%">
          <div class="card card-hover rounded-4 border-0 shadow mx-1">
            <a href="{{ url('/bidang/sekretariat') }}" class="text-decoration-none text-black">
              <div class="card-body d-flex align-items-start flex-column" style="height: 380px">
                <div class="mx-auto my-4">
                  <img src="{{ asset('logo/struktur-organisasi/SEKRETARIAT.png') }}" alt="" style="height: 62px"
                    class="position-absolute">

                  <img src="{{ asset('element/dot.svg') }}" alt="" class="">
                </div>

                <div class="mx-auto">
                  <h5 class="card-title fw-semibold mb-4 text-center">
                    Sekretariat
                  </h5>
                </div>

                <div class="mx-auto">
                  <p class="card-text text-center fs-md">
                    Menyusun koordinasi penyusunan program, mengelola keuangan, kepegawaian kelengkapan kantor, dan
                    administrasi
                  </p>
                </div>

                <div class="mx-auto mt-auto">
                  <p class="card-text mt-3 mb-0 text-decoration-none text-blue fw-semibold text-center">
                    Selengkapnya
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="d-flex flex-row justify-content-around mb-4">
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1500" style="width: 30%">
          <div class="card card-hover rounded-4 border-0 shadow mx-1">
            <a href="{{ url('/bidang/bidang-sumber-daya-air') }}" class="text-decoration-none text-black">
              <div class="card-body d-flex align-items-start flex-column" style="height: 380px">
                <div class="mx-auto my-4">
                  <img src="{{ asset('logo/struktur-organisasi/JSA.png') }}" alt="" style="height: 62px"
                    class="position-absolute">

                  <img src="{{ asset('element/dot.svg') }}" alt="" class="">
                </div>

                <div class="mx-auto">
                  <h5 class="card-title fw-semibold mb-4 text-center">
                    Bidang Sumber Daya Air
                  </h5>
                </div>

                <div class="mx-auto">
                  <p class="card-text text-center fs-md">
                    Mengelola sumber daya air di berbagai wilayah, termasuk sungai, bendungan, danau, irigasi, dll.,
                    untuk
                    konservasi dan kebutuhan kota.
                  </p>
                </div>

                <div class="mx-auto mt-auto">
                  <p class="card-text mt-3 mb-0 text-decoration-none text-blue fw-semibold text-center">
                    Selengkapnya
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1500" style="width: 30%">
          <div class="card card-hover rounded-4 border-0 shadow mx-1">
            <a href="{{ url('/bidang/bidang-cipta-karya') }}" class="text-decoration-none text-black">
              <div class="card-body d-flex align-items-start flex-column" style="height: 380px">
                <div class="mx-auto my-4">
                  <img src="{{ asset('logo/struktur-organisasi/CIPTAKARYA.png') }}" alt="" style="height: 62px"
                    class="position-absolute">

                  <img src="{{ asset('element/dot.svg') }}" alt="" class="">
                </div>

                <div class="mx-auto ">
                  <h5 class="card-title fw-semibold mb-4 text-center">
                    Bidang Cipta Karya
                  </h5>
                </div>

                <div class="mx-auto">
                  <p class="card-text text-center fs-md">
                    Menangani infrastruktur permukiman, bangunan, dan pengelolaan air minum, drainase,
                    air limbah, serta persampahan di kawasan strategis kota.
                  </p>
                </div>

                <div class="mx-auto mt-auto">
                  <p class="card-text mt-3 mb-0 text-decoration-none text-blue fw-semibold text-center">
                    Selengkapnya
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1500" style="width: 30%">
          <div class="card card-hover rounded-4 border-0 shadow mx-1">
            <a href="{{ url('/bidang/bidang-bina-marga') }}" class="text-decoration-none text-black">
              <div class="card-body d-flex align-items-start flex-column" style="height: 380px">
                <div class="mx-auto my-4">
                  <img src="{{ asset('logo/struktur-organisasi/BINAMARGA.png') }}" alt="" style="height: 62px"
                    class="position-absolute">

                  <img src="{{ asset('element/dot.svg') }}" alt="" class="">
                </div>

                <div class="mx-auto">
                  <h5 class="card-title fw-semibold mb-4 text-center">
                    Bidang Bina Marga
                  </h5>
                </div>

                <div class="mx-auto">
                  <p class="card-text text-center fs-md">
                    Memimpin perencanaan, pembangunan, dan preservasi jalan serta jembatan. Termasuk
                    pengamanan, penerangan jalan, dan pengendalian mutu pekerjaan.
                  </p>
                </div>

                <div class="mx-auto mt-auto">
                  <p class="card-text mt-3 mb-0 text-decoration-none text-blue fw-semibold text-center">
                    Selengkapnya
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="d-flex flex-row justify-content-around mb-4">
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1500" style="width: 30%">
          <div class="card card-hover rounded-4 border-0 shadow mx-1">
            <a href="{{ url('/bidang/bidang-bina-konstruksi') }}" class="text-decoration-none text-black">
              <div class="card-body d-flex align-items-start flex-column" style="height: 380px">
                <div class="mx-auto my-4">
                  <img src="{{ asset('logo/struktur-organisasi/KONSTRUKSI.png') }}" alt="" style="height: 62px"
                    class="position-absolute">

                  <img src="{{ asset('element/dot.svg') }}" alt="" class="">
                </div>

                <div class="mx-auto">
                  <h5 class="card-title fw-semibold mb-4 text-center">
                    Bidang Bina Konstruksi
                  </h5>
                </div>

                <div class="mx-auto">
                  <p class="card-text text-center fs-md">
                    melaksanakan kebijakan dalam pembinaan jasa konstruksi sesuai dengan peraturan perundang-undangan
                    yang
                    berlaku
                  </p>
                </div>

                <div class="mx-auto mt-auto">
                  <p class="card-text mt-3 mb-0 text-decoration-none text-blue fw-semibold text-center">
                    Selengkapnya
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1500" style="width: 30%">
          <div class="card card-hover rounded-4 border-0 shadow mx-1">
            <a href="{{ url('/bidang/bidang-tata-ruang') }}" class="text-decoration-none text-black">
              <div class="card-body d-flex align-items-start flex-column" style="height: 380px">
                <div class="mx-auto my-4">
                  <img src="{{ asset('logo/struktur-organisasi/TATARUANG.png') }}" alt="" style="height: 62px"
                    class="position-absolute">

                  <img src="{{ asset('element/dot.svg') }}" alt="" class="">
                </div>

                <div class="mx-auto">
                  <h5 class="card-title fw-semibold mb-4 text-center">
                    Bidang Tata Ruang
                  </h5>
                </div>

                <div class="mx-auto">
                  <p class="card-text text-center fs-md">
                    Menangani perumusan dan pelaksanaan aturan tata ruang sesuai kewenangan Pemerintah Kota berdasarkan
                    perundangan-undangan yang berlaku
                  </p>
                </div>

                <div class="mx-auto mt-auto">
                  <p class="card-text mt-3 mb-0 text-decoration-none text-blue fw-semibold text-center">
                    Selengkapnya
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1500" style="width: 30%">
          <div class="card card-hover rounded-4 border-0 shadow mx-1">
            <a href="{{ url('/bidang/bidang-pertanahan') }}" class="text-decoration-none text-black">
              <div class="card-body d-flex align-items-start flex-column" style="height: 380px">
                <div class="mx-auto my-4">
                  <img src="{{ asset('logo/struktur-organisasi/PERTANAHAN.png') }}" alt="" style="height: 62px"
                    class="position-absolute">

                  <img src="{{ asset('element/dot.svg') }}" alt="" class="">
                </div>

                <div class="mx-auto">
                  <h5 class="card-title fw-semibold mb-4 text-center">
                    Bidang Pertanahan
                  </h5>
                </div>

                <div class="mx-auto">
                  <p class="card-text text-center fs-md">
                    Melaksanakan koordinasi izin lokasi, redistribusi tanah, pengadaan tanah kosong, ganti rugi tanah, dan perencanaan pengunaan tanah                  </p>
                </div>

                <div class="mx-auto mt-auto">
                  <p class="card-text mt-3 mb-0 text-decoration-none text-blue fw-semibold text-center">
                    Selengkapnya
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="d-flex flex-row justify-content-around mb-4">
        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1500" style="width: 30%">
          <div class="card card-hover rounded-4 border-0 shadow mx-1">
            <a href="{{ url('/bidang/uptd-pengelolaan-air-limbah-domestik') }}" class="text-decoration-none text-black">
              <div class="card-body d-flex align-items-start flex-column" style="height: 380px">
                <div class="mx-auto my-4">
                  <img src="{{ asset('logo\struktur-organisasi\LIMBAH.png') }}" alt="" style="height: 62px"
                    class="position-absolute">

                  <img src="{{ asset('element/dot.svg') }}" alt="" class="">
                </div>

                <div class="mx-auto">
                  <h5 class="card-title fw-semibold mb-4 text-center">
                    UPTD Pengelolaan Air Limbah Domestik
                  </h5>
                </div>

                <div class="mx-auto">
                  <p class="card-text text-center fs-md">
                    Melaksanakan kegiatan teknis operasional khususnya layanan air limbah domestik
                  </p>
                </div>

                <div class="mx-auto mt-auto">
                  <p class="card-text mt-3 mb-0 text-decoration-none text-blue fw-semibold text-center">
                    Selengkapnya
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1500" style="width: 30%">
          <div class="card card-hover rounded-4 border-0 shadow mx-1">
            <a href="{{ url('/bidang/uptd-pemeliharaan-jalan-dan-jembatan') }}" class="text-decoration-none text-black">
              <div class="card-body d-flex align-items-start flex-column" style="height: 380px">
                <div class="mx-auto my-4">
                  <img src="{{ asset('logo\struktur-organisasi\uptd-jalan-dan-jembatan.png') }}" alt=""
                    style="height: 62px" class="position-absolute">

                  <img src="{{ asset('element/dot.svg') }}" alt="" class="">
                </div>

                <div class="mx-auto">
                  <h5 class="card-title fw-semibold mb-4 text-center">
                    UPTD Pemeliharaan Jalan dan Jembatan
                  </h5>
                </div>

                <div class="mx-auto">
                  <p class="card-text text-center fs-md">
                    Melaksanakan kegiatan teknis operasional khususnya pemeliharaan jalan dan jembatan
                  </p>
                </div>

                <div class="mx-auto mt-auto">
                  <p class="card-text mt-3 mb-0 text-decoration-none text-blue fw-semibold text-center">
                    Selengkapnya
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1500" style="width: 30%">
          <div class="card card-hover rounded-4 border-0 shadow mx-1">
            <a href="{{ url('/bidang/uptd-pemeliharaan-saluran-drainase-dan-irigasi') }}"
              class="text-decoration-none text-black">
              <div class="card-body d-flex align-items-start flex-column" style="height: 380px">
                <div class="mx-auto my-4">
                  <img src="{{ asset('logo\struktur-organisasi\DRAINASE.png') }}" alt="" style="height: 62px"
                    class="position-absolute">

                  <img src="{{ asset('element/dot.svg') }}" alt="" class="">
                </div>

                <div class="mx-auto">
                  <h5 class="card-title fw-semibold mb-4 text-center">
                    UPTD Pemeliharaan Saluran Drainase dan Irigasi
                  </h5>
                </div>

                <div class="mx-auto">
                  <p class="card-text text-center fs-md">
                    Melaksanakan kegiatan teknis operasional khususnya pemeliharaan saluran drainase dan irigasi                  </p>
                </div>

                <div class="mx-auto mt-auto">
                  <p class="card-text mt-3 mb-0 text-decoration-none text-blue fw-semibold text-center">
                    Selengkapnya
                  </p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Agenda Kegiatan --}}
<div class="container mt-5">
  <div class="text-center">
    <p class="badge rounded-pill px-3 py-2 bg-blue text-yellow fw-bold m-0 fs-default">
      JADWAL
    </p>

    <h1 class="fs-lg fw-bold mt-3 mb-5">
    AGENDA KEGIATAN
    </h1>
  </div>

  <livewire:agenda />

  <div class="text-center mt-4 mb-5">
    <a class="btn rounded-5 py-2 px-4 fw-bold fs-md text-decoration-none border-0" href="/agenda-selengkapnya" style="background-color: var(--yellow)">
      Lihat Agenda Selengkapnya
    </a>
  </div>
</div>

{{-- Statistik Pengunjung --}}
<div class="bg-grey py-5">
  <div class="container">
      <div class="text-center">
          <p class="badge rounded-pill px-3 py-2 bg-blue text-yellow fw-bold m-0 fs-default">
              STATISTIK
          </p>

          <h1 class="fs-lg fw-bold mt-3 mb-5">
              STATISTIK PENGUNJUNG
          </h1>
      </div>

      <div class="row w-75 mx-auto">
          <div class="col-sm-4 mb-3 mb-sm-0">
              <div class="card rounded-4 bg-blue">
                  <div class="card-body">
                      <h1 class="card-title text-yellow fs-lg fw-bold text-center">
                          HARI INI
                      </h1>
                      <p class="card-text text-yellow fs-lg fw-bold text-center">
                          {{ $statistik_pengunjung->harian ?? 0 }}
                      </p>
                  </div>
              </div>
          </div>

          <div class="col-sm-4">
              <div class="card rounded-4 bg-blue">
                  <div class="card-body">
                      <h1 class="card-title text-yellow fs-lg fw-bold text-center">
                          MINGGU INI
                      </h1>
                      <p class="card-text text-yellow fs-lg fw-bold text-center">
                          {{ $statistik_pengunjung->mingguan ?? 0 }}
                      </p>
                  </div>
              </div>
          </div>

          <div class="col-sm-4 rounded-4">
              <div class="card rounded-4 bg-blue">
                  <div class="card-body">
                      <h1 class="card-title text-yellow fs-lg fw-bold text-center">
                          BULAN INI
                      </h1>
                      <p class="card-text text-yellow fs-lg fw-bold text-center">
                          {{ $statistik_pengunjung->bulanan ?? 0 }}
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>


{{-- Partner --}}
<div class="py-5">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active d-flex justify-content-evenly">

        <section class="splide w-100" aria-labelledby="carousel-heading">
          <div class="splide__track">
            <ul class="splide__list">
              @foreach ($tautan as $item)
                <li class="splide__slide my-auto">
                  {{-- <div class=""> --}}
                    <a href="{{ $item->url }}">
                      <img src="{{ Storage::url($item->banner) }}" alt="" style="width: 260px">
                    </a>
                  {{-- </div> --}}
                </li>
              @endforeach
            </ul>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>

@endsection