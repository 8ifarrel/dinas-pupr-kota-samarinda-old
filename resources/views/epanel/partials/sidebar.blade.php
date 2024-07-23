<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary d-flex flex-column"
  style="min-height: 91.8vh">
  <div class="flex-shrink-0 p-3">
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <i class="bi bi-house-fill text-blue"></i>
        <a href="{{ route('epanel.beranda') }}"
          class="btn fw-semibold fs-md d-inline-flex align-items-center rounded border-0 d-flex">
          Beranda
        </a>
      </li>
      <li class="mb-1">
        <i class="bi bi-info-square-fill text-blue"></i>
        <button class="btn fw-semibold fs-md d-inline-flex align-items-center rounded border-0 collapsed"
          data-bs-toggle="collapse" data-bs-target="#informasi" aria-expanded="false">
          Informasi
        </button>
        <div class="collapse" id="informasi">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ route('epanel.berita.kategori') }}"
                class="link-body-emphasis d-inline-flex text-decoration-none rounded">Berita</a></li>
            <li><a href="{{ route('epanel.agenda-kegiatan.index') }}"
                class="link-body-emphasis d-inline-flex text-decoration-none rounded">Agenda Kegiatan</a></li>
            <li><a href="{{ route('epanel.pengumuman.index') }}"
                class="link-body-emphasis d-inline-flex text-decoration-none rounded">Pengumuman</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <i class="bi bi-envelope-open-fill text-blue"></i>
        <button class="btn fw-semibold fs-md d-inline-flex align-items-center rounded border-0 collapsed"
          data-bs-toggle="collapse" data-bs-target="#permohonan" aria-expanded="false">
          Permohonan
        </button>
        <div class="collapse" id="permohonan">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ route('epanel.kontak-kami.index') }}" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Kontak Kami</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Hantubanyu</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">UPTD Limbah</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <i class="bi bi-images text-blue"></i>
        <button class="btn fw-semibold fs-md d-inline-flex align-items-center rounded border-0 collapsed"
          data-bs-toggle="collapse" data-bs-target="#elibrary" aria-expanded="false">
          E-Library
        </button>
        <div class="collapse" id="elibrary">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ route('epanel.galeri') }}"
                class="link-body-emphasis d-inline-flex text-decoration-none rounded">Galeri</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Infografis</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <i class="bi bi-file-earmark-text-fill text-blue"></i>
        <a href="{{ route('epanel.ppid-pelaksana.kategori') }}"
          class="btn fw-semibold fs-md d-inline-flex align-items-center rounded border-0">
          PPID Pelaksana
        </a>
      </li>

      <div class="bg-blue my-3" style="height: 1.25px;"></div>

      <li class="mb-1">
        <i class="bi bi-file-earmark-easel-fill text-blue"></i>
        <a href="{{ route('epanel.slider.index') }}"
          class="btn fw-semibold fs-md d-inline-flex align-items-center rounded border-0">
          Slider
        </a>
      </li>
      <li class="mb-1">
        <i class="bi bi-link-45deg text-blue"></i>
        <a href="{{ route('epanel.tautan.index') }}"
          class="btn fw-semibold fs-md d-inline-flex align-items-center rounded border-0">
          Tautan
        </a>
      </li>
      {{-- <li class="mb-1">
        <i class="bi bi-card-list text-blue"></i>
        <button class="btn fw-semibold fs-md d-inline-flex align-items-center rounded border-0 collapsed"
          data-bs-toggle="collapse" data-bs-target="#profil" aria-expanded="false">
          Profil
        </button>
        <div class="collapse" id="profil">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Profil Kepala
                Dinas</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Sejarah Kota
                Samarinda</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Sejarah DPUPR Kota
                Samarinda</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Struktur
                Organisasi</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Visi dan Misi</a></li>
          </ul>
        </div>
      </li> --}}
      <li class="mb-1">
        <i class="bi bi-people-fill text-blue"></i>
        <button class="btn fw-semibold fs-md d-inline-flex align-items-center rounded border-0 collapsed"
          data-bs-toggle="collapse" data-bs-target="#kepegawaian" aria-expanded="false">
          Kepegawaian
        </button>
        <div class="collapse" id="kepegawaian">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="{{ route('epanel.pimpinan.edit') }}"
                class="link-body-emphasis d-inline-flex text-decoration-none rounded">Pimpinan</a></li>
            <li><a href="{{ route('epanel.pegawai.index') }}"
                class="link-body-emphasis d-inline-flex text-decoration-none rounded">Pegawai</a></li>
            <li><a href="{{ route('epanel.bidang.index') }}"
                class="link-body-emphasis d-inline-flex text-decoration-none rounded">Satuan Kerja</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <i class="bi bi-person-lines-fill text-blue"></i>
        <a href="{{ route('epanel.akun-admin.index') }}" class="btn fw-semibold fs-md d-inline-flex align-items-center rounded border-0">
          Akun
        </a>
      </li>
    </ul>
  </div>
</div>