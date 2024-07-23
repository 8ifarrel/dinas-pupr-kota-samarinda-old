@extends('umum.layouts.newsboard')

@section('container')
{{-- Navbar --}}
<nav class="d-flex justify-content-between mx-4">
  {{-- Logo --}}
  <div>
    <div class="d-flex justify-content-start">
      <a class="pe-2" href="{{ url('https://samarindakota.go.id/') }}">
        <img src="{{ asset('logo/pemerintah/kota-samarinda.png') }}" alt="kota-samarinda" style="width: 54px">
      </a>
      <a class="pe-2" href="{{ url('/website') }}">
        <img src="{{ asset('logo/pemerintah/dpupr-kota-samarinda.png') }}" alt="dpupr-kota-samarinda"
          style="height: 54px">
      </a>
      <p class="fw-bold m-0">
        DINAS PEKERJAAN UMUM DAN <br> PENATAAN RUANG KOTA SAMARINDA
      </p>
    </div>
  </div>

  {{-- Jam --}}
  <div class="d-flex justify-content-end align-items-center">
    <p class="fs-2 m-0 fw-bold" id="current-time"></p>
  </div>
</nav>

<div class="d-flex justify-content-between mt-5 mx-4">
  {{-- Youtube --}}
  <div>
    <iframe width="576" height="324"
      src="https://www.youtube.com/embed/qx0Db-I8RJc?autoplay=1&loop=1&mute=1&controls=0">
    </iframe>
  </div>

  {{-- Slider --}}
  <div class="mx-4">
    <div class="p-2 mx-auto" style="background-color: var(--blue) ">
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

          <div class="carousel-item active" data-bs-interval="5000">
            <img src="{{ asset('img/slides/pembukaan.png') }}" class="d-block w-100" alt="...">
          </div>

          <div class="carousel-item" data-bs-interval="5000">
            <img src="{{ asset('img/slides/jadwal.png') }}" class="d-block w-100" alt="...">
          </div>

          <div class="carousel-item" data-bs-interval="5000">
            <img src="{{ asset('img/slides/penutup.png') }}" class="d-block w-100" alt="...">
          </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>

  {{-- Struktur Organisasi --}}
  <div class="w-100 m-auto p-2 rounded" style="background-color: var(--blue); height: 324px;">
    <div class="h-100 py-2 d-flex align-items-center flex-column rounded" style="background-color: white">
      <div class="my-auto">
        <div class="">
          <h3 class="text-center mb-3 m-0 p-0 fw-bold">
            Struktur Organisasi <br>
            DPUPR Kota Samarinda
          </h3>
        </div>

        <div class="mx-2">
          {{-- <img class="img-fluid" src="{{ asset('img/newsboard/apalah.png') }}" alt=""> --}}
          <div class="border border-black rounded" style="background-color: #d6d2c46f; width: 500px">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner rounded">
                @foreach ($personil as $key => $item)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }} rounded">
                  <div class="d-flex">
                    <img src="{{ Storage::url($item->foto) }}" class="m-3 rounded" alt="..."
                      style="width: 162px; height: 169px;">
                    <div class="my-auto text-center w-100">
                      <h1 class="fs-3 fw-bold" style="color: var(--yellow);">{{ $item->bidang->label }}</h1>
                      <h1 class="fs-5 fw-bold">{{ $item->nama }}</h1>
                      <h1 class="fs-5 fw-bold">{{ $item->nip }}</h1>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="d-flex justify-content-between mt-4 mx-4">
  {{-- LPSE --}}
  <div class="m-auto p-2 rounded me-4" style="background-color: var(--blue); height: 365.5px; width: 40%;">
    <div class="h-100 py-2 d-flex align-items-center flex-column rounded" style="background-color: white">
      <h3 class="fw-bold ">LPSE Kota Samarinda</h3>
      <table class="table">
        <thead class="z-3">
          <tr>
            <th class="text-center" scope="col" style="background-color: var(--yellow);">KODE</th>
            <th class="text-center" scope="col" style="background-color: var(--yellow);">NAMA KEGIATAN</th>
            <th class="text-center" scope="col" style="background-color: var(--yellow); width: 170px">HPS</th>
          </tr>
        </thead>
      </table>
      <div class="scrollable-table-2">
        <table class="table">
          <thead class="d-none">
            <tr>
              <th class="text-center" scope="col" style="background-color: var(--yellow);">KODE</th>
              <th class="text-center" scope="col" style="background-color: var(--yellow);">NAMA KEGIATAN</th>
              <th class="text-center" scope="col" style="background-color: var(--yellow); width: 170px">HPS</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>6565596</td>
              <td>Peningkatan Saluran Drainase Jl. Perjuangan Gg. Ramonas RT. 37, Kel. Mugirejo, Kec. Sungai Pinang
                (P-APBD 2023)</td>
              <td>Rp. 1.045.000.00000</td>
            </tr>
            <tr>
              <td>6687596</td>
              <td>Lanjutan Peningkatan Jalan Rimbawan Dalam Tanah Merah (APBD-P 2023)</td>
              <td>Rp. 1.051.889.69780</td>
            </tr>
            <tr>
              <td>6339596</td>
              <td>Peningkatan Jalan Purworejo Cluster Kruing CS Kec. Samarinda Utara</td>
              <td>Rp. 1.095.945.18500</td>
            </tr>
            <tr>
              <td>6603596</td>
              <td>Peningkatan Jalan Pemuda 3 Kel. Temindung Permai Kec. Sungai Pinang (APBD-P 2023)</td>
              <td>Rp. 1.099.934.90624</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{-- Agenda Kegiatan --}}
  <div class="m-auto p-2 rounded" style="background-color: var(--blue); height: 365.5px; width: 60%;">
    <div class="h-100 py-2 d-flex align-items-center flex-column rounded" style="background-color: white">
      <h3 class="fw-bold ">Agenda Kegiatan Harian</h3>
      <table class="table">
        <thead class="z-3">
          <tr>
            <th class="text-center" scope="col" style="background-color: var(--yellow);">KEGIATAN</th>
            <th class="text-center" scope="col" style="background-color: var(--yellow); width: 100px;">WAKTU</th>
            <th class="text-center" scope="col" style="background-color: var(--yellow);">TEMPAT</th>
            <th class="text-center" scope="col" style="background-color: var(--yellow); width: 30%;">DIHADIRI OLEH
            </th>
          </tr>
        </thead>
      </table>
      <div class="scrollable-table">
        <table class="table">
          <thead class="d-none">
            <tr>
              <th class="text-center" scope="col" style="background-color: var(--yellow);">KEGIATAN</th>
              <th class="text-center" scope="col" style="background-color: var(--yellow); width: 100px;">WAKTU</th>
              <th class="text-center" scope="col" style="background-color: var(--yellow);">TEMPAT</th>
              <th class="text-center" scope="col" style="background-color: var(--yellow); width: 30%;">DIHADIRI OLEH
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($agenda_kegiatan as $item)
            <tr>
              <td>{{ \Illuminate\Support\Str::limit($item->nama, 90) }}</td>
              <td>{{ $item->waktu }}</td>
              <td>{{ \Illuminate\Support\Str::limit($item->tempat, 75) }}</td>
              <td>{{ \Illuminate\Support\Str::limit($item->dihadiri_oleh, 80) }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="d-flex align-items-end mt-4 pt-2 px-2 rounded-top-5" style="height: 215.3px; background-color: var(--blue)">
  <div class="h-100 w-100 rounded-top-5 h-100" style="background-color: white">
    <h2 class="ps-4 pt-3 fw-bold mb-3 text-center">Foto-Foto Kegiatan</h2>
    <div class="d-flex justify-content-around align-items-center">
      {{-- @foreach ($foto as $item)
      <div class="ratio ratio-16x9" style="max-width: 200px;">
        <img src="{{ Storage::url($item->foto->sortByDesc('created_at')->first()->foto) }}" class="img-fluid rounded-4"
          style="object-fit: cover;">
      </div>
      @endforeach --}}
      <section class="splide w-100" aria-labelledby="carousel-heading">
        <div class="splide__track">
          <ul class="splide__list">
            @foreach ($foto as $item)
            <li class="splide__slide">
              <div class="ratio ratio-16x9" style="width: 200px;">
                <img src="{{ Storage::url($item->foto->sortByDesc('created_at')->first()->foto) }}"
                  class="img-fluid rounded-4" style="object-fit: cover;">
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </section>
    </div>
  </div>
</div>

@endsection