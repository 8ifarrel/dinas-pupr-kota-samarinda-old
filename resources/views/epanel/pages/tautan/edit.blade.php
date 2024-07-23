@extends('epanel.layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('epanel.tautan.update', $tautan->uuid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="banner" class="form-label">banner</label>
                    <input type="file" class="form-control" id="banner" name="banner" accept="image/*">
                    @if ($tautan->banner)
                        <img src="{{ Storage::url($tautan->banner) }}" alt="banner" style="max-width: 200px; margin-top: 10px;">
                    @endif
                </div>
                <div class="mb-3">
                    <label for="label" class="form-label">label</label>
                    <input type="text" class="form-control" id="label" name="label" value="{{ $tautan->label }}" required>
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label">url</label>
                    <textarea class="form-control" id="url" name="url" rows="3" required>{{ $tautan->url }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection