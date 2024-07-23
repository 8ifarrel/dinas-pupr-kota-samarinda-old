@extends('epanel.layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('epanel.pegawai.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Foto --}}
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                </div>

                {{-- NIP --}}
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" required>
                </div>

                {{-- Nama Pegawai --}}
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pegawai</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                {{-- Telepon --}}
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" required>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>

                {{-- Alamat --}}
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>

                {{-- Tupoksi --}}
                <div class="mb-3">
                    <label for="tupoksi" class="form-label">Tupoksi</label>
                    <textarea class="form-control" id="tupoksi" name="tupoksi" rows="3" required></textarea>
                </div>

                {{-- Golongan --}}
                <div class="mb-3">
                    <label for="golongan" class="form-label">Golongan</label>
                    <input type="text" class="form-control" id="golongan" name="golongan" required>
                </div>

                {{-- Bidang --}}
                <div class="mb-3">
                    <label for="id_bidang" class="form-label">Bidang</label>
                    <select class="form-control" id="id_bidang" name="id_bidang" required>
                        @foreach($bidangList as $bidang)
                            <option value="{{ $bidang->id }}">{{ $bidang->label }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
