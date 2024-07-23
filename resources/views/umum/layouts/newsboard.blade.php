<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dinas Pekerjaan Umum dan Penataan Ruang Kota Samarinda</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/main.css') }}">

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  {{-- <style>
    iframe[src*="youtube.com"]::-webkit-media-controls-panel {
      display: none !important;
    }
  </style> --}}

  <style>
    .scrollable-table {
        height: 263px;
        overflow: hidden;
    }

    .scrollable-table-2 {
        height: 263px;
        overflow: hidden;
    }
    /* .scrollable-table table {
        top: 0;
        left: 0;
    } */
</style>
{{-- 

  <style>
    .scrollable-table {
      height: 236px;
      overflow-y: auto;
      display: block;
    }
  </style> --}}

  @livewireStyles
</head>

<body style="width: 100%; height: 500px; background-image: url('{{ asset('img/newsboard/background.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center; padding-bottom: 1000px;">
  <div class="pt-4" style="height: 100vh">
    @yield('container')
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

  <script>
    AOS.init();
  </script>

  <script src="{{ asset('js/time.js') }}"></script>

  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@latest/dist/js/splide-extension-auto-scroll.min.js"></script>

  <script>
    const splide = new Splide( '.splide', {
      type   : 'loop',
      drag   : 'free',
      focus  : 'center',
      perPage: 8,
      autoScroll: {
        speed: 1,
      },
    } );

    splide.mount(window.splide.Extensions);
  </script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      const scrollableTable = document.querySelector('.scrollable-table');
      const table = scrollableTable.querySelector('table');
      
      let scrollSpeed = 0.2; // Speed of the scroll (1px per frame)
      let currentScroll = 0;

      function autoScroll() {
          currentScroll += scrollSpeed;
          if (currentScroll >= table.clientHeight - scrollableTable.clientHeight) {
              currentScroll = 0;
          }
          table.style.transform = `translateY(${-currentScroll}px)`;
          requestAnimationFrame(autoScroll);
      }

      autoScroll();
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      const scrollableTable = document.querySelector('.scrollable-table-2');
      const table = scrollableTable.querySelector('table');
      
      let scrollSpeed = 0.2; // Speed of the scroll (1px per frame)
      let currentScroll = 0;

      function autoScroll() {
          currentScroll += scrollSpeed;
          if (currentScroll >= table.clientHeight - scrollableTable.clientHeight) {
              currentScroll = 0;
          }
          table.style.transform = `translateY(${-currentScroll}px)`;
          requestAnimationFrame(autoScroll);
      }

      autoScroll();
  });
</script>

</body>
</html>