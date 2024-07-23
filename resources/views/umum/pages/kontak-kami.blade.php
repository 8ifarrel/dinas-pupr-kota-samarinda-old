  @extends('umum.layouts.main')

  @section('container')
  <div class="p-5 bg-grey">
    <div class="text-center">
      <p class="badge rounded-pill px-3 py-2 bg-blue text-yellow fw-bold m-0 fs-default">
        PELAYANAN
      </p>

      <h1 class="fs-lg fw-bold mt-3 mb-5">
        KONTAK KAMI
      </h1>
    </div>

    <div class="d-flex justify-content-center">
      <div class="col-md-6">
        <form action="{{ route('umum.kontak-kami.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control border-black" id="nama" name="nama">
          </div>
          <div class="d-flex">
            <div class="mb-3 w-50 me-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control border-black" id="email" name="email">
            </div>
            <div class="mb-3 w-50">
              <label for="telepon" class="form-label">Telepon</label>
              <input type="tel" class="form-control border-black" id="telepon" name="telepon">
            </div>
          </div>
          <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control border-black" id="pesan" name="pesan" rows="5"></textarea>
          </div>

          <div class="d-flex justify-content-center">
            <button type="submit" class="btn rounded-5 mt-4 py-2 px-4 fw-bold fs-md">
              Kirim Pesan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endsection