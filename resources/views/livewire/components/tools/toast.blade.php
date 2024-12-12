<div>
    @if (!empty($message))
        <div class="toast {{ $alertClass }} flash-toast slide-in-right" role="alert" aria-live="assertive" aria-atomic="true"
            id="toastMessage">
            <div class="toast-header">
                <img src="{{ asset('assets/img/iconNotify.png') }}" style="width: 2em !important" class="rounded me-2"
                    alt="IconJpdz">
                <strong class="me-auto">{{ __('general.toast-message.title') }}</strong>
                <small>{{ $message['date'] }}</small> <!-- Aquí se muestra la fecha y hora -->
                <button type="button" class="btn-close" onclick="closeToast()" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <i class="fa-solid {{ $iconClass }}"></i> {{ $message['message'] }}
            </div>
        </div>
    @endif
</div>
@push('templateScripts')
    <script>
        //Function to close toast globaly
        function closeToast() {           
            let toastMessage = $('#toastMessage');
            setTimeout(() => {
                // Alterna entre las variables de color
                if (toastMessage.hasClass('slide-in-right')) {
                    toastMessage.removeClass("slide-in-right");
                    toastMessage.addClass("slide-in-right-out");
                } 
                setTimeout(() => {
                    toastMessage.remove();
                }, 1000);
            }, 1000);
            
        }
    </script>
@endpush
