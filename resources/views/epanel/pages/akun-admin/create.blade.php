@extends('epanel.layouts.main')

@section('header')
<div class="d-flex justify-content-between flex-md-nowrap align-items-center py-3 mb-3 border-bottom">
  <div>
    <h3 class="fw-semibold m-0">Tambah Akun Admin</h3>
    <p class="m-0">Tambahkan informasi untuk membuat akun admin baru</p>
  </div>
  <div class="d-flex">
    <div class="text-center">
      <a href="{{ route('epanel.akun-admin.index') }}" class="text-decoration-none">
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
  <form action="{{ route('epanel.akun-admin.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="d-flex">
      <div class="me-3 w-75">
        <div class="mb-3">
          <label for="name" class="form-label wajib-diisi">Nama</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label wajib-diisi">Username</label>
          <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
        </div>

        <div class="d-flex">
          <div class="mb-3 w-50 me-3">
            <label for="password" class="form-label wajib-diisi">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div id="passwordStrength" class="form-text"></div>
          </div>

          <div class="mb-3 w-50">
            <label for="password_confirmation" class="form-label wajib-diisi">Konfirmasi Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
              required>
          </div>
        </div>
      </div>

      <div class="w-25">
        <label for="avatar" class="form-label">Avatar</label>

        <div class="mb-3">
          <img id="avatarPreview" class="img-fluid" alt="Foto Profil" style="width: 150px">
        </div>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pilihFoto">
          Pilih foto
        </button>

        <div class="modal fade" id="pilihFoto" tabindex="-1" aria-labelledby="pilihFotoLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="pilihFotoLabel">Pilih foto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                </div>
                <div id="croppie-container"></div>
                <input type="file" class="form-control" id="avatarInput" name="avatar"
                  accept="image/jpeg,image/jpg,image/png">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="hapusFotoBtn" data-bs-dismiss="modal">Hapus
                  foto</button>
                <button type="button" class="btn btn-primary" id="cropImageBtn">Pilih Foto</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Buat Akun</button>
  </form>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

<script>
  $(document).ready(function(){
      var $uploadCrop;
  
      $('#avatarInput').on('change', function () { 
          var input = this;
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $('#avatarPreview').attr('src', e.target.result);
                  $('#pilihFoto').modal('show');
                  $('#croppie-container').addClass('ready');
                  $uploadCrop.croppie('bind', {
                      url: e.target.result
                  }).then(function(){
                      console.log('jQuery bind complete');
                  });
              }
              reader.readAsDataURL(input.files[0]);
          }
          else {
              alert("Sorry, your browser does not support FileReader API");
          }
      });
  
      $uploadCrop = $('#croppie-container').croppie({
          enableExif: true,
          viewport: {
              width: 200,
              height: 200,
              type: 'circle'
          },
          boundary: {
              width: 300,
              height: 300
          }
      });
  
      $('#cropImageBtn').on('click', function (ev) {
          $uploadCrop.croppie('result', {
              type: 'canvas',
              size: 'viewport'
          }).then(function (resp) {
              $('#avatarPreview').attr('src', resp);
              $('#pilihFoto').modal('hide');
          });
      });
  
      // Tambahkan fungsi untuk tombol "Hapus foto"
      $('#hapusFotoBtn').on('click', function () {
          $('#avatarPreview').attr('src', ''); // Menghapus foto yang dipilih
          $('#pilihFoto').modal('hide'); // Menutup modal
      });
  });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var passwordInput = document.getElementById('password');
    var passwordStrength = document.getElementById('passwordStrength');

    passwordInput.addEventListener('input', function (e) {
      var password = e.target.value;
      var result = zxcvbn(password);

      var messages = [
        'Sangat Lemah',
        'Lemah',
        'Sedang',
        'Kuat',
        'Sangat Kuat'
      ];
      var message = messages[result.score];

      var colors = [
        'text-danger',
        'text-warning',
        'text-info',
        'text-primary',
        'text-success'
      ];
      var color = colors[result.score];

      passwordStrength.textContent = 'Kekuatan Password: ' + message;
      passwordStrength.className = 'form-text ' + color;
    });
  });
</script>
@endsection