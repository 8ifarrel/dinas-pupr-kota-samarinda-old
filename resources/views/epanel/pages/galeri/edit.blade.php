@extends('epanel.layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('epanel.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Judul --}}
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Galeri</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $galeri->judul }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Galeri</button>
            </form>
        </div>
    </div>
</div>

@endsection
