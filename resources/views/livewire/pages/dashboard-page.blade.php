<div>
    <div id="app" class="app">
        <header>
            <livewire:components.header />
        </header>
        <div class="wrapper">

            <livewire:components.navbar />

            <div class="main-container">
                @switch($section)
                    @case(1)
                        <livewire:pages.services />
                        @break
                    @case(4)
                        <livewire:pages.contact />
                        @break
                    @default
                        <livewire:pages.not-found :message="__('exceptions.not_found') ?? ''" />
                    @endswitch
            </div>
        </div>
        <div class="overlay-app"></div>
    </div>
</div>
