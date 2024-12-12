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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <!-- Styles -->
    @stack('templateStyles')
</head>

<body>
    {{-- TOOLS SECTION--}}
    <section>
        <div id="spinner" class="spinner hidden">{{__('general.spinner-message')}}
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
    @if (isset($presentationID))
        @livewire('pages.register', ['presentationID' => $presentationID])
    @else
        @livewire('pages.register')
    @endif
    {{--END DINAMIC SECTION--}}
    <footer>
        @livewire('layout.footer')
    </footer>
    @stack('templateModal')

    @livewireScripts
    <script>
        let spinnerShow=false;
        // Escuchar el evento 'section-changed' para actualizar la sección y activar el spinner
        window.addEventListener('sectionChanged', event => {
            spinnerShow=true;
            $("#spinner").removeClass('hidden');
        })
        Livewire.hook('morph.updated', ({ el, component }) => {
                if(spinnerShow){
                    console.log("changed")
                    spinnerShow=false
                    setTimeout(() => {
                        $("#spinner").addClass('hidden');
                    }, 1500); 
                }
        })
    </script>
    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>    
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>    
    <script src="{{asset('assets/js/components/datePicker/bootstrap-datepicker.min.js')}}"></script>
    @stack('templateScripts')
</body>

</html>
