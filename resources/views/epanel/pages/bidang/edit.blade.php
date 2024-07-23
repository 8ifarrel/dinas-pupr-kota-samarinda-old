@extends('epanel.layouts.main')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<form action="{{ route('epanel.bidang.update', $bidang->uuid) }}" method="POST">
				@csrf
                @method('PUT')

				{{-- Label --}}
				<div class="mb-3">
					<label for="label" class="form-label">Label</label>
					<input type="text" class="form-control" id="label" name="label" value="{{ $bidang->label }}" required>
				</div>

				{{-- Jabatan --}}
				<div class="mb-3">
					<label for="jabatan" class="form-label">Jabatan</label>
					<input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $bidang->jabatan }}" required>
				</div>

				{{-- Atasan Langsung --}}
                <div class="mb-3">
                    <label for="id_parent" class="form-label">Atasan Langsung</label>
                    <select class="form-select" id="id_parent" name="id_parent" required>
                        <option value="">Pilih Atasan Langsung</option>
                        @foreach ($bidangList as $item)
                            <option value="{{ $item->id }}" {{ $bidang->id_parent == $item->id ? 'selected' : '' }}>{{ $item->label }}</option>
                        @endforeach
                    </select>
                </div>
                

				{{-- Tupoksi --}}
				<div class="mb-3">
					<label for="tupoksi" class="form-label">Tupoksi</label>
					<input type="hidden" id="tupoksi" name="tupoksi" value="{{ $bidang->tupoksi}}">
					<trix-editor input="tupoksi">{{ $bidang->tupoksi }}</trix-editor>
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
