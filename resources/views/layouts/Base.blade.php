<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title', 'HV' . ' ' . __('general.owner'))
    </title>

    <!-- Fonts -->

    @vite(['resources/css/app.min.css', 'resources/js/app.js'])
    @livewireStyles
    <!-- Styles -->
    <style>

    </style>
</head>

<body>
    {{-- TOOLS SECTION--}}
    <section>
         <div id="preloader" class="spinner">            
            <div id="status"><span>Loading</span></div>
            <div id="status"><span>Loading</span></div>
          </div>
        <div class="video-bg">
            <img src="{{asset('assets/img/bg-1.jpg')}}" loading="lazy" alt="Wallpaper">
        </div>
        <div class="dark-light">
            <i id="dark-light-icon" class="fa-solid fa-sun"></i>
        </div>
    </section>
    {{--END TOOLS SECTION--}}

    {{ $slot }}

    <footer>
        @livewire('layout.footer')
    </footer>

    @livewireScripts
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('templateModal')
    @stack('templateScripts')
</body>

</html>
