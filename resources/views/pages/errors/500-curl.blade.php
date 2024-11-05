<x-layouts.base>
    <div id="app" class="app" style="max-width: 40em; max-height:25em;">
        <header>
            <livewire:components.header :exception="$message ?? ''" />
        </header>
        <div class="wrapper">
            <div class="main-container">
                <div class="content-wrapper" style="justify-content: center; overflow:unset;">
                    <div class="content-profile-header" style="margin:0;">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <div class="jelly-card cetered">
                                    <div class="container">
                                        <lottie-player src="{{ asset('assets/lottie/error-500.json') }}"
                                            background="transparent" speed="1" style="width: 12em;"
                                            loop nocontrols autoplay>
                                        </lottie-player>
                                        <img src="{{ asset('assets/img/notICON.png') }}" alt="MACICON">
                                    </div>
                                    <span>{{ __('exceptions.title') }}</span>
                                    @if(isset($message))
                                    <p><u>{{ __('exceptions.error') }}</u> <i class="fa-solid fa-caret-right"></i> {{ $message }}</p> <!-- Mostrar el mensaje de error aquí -->
                                    @else
                                        <p style="text-align: center">{{ __('exceptions.default') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay-app"></div>
    </div>
    </div>
</x-layouts.base>
