<div class="fs-md">
  <div class="my-3" style="margin-right: 100px; margin-left: 100px">
    <div class="d-flex justify-content-between container-fluid text-blue">
      {{-- Logo --}}
      <div class="d-flex justify-content-start">
        <a class="pe-2" href="{{ url('https://samarindakota.go.id/') }}">
          <img src="{{ asset('logo/pemerintah/kota-samarinda.png') }}" alt="kota-samarinda" style="width: 54px">
        </a>
        <a class="pe-2" href="{{ url('/website') }}">
          <img src="{{ asset('logo/pemerintah/dpupr-kota-samarinda.png') }}" alt="dpupr-kota-samarinda" style="height: 54px">
        </a>
        <p class="fw-bold m-0">
          DINAS PEKERJAAN UMUM DAN <br> PENATAAN RUANG KOTA SAMARINDA
        </p>
      </div>
      {{-- Jam --}}

      <div class="d-flex justify-content-end align-items-center">
        <p class="m-0 fw-bold" id="current-time"></p>
      </div>
    </div>
  </div>
</div>

{{-- Menu navbar --}}
<nav class="navbar navbar-expand-lg sticky-top bg-blue z-3">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav mx-auto my-2 my-lg-0" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active text-white" aria-current="page" href="{{ url('/website') }}">
            Beranda
          </a>
        </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Profil
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url('/profil/profil-kepala-dinas') }}">Profil Kepala Dinas</a></li>
              <li><a class="dropdown-item" href="{{ url('/profil/sejarah-kota-samarinda') }}">Sejarah Kota Samarinda</a></li>
              <li><a class="dropdown-item" href="{{ url('/profil/sejarah-dpupr-kota-samarinda') }}">Sejarah DPUPR Kota Samarinda</a></li>
              <li><a class="dropdown-item" href="{{ url('/profil/struktur-organisasi') }}">Struktur Organisasi</a></li>
              <li><a class="dropdown-item" href="{{ url('/profil/visi-dan-misi') }}">Visi dan Misi</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Informasi Dinas
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url('/pengumuman') }}">Pengumuman</a></li>
              <li><a class="dropdown-item" href="{{ url('/kategori-berita') }}">Berita</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Bidang Teknis
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url('bidang/sekretariat') }}">Sekretariat</a></li>
              <li><a class="dropdown-item" href="{{ url('bidang/bidang-bina-konstruksi') }}">Bidang Bina Konstruksi</a></li>
              <li><a class="dropdown-item" href="{{ url('bidang/bidang-bina-marga') }}">Bidang Bina Marga</a></li>
              <li><a class="dropdown-item" href="{{ url('bidang/bidang-cipta-karya') }}">Bidang Cipta Karya</a></li>
              <li><a class="dropdown-item" href="{{ url('bidang/bidang-pertanahan') }}">Bidang Pertahanan</a></li>
              <li><a class="dropdown-item" href="{{ url('bidang/bidang-sumber-daya-air') }}">Bidang Sumber Daya Air</a></li>
              <li><a class="dropdown-item" href="{{ url('bidang/bidang-tata-ruang') }}">Bidang Tata Ruang</a></li>
              <li><a class="dropdown-item" href="{{ url('bidang/uptd-pemeliharaan-jalan-dan-jembatan') }}">UPTD Pemeliharaan Jalan dan Jembatan</a></li>
              <li><a class="dropdown-item" href="{{ url('bidang/uptd-pemeliharaan-saluran-drainase-dan-irigasi') }}">UPTD Pemeliharaan Saluran Drainase dan Irigasi</a></li>
              <li><a class="dropdown-item" href="{{ url('bidang/uptd-pengelolaan-air-limbah-domestik') }}">UPTD Pengelolaan Air Limbah Domestik</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              PPID Pelaksana
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url('ppid-pelaksana/peraturan-keputusan-dan-kebijakan') }}">Peraturan Keputusan dan Kebijakan</a></li>
              <li><a class="dropdown-item" href="{{ url('ppid-pelaksana/dokumen-sakip') }}">Dokumen SAKIP</a></li>
              <li><a class="dropdown-item" href="{{ url('ppid-pelaksana/informasi-yang-wajib-disediakan-dan-diumumkan-secara-berkala') }}">Informasi yang Wajib Disediakan dan Diumumkan Secara Berkala</a></li>
              <li><a class="dropdown-item" href="{{ url('ppid-pelaksana/informasi-yang-wajib-diumumkan-secara-serta-merta') }}">Informasi yang Wajib Diumumkan Secara Serta-merta</a></li>
              <li><a class="dropdown-item" href="{{ url('ppid-pelaksana/informasi-yang-wajib-tersedia-setiap-saat') }}">Informasi yang Wajib Tersedia Setiap Saat</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown me-2">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              SKM
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url('/skm') }}">Penilaian Website</a></li>
              <li><a class="dropdown-item" href="{{ url('https://www.lapor.go.id/') }}">LAPOR!</a></li>
              <li><a class="dropdown-item" href="{{ url('https://e-kianpuas.samarindakota.go.id/survei/form/dinas-pekerjaan-umum-dan-penataan-ruang/39ba9d60-d13d-4bce-ae9e-a54316bed169') }}">Kuesioner Survei Kepuasan Masyarakat</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown me-2">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Program
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url('https://pupr.samarindakota.go.id/hantubanyu') }}">Aplikasi Hantu Banyu</a></li>
              <li><a class="dropdown-item" href="{{ url('https://pupr.samarindakota.go.id/uptdlimbah') }}">Aplikasi UPTD Limbah</a></li>
              <li><a class="dropdown-item" href="{{ url('/program/aplikasi-parit') }}">Aplikasi Parit</a></li>
              <li><a class="dropdown-item" href="{{ url('/program/uptd-jalan') }}">Aplikasi UPTD Jalan</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown me-2">
            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              E-Library
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url('/e-library/galeri') }}">Galeri</a></li>
              <li><a class="dropdown-item" href="{{ url('/e-library/video') }}">Video</a></li>
              <li><a class="dropdown-item" href="{{ url('e-library/infografis') }}">Infografis</a></li>
            </ul>
          </li>

        <li class="nav-item">
          <a href="{{ route('umum.kontak-kami.index') }}" class="bg-yellow btn fw-bold rounded-4 py-2 px-4" style="color:black">
            Kontak Kami
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>