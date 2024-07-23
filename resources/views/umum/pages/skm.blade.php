@extends('umum.layouts.main')

@section('container')

<div class="bg-grey py-4">
  <div class="container mt-5">
    <div class="text-center">
      <p class="badge rounded-pill px-3 py-2 bg-blue text-yellow fw-bold m-0 fs-default">
        Penilaian
      </p>

      <h1 class="fs-lg fw-bold mt-3 mb-5">
        Survei Kepuasan Masyarakat
      </h1>
    </div>
  </div>

  {{-- Rata-rata --}}
  <div class="d-flex justify-content-center mb-5">
    <p class="badge rounded-4 p-3 bg-yellow text-blue fw-semibold m-0 fs-md">
      Indeks Kepuasan Masyarakat:
      <span class="fw-extrabold fs-md">
        <span>
          {{ $rerata }}/4
        </span>
      </span>
    </p>
  </div>

  <form action="{{ url('/skm') }}" method="POST">
    @csrf
    <div class="list-group d-flex flex-row border border-0 rounded-0 container text-center">
      <input type="radio" name="nilai" value="1" id="tidak-puas">
      <label
        class="list-group-item list-group-item-action border-0 mx-4 d-flex flex-column fw-semibold rounded-4 shadow fs-md"
        for="tidak-puas">
        <video width="100" height="100" preload="none"
          style="background: transparent  url('https://cdn-icons-png.flaticon.com/512/11175/11175771.png') 50% 50% / fit no-repeat;"
          autoplay="autoplay" loop="true" muted="muted" playsinline="" class="mx-auto my-2">
          <source src="https://cdn-icons-mp4.flaticon.com/512/11175/11175771.mp4" type="video/mp4">
        </video>

        Tidak Puas
      </label>

      <input type="radio" name="nilai" value="2" id="biasa-saja">
      <label
        class="list-group-item list-group-item-action border-0 mx-4 d-flex flex-column fw-semibold rounded-4 shadow fs-md"
        for="biasa-saja">
        <video width="100" height="100" preload="none"
          style="background: transparent  url('https://cdn-icons-png.flaticon.com/512/11175/11175745.png') 50% 50% / fit no-repeat;"
          autoplay="autoplay" loop="true" muted="muted" playsinline="" _idm_id_="958466" class="mx-auto my-2">
          <source src="https://cdn-icons-mp4.flaticon.com/512/11175/11175745.mp4" type="video/mp4">
        </video>

        Biasa Saja
      </label>

      <input type="radio" name="nilai" value="3" id="puas">
      <label
        class="list-group-item list-group-item-action border-0 mx-4 d-flex flex-column fw-semibold rounded-4 shadow fs-md"
        for="puas">
        <video width="100" height="100" preload="none"
          style="background: transparent  url('https://cdn-icons-png.flaticon.com/512/11175/11175727.png') 50% 50% / fit no-repeat;"
          autoplay="autoplay" loop="true" muted="muted" playsinline="" _idm_id_="958467" class="mx-auto my-2">
          <source src="https://cdn-icons-mp4.flaticon.com/512/11175/11175727.mp4" type="video/mp4">
        </video>

        Puas
      </label>

      <input type="radio" name="nilai" value="4" id="sangat-puas">
      <label
        class="list-group-item list-group-item-action border-0 mx-4 d-flex flex-column fw-semibold rounded-4 shadow fs-md"
        for="sangat-puas">
        <video width="100" height="100" preload="none"
          style="background: transparent  url('https://cdn-icons-png.flaticon.com/512/11175/11175766.png') 50% 50% / fit no-repeat;"
          autoplay="autoplay" loop="true" muted="muted" playsinline="" _idm_id_="958465" class="mx-auto my-2">
          <source src="https://cdn-icons-mp4.flaticon.com/512/11175/11175766.mp4" type="video/mp4">
        </video>

        Sangat Puas
      </label>
    </div>

    <div class="d-flex justify-content-center my-5">
      <button class="btn rounded-5 py-2 px-4 bg-yellow text-blue fw-bold fs-md">
        Kirim Survei
      </button>
    </div>
  </form>
</div>

@endsection