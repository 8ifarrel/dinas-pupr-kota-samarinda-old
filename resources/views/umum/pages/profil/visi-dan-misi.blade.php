@extends('umum.layouts.profil')

@section('content')

{{-- Visi --}}
<div>
  <p class="fs-md fw-bold m-0">
    Visi Dinas Pekerjaan Umum dan Penataan Ruang Kota Samarinda Tahun 2021-2026
  </p>

  <p class="horizontal-black"></p>

  <div class="d-flex">
    <img src="{{ asset('assets/element/quotation-mark-left.svg') }}" alt="">

    <p class="m-0 fs-md fst-italic mx-2 fw-medium">
      TERWUJUDNYA SAMARINDA SEBAGAI KOTA PUSAT PERADABAN
    </p>

    <img src="{{ asset('assets/element/quotation-mark-right.svg') }}" alt="">
  </div>

</div>

{{-- Misi --}}
<div class="mt-5">
  <p class="fs-md fw-bold m-0">
    Misi Dinas Pekerjaan Umum dan Penataan Ruang Kota Samarinda Tahun 2021-2026
  </p>

  <p class="horizontal-black"></p>

  <p>
    Untuk mewujudkan Visi Walikota Samarinda Dinas Pekerjaan Umum Dan Penataan Ruang Kota Samarinda, melaksanakan misi sebagai berikut:
  </p>

  <div class="d-flex mb-3">
    <div class="card rounded-2 me-2 bg-blue d-flex border-0" style="height: 40px; width: 40px;">
      <p class="fw-bold fs-md text-center text-white my-auto">
        1
      </p>
    </div>
  
    <p class="fs-default my-auto" style="width: 90%">
      Mewujudkan masyarakat kota yang religious, unggul dan berbudaya;
    </p>
  </div>  

  <div class="d-flex mb-3">
    <div class="card rounded-2 me-2 bg-blue d-flex border-0" style="height: 40px; width: 40px;">
      <p class="fw-bold fs-md text-center text-white my-auto">
        2
      </p>
    </div>
  
    <p class="fs-default my-auto" style="width: 90%">
      Mewujudkan perekonomian kota yang maju, mandiri, berkerakyatan dan berkeadilan; 
    </p>
  </div>  

  <div class="d-flex mb-3">
    <div class="card rounded-2 me-2 bg-blue d-flex border-0" style="height: 40px; width: 40px;">
      <p class="fw-bold fs-md text-center text-white my-auto">
        3
      </p>
    </div>
  
    <p class="fs-default my-auto" style="width: 90%">
      Mewujudkan pemerintahan yang professional, transparan, akuntabel dan bebas korupsi dengan memberi ruang bagi partisipasi masyarakat;  
    </p>
  </div>  

  <div class="d-flex mb-3">
    <div class="card rounded-2 me-2 bg-blue d-flex border-0" style="height: 40px; width: 40px;">
      <p class="fw-bold fs-md text-center text-white my-auto">
        4
      </p>
    </div>
  
    <p class="fs-default my-auto" style="width: 90%">
      Mewujudkan infrastruktur yang mantap dan modern; dan 
    </p>
  </div>  

  <div class="d-flex mb-3">
    <div class="card rounded-2 me-2 bg-blue d-flex border-0" style="height: 40px; width: 40px;">
      <p class="fw-bold fs-md text-center text-white my-auto">
        5
      </p>
    </div>
  
    <p class="fs-default my-auto" style="width: 90%">
      Mewujudkan lingkungan kota yang aman, nyaman, harmoni dan lestari. 
    </p>
  </div>  
</div>

@endsection