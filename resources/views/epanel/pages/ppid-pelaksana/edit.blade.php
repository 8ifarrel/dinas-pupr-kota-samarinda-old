@extends('epanel.layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('epanel.ppid-pelaksana.update', $berkas->uuid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Berkas --}}
                <div class="mb-3">
                    <label for="file" class="form-label">Berkas (PDF)</label>
                    <input type="file" class="form-control" id="file" name="file" accept=".pdf">
                </div>

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <textarea class="form-control" id="judul" name="judul" rows="2" required style="resize: none;" value="{{ $berkas->isi }}"></textarea>
                </div> 

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection