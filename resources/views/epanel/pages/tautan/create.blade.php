@extends('epanel.layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('epanel.tautan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="banner" class="form-label">banner</label>
                    <input type="file" class="form-control" id="banner" name="banner" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label for="label" class="form-label">label</label>
                    <input type="text" class="form-control" id="label" name="label" required>
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label">url</label>
                    <textarea class="form-control" id="url" name="url" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection