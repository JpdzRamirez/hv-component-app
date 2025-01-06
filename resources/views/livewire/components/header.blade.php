<div>
    <div class="header">
        <div class="header-title">
            <div class="header__input-menu">
                <a href="" class="header__input-close"></a>
                <a id="resize" class="header__input-full-screen"></a>
                <a id="min" class="header__input-minimize"></a>
            </div>
        </div>
        <div class="container navbar-header">
            @if (!isset($exception))
                <div class="header-menu" x-data="{ section: @entangle('section') }" x-init="$watch('section', value => {
                    // Emitir el evento con el nuevo valor de 'section'
                    $dispatch('sectionChanged', { section: value })
                })">
                    <a class="menu-link notify" href="{{ route('home') }}">
                        {{ __('general.header-menu.home') }}
                    </a>
                    @if (Route::currentRouteName() === 'home')
                        <a class="menu-link" :class="{ 'is-active': section === 1 }" x-on:click.prevent="section = 1">
                            {{ __('general.header-menu.apps') }}
                        </a>
                        <a class="menu-link notify" :class="{ 'is-active': section === 2 }"
                            x-on:click.prevent="section = 2">
                            {{ __('general.header-menu.work') }}
                        </a>
                        <a class="menu-link" :class="{ 'is-active': section === 3 }" x-on:click.prevent="section = 3">
                            {{ __('general.header-menu.studys') }}
                        </a>
                    @elseif (Route::currentRouteName() === 'dashboard')
                        <a class="menu-link" :class="{ 'is-active': section === 1 }" x-on:click.prevent="section = 1;">
                            {{ __('general.header-menu.dashboard') }}
                        </a>
                    @elseif (Route::currentRouteName() === 'profile.create' || Route::currentRouteName() === 'profile.update')
                        <a class="menu-link notify" href="{{ route('dashboard') }}">
                            {{ __('general.header-menu.dashboard') }}
                        </a>
                        <a class="menu-link" :class="{ 'is-active': section === 1 }" x-on:click.prevent="section = 1;">
                            {{ __('general.header-menu.register') }}
                        </a>
                    @endif
                    <a class="menu-link notify" :class="{ 'is-active': section === 4 }"
                        x-on:click.prevent="section = 4">
                        {{ __('general.header-menu.contact') }}
                    </a>
                </div>
                <div class="d-flex flex-row">
                    <div class="search-bar">
                        <input type="text" placeholder="{{ __('general.search-bar') }}">
                    </div>
                    <div class="header-profile">
                        <div class="notification">
                            <span class="notification-number">3</span>
                            <i class="fa-sharp fa-solid fa-bell"></i>
                        </div>
                        <i class="fa-solid fa-clouds"></i>
                        <img onclick="toggleProfile(event)" class="profile-img"
                            src="https://images.unsplash.com/photo-1600353068440-6361ef3a86e8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80"
                            alt="">
                        <div id="menuProfile" class="menu">
                            <h3>{{ $presentation }}<br /><span>Programador</span></h3>
                            <ul>
                                <li>
                                    <a href="#"><i
                                            class="fa-solid fa-user-vneck"></i>{{ __('auth.profile-show') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.update') }}"><i
                                            class="fa-sharp fa-solid fa-user-pen"></i>{{ __('auth.profile-edit') }}</a>
                                </li>
                                <li>
                                    <a target="_blank" href="{{ route('profile.create') }}"><i
                                            class="fa-solid fa-calendar-lines-pen"></i>{{ __('auth.profile-create') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@push('templateScripts')
    <script>
        //Events
        function toggleProfile(event) {
            const $button = $(event.currentTarget);
            $button.toggleClass("active");
            // Evento para detectar clics fuera del botón
            $(document).on("click.outside", function(e) {
                // Si el clic es fuera del botón, quitamos la clase
                if (!$button.is(e.target) && $button.has(e.target).length === 0) {
                    $button.removeClass("active");
                    // Removemos el evento .outside una vez ejecutado
                    $(document).off("click.outside");
                }
            });
        }
    </script>
@endpush
