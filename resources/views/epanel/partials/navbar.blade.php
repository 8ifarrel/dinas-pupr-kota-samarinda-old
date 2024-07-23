<header class="navbar sticky-top flex-md-nowrap p-0 shadow bg-blue py-2 px-3 d-flex justify-content-between">
  {{-- Kiri --}}
  <div class="d-flex justify-content-start">
    <a class="pe-2" href="{{ url('/') }}">
      <img src="{{ asset('logo/pemerintah/dpupr-kota-samarinda.png') }}" alt="dpupr-kota-samarinda"
        style="height: 40px">
    </a>
    <div class="d-flex flex-column">
      <p class="fw-bold fs-md m-0 text-white">
        E-PANEL
      </p>
      <p class="m-0 text-white fw-semibold" style="font-size: 10px">
        Dinas Pekerjaan Umum dan Penataan Ruang Kota Samarinda
      </p>
    </div>
  </div>

  {{-- Dropdown akun (Kanan) --}}
  <div class="d-flex justify-content-end text-white">
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ Auth::user()->name }}
      </button>
      <ul class="dropdown-menu">
        <li>
          <form class="dropdown-item" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn">
              Logout
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</header>