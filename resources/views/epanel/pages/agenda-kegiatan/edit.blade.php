@extends('epanel.layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('epanel.agenda-kegiatan.update', $agendaKegiatan->uuid) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Kegiatan</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $agendaKegiatan->nama }}" required>
                </div>

                {{-- Waktu --}}
                <div class="mb-3">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="time" class="form-control" id="waktu" name="waktu" value="{{ $agendaKegiatan->waktu }}" required>
                </div>

                {{-- Tempat --}}
                <div class="mb-3">
                    <label for="tempat" class="form-label">Tempat</label>
                    <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $agendaKegiatan->tempat }}" required>
                </div>

                {{-- Dihadiri oleh --}}
                <div class="mb-3">
                    <label for="dihadiri_oleh" class="form-label">Dihadiri Oleh</label>
                    <input type="text" class="form-control" id="dihadiri_oleh" name="dihadiri_oleh" value="{{ $agendaKegiatan->dihadiri_oleh }}" required>
                </div>

                {{-- Tanggal --}}
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $agendaKegiatan->tanggal }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
