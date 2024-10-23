<div id="{{ $customPhoneId }}" wire:id="{{ $customPhoneId }}">
    <div class="row mb-3">
        <div class="col-sm-3">
            <label for="phone" id="labelPhone" class="form-label label-required">{{ __('forms.register.label-phone') }}:</label>
        </div>
        <div class="col-sm-9 text-secondary">
            <div class="input-group" id="inputGroupPhone">
                <select class="input-group-text form-select" id="phoneSelector"></select>
                <input type="tel" value="" class="form-control" id="phone" placeholder="(+57) 317 7163494"
                    pattern="[+0-9\s]+">
            </div>
        </div>
    </div>
</div>
@push('templateScripts')
    <script src="{{ asset('assets/js/selectorPhone.js') }}"></script>
    <script>
        const phoneComponent = document.getElementById("phoneComponent");
        const wirePhoneId = phoneComponent.getAttribute('wire:id');
        const phoneInput = document.getElementById("phone");

        let numberDispatched = false;
        let selectedPhoneIndicator = @json($selectedPhoneIndicator);
        // Inicializar seletores
        let previousSelectedPhoneIndicator = selectedPhoneIndicator;
        // Funciones para cargar el select personalizado
        function initializePhoneSelect(selectedPhoneIndicator, selectorPhone, countriesPhoneData, spanLang) {
            new phoneSelector('#phoneSelector', {
                columns: 3,
                width: '100%',
                dropdownWidth: '100%',
                placeholder: "--{{ __('forms.register.select-phone') }}--",
                data: countriesPhoneData.map(function(country) {
                    return {
                        value: country.idd.root + country.idd.suffixes,
                        img: country.flags.png,
                        imgWidth: '25px',
                        imgHeight: '15px',
                        text: country.idd.root + country.idd.suffixes,
                        name: country.name.common,
                    };
                }),
            }, selectedPhoneIndicator, selectorPhone, spanLang);
        }
        //Consumo de API para listar telefono internacional
        document.addEventListener('livewire:initialized', () => {
            setTimeout(() => {
                // Volver a inicializar el select con los datos
                initializePhoneSelect(selectedPhoneIndicator, 'selectedPhone', countriesData, spanLanguage);
            }, 500);            
        });
        let isPhoneUpdating = false;
        // También escucha el evento livewire:updated
        Livewire.hook('morph.updated', ({
            component
        }) => {
            //Si el componente es el selector de países
            if (component.id == wirePhoneId) {
                let livewirePhoneComponent = Livewire.find(wirePhoneId);
                if (isPhoneUpdating) return; // Si ya está actualizando, salir

                isPhoneUpdating = true;
                loadingSpinner.classList.add('hidden');

                let newSelectedPhoneIndicator = livewirePhoneComponent.get('selectedPhoneIndicator');
                //solo se ejecuta en caso de un dispatch number
                if (numberDispatched) {
                    // Volver a inicializar el select con los datos
                    numberDispatched = false;
                    setTimeout(() => {
                        // Volver a inicializar el select con los datos
                        initializePhoneSelect(newSelectedPhoneIndicator, 'selectedPhone', countriesData,
                            spanLanguage);
                        isPhoneUpdating = false;
                    }, 500);
                }
                // Solo ejecutar si los valores han cambiado
                if (newSelectedPhoneIndicator !== previousSelectedPhoneIndicator) {
                    previousSelectedPhoneIndicator = newSelectedPhoneIndicator;
                    setTimeout(() => {
                        // Volver a inicializar el select con los datos
                        initializePhoneSelect(newSelectedPhoneIndicator, 'selectedPhone', countriesData,
                            spanLanguage);
                        isPhoneUpdating = false; // Reiniciar flag una vez completada la actualización
                    }, 500);
                } else {
                    isPhoneUpdating = false; // Reiniciar flag si no hay cambios
                }
            }
        });
        phoneInput.addEventListener("change", () => {
            let livewirePhoneComponent = Livewire.find(wirePhoneId);
            let newSelectedPhoneIndicator = livewirePhoneComponent.get('selectedPhoneIndicator');

            let numeroCompleto = phoneInput.value.split(" ");
            if (numeroCompleto.length > 1) {
                numberDispatched = true;
                Livewire.dispatch('inputPhoneCharger', { numberInput: numeroCompleto[1] }); // Usa el segundo elemento
            } else {
                numberDispatched = true;
                Livewire.dispatch('inputPhoneCharger', { numberInput: numeroCompleto.toString() }); // Usa el primer elemento
            }
        });
    </script>
@endpush
