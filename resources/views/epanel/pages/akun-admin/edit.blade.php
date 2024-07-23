@extends('epanel.layouts.main')

@section('header')
<div class="d-flex justify-content-between flex-md-nowrap align-items-center py-3 mb-3 border-bottom">
  <div>
    <h3 class="fw-semibold m-0">Edit Akun Admin</h3>
    <p class="m-0">Edit informasi akun admin yang sudah terdaftar</p>
  </div>
  <div class="d-flex">
    <div class="text-center">
      <a type="button" onclick="history.back();" class="text-decoration-none">
        <i class="fa-solid fa-chevron-left fa-2xl mb-3 text-secondary"></i>
        <p class="m-0 text-secondary fw-semibold">
          <small>
            Kembali
          </small>
        </p>
      </a>
    </div>
  </div>
</div>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <form action="{{ route('epanel.akun-admin.update', $akun->uuid) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="d-flex">
        <div class="mb-3 w-50 me-3">
          <label for="name" class="form-label wajib-diisi">Nama</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $akun->name }}" required>
        </div>
        <div class="mb-3 w-50">
          <label for="username" class="form-label wajib-diisi">Username</label>
          <input type="text" class="form-control" id="username" name="username" value="{{ $akun->username }}" required>
        </div>
      </div>
      <hr>
      <div class="mb-3">
        <label for="old_password" class="form-label wajib-diisi">Password Lama</label>
        <input type="password" class="form-control" id="old_password" name="old_password" required>
      </div>
      <div class="d-flex">
        <div class="mb-3 w-50 me-3">
          <label for="password" class="form-label wajib-diisi">Password Baru</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3 w-50">
          <label for="password_confirmation" class="form-label wajib-diisi">Konfirmasi Password Baru</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection