<div>
         <!-- Custom template | don't include it in your project! -->
         <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    @foreach ($colorOptions as $variable => $colors)
                        <div class="switch-block">
                            <h4>{{ ucfirst(str_replace('-', ' ', $variable)) }}</h4>
                            <div class="btnSwitch">
                                @foreach ($colors as $color)
                                    <button
                                        type="button"
                                        class="changeColor"
                                        style="background-color: {{ $color }};"
                                        wire:click="updateColor('{{ $variable }}', '{{ $color }}')"
                                    ></button>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="custom-toggle">
                <i class="icon-settings"></i>
            </div>
        </div>        
          <!-- End Custom template -->
</div>
@push('templateScripts')
<script src="{{asset('assets/js/components/settings/setting.js')}}"></script>
@endpush