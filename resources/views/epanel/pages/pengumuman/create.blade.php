@extends('epanel.layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('epanel.pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Judul --}}
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>

                {{-- Perihal --}}
                <div class="mb-3">
                    <label for="perihal" class="form-label">Perihal</label>
                    <input type="hidden" id="perihal" name="perihal">
                    <trix-editor input="perihal"></trix-editor>
                </div>

                {{-- Lampiran --}}
                <div class="mb-3">
                    <label for="lampiran" class="form-label">Lampiran</label>
                    <input type="file" class="form-control" id="lampiran" name="lampiran" accept="application/pdf">
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>

@endsection

<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

<style>
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }
</style>
