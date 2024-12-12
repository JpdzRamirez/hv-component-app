<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link rel="manifest" href="{{ asset('manifest.json') }}">
        <title>
            @yield('title', 'HV' . ' ' . __('general.owner'))
        </title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- <link href="{{ asset('build/assets/app-VkI9_RQ0.css') }}" rel="stylesheet">
        <link href="{{ asset('build/assets/app-BqUA3rj6.css') }}" rel="stylesheet"> --}}

        @livewireStyles
        <script>
            // Usando JavaScript para agregar una clase al elemento <html>
            document.documentElement.classList.add('brand');
        </script>
    </head>
    <body class="welcome">
        <div id="preloader"  class="preloader">
            <div class="containerPreloader">
                <div class="containerPreloader__a"></div>
                <div class="containerPreloader__b"></div>
                <div class="containerPreloader__c"></div>
                <div class="containerPreloader__d"></div>
            </div>
        </div>
        <video autoplay muted loop playsinline>
            <source src="{{asset('assets/video/welcome.mp4')}}" type="video/mp4">
            Tu navegador no soporta la etiqueta de video.
        </video>
        <div class="container d-flex flex-column justify-content-center  position-relative">
                        <div class="logo">
                            <h1 aria-label="JPDZ">
                              <span>JPDZ</span>
                              <span>JPDZ</span>
                              <span>JPDZ</span>                              
                            </h1>
                        </div>
                        <div class="slogan">
                            <div class="playful slogan-text"  aria-label="Software">
                                <span aria-hidden="true" content="S">S</span>
                                <span aria-hidden="true" content="o">o</span>
                                <span aria-hidden="true" content="f">f</span>
                                <span aria-hidden="true" content="t">t</span>
                                <span aria-hidden="true" content="w">w</span>
                                <span aria-hidden="true" content="a">a</span>
                                <span aria-hidden="true" content="r">r</span>
                                <span aria-hidden="true" content="e">e</span>
                             </div>
                            {{-- <p class="slogan-text" content="Software">Software</p> --}}
                        </div>
                        <a href="{{route('profile.create')}}">Register Form</a>
        </div>
        
        <footer style="width:unset; color:aliceblue;">
            Laravel v<span>{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</span>
        </footer>
        @livewireScripts
        <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script> 
        {{-- <script src="{{asset('asset/build/assets/app-N96c46MK.js')}}"></script> --}}
        <script>
            // Usando JavaScript para agregar una clase al elemento <html>
             //Full page charged
            $(window).on("load", function() {
                document.documentElement.classList.add('brand');
            // Oculta el estado de carga
            $('#status').fadeOut();
            // Aplica un retraso de 350ms y luego oculta el preloader lentamente
            $('#preloader').delay(350).fadeOut('slow');
            // Después de 350ms, permite que la página sea visible y scrollable
            });
            
        </script>
    </body>
</html>
