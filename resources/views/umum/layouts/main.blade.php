<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dinas Pekerjaan Umum dan Penataan Ruang Kota Samarinda</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/umum.css') }}">
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
  @livewireStyles
</head>

<body>
  @include('umum.partials.navbar')

  <div class="">
    @yield('container')
  </div>

  @include('umum.partials.footbar')

  <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>

  <script src="https://unpkg.com/@popperjs/core@2"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>

  <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

  <script src="https://cdn.jsdelivr.net/gh/mickidum/acc_toolbar/acctoolbar/acctoolbar.min.js"></script>
  <script>
    window.onload = function() {
      window.micAccessTool = new MicAccessTool({
        buttonPosition: 'left',
        forceLang: 'id_ID'
      });
    }
  </script>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  @livewireScripts

  <!-- Skrip JavaScript untuk Pembaruan Status -->
  <script>
    function updateStatusBasedOnTime(itemId, tanggal, waktu, duration) {
      var statusElement = document.querySelector("#status-" + itemId + " .status-text");
      var dotElement = document.getElementById("dot-" + itemId);

      var now = new Date();
      var currentTime = now.getTime();

      var waktuMulaiString = tanggal + " " + waktu;
      var waktuMulai = new Date(waktuMulaiString);

      // Logika perubahan status
      if (currentTime < waktuMulai.getTime()) {
          // Belum Dimulai
          statusElement.innerHTML = 'Belum Dimulai';
          dotElement.style.display = 'none';
      } else if (currentTime >= waktuMulai.getTime() && currentTime <= waktuMulai.getTime() + duration) {
          // Sedang Berlangsung
          statusElement.innerHTML = 'Sedang Berlangsung';
          dotElement.style.display = 'inline';
      } else if (currentTime > waktuMulai.getTime() + duration) {
          // Selesai
          statusElement.innerHTML = 'Selesai';
          dotElement.style.display = 'none';
      } else {
          // Logika tambahan jika diperlukan
      }
    }
  </script>

  {{-- Script Chatbot --}}
  <script>
    "use strict";
    
    !function() {
      var t = window.driftt = window.drift = window.driftt || [];
      if (!t.init) {
        if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
        t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
        t.factory = function(e) {
          return function() {
            var n = Array.prototype.slice.call(arguments);
            return n.unshift(e), t.push(n), t;
          };
        }, t.methods.forEach(function(e) {
          t[e] = t.factory(e);
        }), t.load = function(t) {
          var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
          o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
          var i = document.getElementsByTagName("script")[0];
          i.parentNode.insertBefore(o, i);
        };
      }
    }();
    drift.SNIPPET_VERSION = '0.3.1';
    drift.load('m7utbci9eyf3');
  </script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>

  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@latest/dist/js/splide-extension-auto-scroll.min.js"></script>

  <script>
    const splide = new Splide( '.splide', {
      type   : 'loop',
      drag   : 'free',
      focus  : 'center',
      perPage    : 1,  // Adjust number of slides per page for mobile
      breakpoints: {
        768: {
          perPage: 1, // 1 slide per page on mobile devices
        },
        1024: {
          perPage: 2, // 2 slides per page on tablets
        },
        1440: {
          perPage: 3, // 3 slides per page on larger screens
        },
        1920: {
          perPage: 4, // 4 slides per page on desktops
        }
      },
      autoScroll: {
        speed: 1,
      },
    } );

    splide.mount(window.splide.Extensions);
  </script>

  <script src="{{ asset('js/navbar.js') }}"></script>
  <script src="{{ asset('js/time.js') }}"></script>
  <script src="{{ asset('js/calendar.js') }}"></script>

</body>

</html>