@extends('epanel.layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('epanel.ppid-pelaksana.store', ['kategori' => request()->query('kategori')]) }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Berkas --}}
                <div class="mb-3">
                    <label for="file" class="form-label">Berkas (PDF)</label>
                    <input type="file" class="form-control" id="file" name="file" accept=".pdf">
                </div>

                {{-- Judul --}}
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <textarea class="form-control" id="judul" name="judul" rows="2" required style="resize: none;"></textarea>
                </div> 

                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>

@endsection