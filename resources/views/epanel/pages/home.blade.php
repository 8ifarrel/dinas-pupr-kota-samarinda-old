@extends('epanel.layouts.main')

@section('header')

<div class="d-flex justify-content-between flex-md-nowrap align-items-center py-3 mb-3 border-bottom">
	<div>
		<h3 class="fw-semibold m-0">{{ $title }}</h3>
	</div>
</div>

@endsection

@section('content')

{{-- Statistik Keseluruhan --}}
<div class="mx-3 row w-100">

  <div class="col-md-3 mb-4">
    <a href="{{ route('epanel.berita.kategori') }}" class="card card-hover h-100 rounded-3 border-0 shadow mx-1 text-decoration-none">
      <div class="card-body d-flex flex-column">
        <p class="text-center m-0 fs-xl fw-semibold">
          {{ $banyak_berita_keseluruhan }}
        </p>

        <p class="text-center m-0 fs-md fw-semibold">
          Berita
        </p>

        <small class="text-center">
          Keseluruhanf
        </small>
      </div>
    </a>
  </div>
  <div class="col-md-3 mb-4">
    <a href="{{ route('epanel.agenda-kegiatan.index') }}" class="card card-hover h-100 rounded-3 border-0 shadow mx-1 text-decoration-none">
      <div class="card-body d-flex flex-column">
        <p class="text-center m-0 fs-xl fw-semibold">
          {{ $banyak_agenda_kegiatan_keseluruhan }}
        </p>

        <p class="text-center m-0 fs-md fw-semibold">
          Agenda Kegiatan
        </p>

        <small class="text-center">
          Keseluruhan
        </small>
      </div>
    </a>
  </div>
  <div class="col-md-3 mb-4">
    <a href="{{ route('epanel.pengumuman.index') }}" class="card card-hover h-100 rounded-3 border-0 shadow mx-1 text-decoration-none">
      <div class="card-body d-flex flex-column">
        <p class="text-center m-0 fs-xl fw-semibold">
          {{ $banyak_pengumuman_keseluruhan }}
        </p>

        <p class="text-center m-0 fs-md fw-semibold">
          Pengumuman
        </p>

        <small class="text-center">
          Keseluruhan
        </small>
      </div>
    </a>
  </div>
  <div class="col-md-3 mb-4">
    <a href="{{ route('epanel.kontak-kami.index') }}" class="card card-hover h-100 rounded-3 border-0 shadow mx-1 text-decoration-none">
      <div class="card-body d-flex flex-column">
        <p class="text-center m-0 fs-xl fw-semibold">
          {{ $banyak_feedback_keseluruhan }}
        </p>

        <p class="text-center m-0 fs-md fw-semibold">
          Feedback
        </p>

        <small class="text-center">
          Keseluruhan
        </small>
      </div>
    </a>
  </div>
</div>

{{-- Statistik minggu ini --}}
<div class="mx-3 row w-100">

  <div class="col-md-3 mb-4">
    <a href="{{ route('epanel.berita.kategori') }}" class="card card-hover h-100 rounded-3 border-0 shadow mx-1 text-decoration-none">
      <div class="card-body d-flex flex-column">
        <p class="text-center m-0 fs-xl fw-semibold">
          {{ $banyak_berita_minggu_ini }}
        </p>

        <p class="text-center m-0 fs-md fw-semibold">
          Berita
        </p>

        <small class="text-center">
          Pada minggu ini
        </small>
      </div>
    </a>
  </div>
  <div class="col-md-3 mb-4">
    <a href="{{ route('epanel.agenda-kegiatan.index') }}" class="card card-hover h-100 rounded-3 border-0 shadow mx-1 text-decoration-none">
      <div class="card-body d-flex flex-column">
        <p class="text-center m-0 fs-xl fw-semibold">
          {{ $banyak_agenda_kegiatan_minggu_ini }}
        </p>

        <p class="text-center m-0 fs-md fw-semibold">
          Agenda Kegiatan
        </p>

        <small class="text-center">
          Pada minggu ini
        </small>
      </div>
    </a>
  </div>
  <div class="col-md-3 mb-4">
    <a href="{{ route('epanel.pengumuman.index') }}" class="card card-hover h-100 rounded-3 border-0 shadow mx-1 text-decoration-none">
      <div class="card-body d-flex flex-column">
        <p class="text-center m-0 fs-xl fw-semibold">
          {{ $banyak_pengumuman_minggu_ini }}
        </p>

        <p class="text-center m-0 fs-md fw-semibold">
          Pengumuman
        </p>

        <small class="text-center">
          Pada minggu ini
        </small>
      </div>
    </a>
  </div>
  <div class="col-md-3 mb-4">
    <a href="{{ route('epanel.kontak-kami.index') }}" class="card card-hover h-100 rounded-3 border-0 shadow mx-1 text-decoration-none">
      <div class="card-body d-flex flex-column">
        <p class="text-center m-0 fs-xl fw-semibold">
          {{ $banyak_feedback_minggu_ini }}
        </p>

        <p class="text-center m-0 fs-md fw-semibold">
          Feedback
        </p>

        <small class="text-center">
          Pada minggu ini
        </small>
      </div>
    </a>
  </div>

</div>

@endsection