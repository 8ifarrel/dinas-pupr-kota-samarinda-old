@extends('umum.layouts.main')

@section('container')

<div class="d-flex justify-content-center flex-column mt-5">
    <div class="text-center">
        <p class="badge rounded-pill px-3 py-2 bg-blue text-yellow fw-bold m-0 fs-default">
            Galeri
        </p>

        <h1 class="fs-lg fw-bold mt-3 mb-5">
            Video
        </h1>
    </div>

    <div class="d-flex justify-content-center ">
        <div class="elfsight-app-07db6e59-42bd-4fce-a2e5-efd8ff7ba8b1" data-elfsight-app-lazy></div>
    </div>
</div>

@endsection

<script src="{{ asset('js/video.js') }}" data-use-service-core defer></script>

<link rel="stylesheet" href="css/video.css">