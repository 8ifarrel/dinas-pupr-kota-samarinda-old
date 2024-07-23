@extends('epanel.layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('epanel.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Judul --}}
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Galeri</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Galeri</button>
            </form>
        </div>
    </div>
</div>

@endsection