@extends('epanel.layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('epanel.slider.update', $slider->uuid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    @if ($slider->foto)
                        <img src="{{ Storage::url($slider->foto) }}" alt="Foto" style="max-width: 200px; margin-top: 10px;">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $slider->judul }}" required>
                </div>
                <div class="mb-3">
                    <label for="kete    rangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required>{{ $slider->keterangan }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
