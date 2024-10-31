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
    @stack('templateStyles')
</head>

<body>
    {{-- TOOLS SECTION--}}
    <section>
        <div id="spinner" class="spinner hidden">Loading
            <span></span>
        </div>
        <div id="preloader"  class="preloader">
            <div class="containerPreloader">
                <div class="containerPreloader__a"></div>
                <div class="containerPreloader__b"></div>
                <div class="containerPreloader__c"></div>
                <div class="containerPreloader__d"></div>
            </div>
        </div>
        <div class="video-bg">
            <img src="{{asset('assets/img/bg-1.jpg')}}" loading="lazy" alt="Wallpaper">
        </div>
        <div class="dark-light">
            <i id="dark-light-icon" class="fa-solid fa-sun"></i>
        </div>
    </section>
    {{--END TOOLS SECTION--}}
    {{--DINAMIC SECTION--}}
        {{ $slot }}
    {{--END DINAMIC SECTION--}}
    <footer>
        @livewire('layout.footer')
    </footer>
    @stack('templateModal')

    @livewireScripts
    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
    {{-- <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('templateScripts')
</body>

</html>