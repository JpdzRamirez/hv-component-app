<div id="{{ $customPhoneId }}" wire:id="{{ $customPhoneId }}">
    <div class="row mb-3">
      <div class="col-sm-3">
      <label for="phone" class="form-label label-required">{{ __('forms.register.label-phone') }}:</label>
      </div>
      <div class="col-sm-9 text-secondary">
        <div class="input-group">
          <select class="input-group-text form-select" id="phone" name="phone"></select>
          <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
        </div> 
      </div>     
    </div>
</div>
@push('templateScripts')
<script src="{{ asset('assets/js/selectorPhone.js') }}"></script>
<script>
    const phoneComponent = document.getElementById("phoneComponent");
    const wirePhoneId = phoneComponent.getAttribute('wire:id');
    
    let selectedPhone = @json($selectedPhone);
    // Inicializar seletores
    let previousSelectedPhone= selectedPhone;
  // Funciones para cargar el select personalizado
  function initializePhoneSelect(selectedPhone,selectorPhone,countriesPhoneData,spanLang) {
    new phoneSelector('#phone', {
        columns: 3,
        width: '100%',
        dropdownWidth: '100%',
        placeholder: "--{{ __('forms.register.select-phone')}}--",
        data: countriesPhoneData.map(function(country) {
            return {
                value: country.idd.root+country.idd.suffixes,
                img: country.flags.png,
                imgWidth: '25px',
                imgHeight: '15px',
                text: country.idd.root+country.idd.suffixes,
                name: country.name.common,
            };
        }),
    }, selectedPhone,selectorPhone,spanLang);
  }
  //Consumo de API para listar telefono internacional
  document.addEventListener('livewire:initialized', () => {
        initializePhoneSelect(selectedPhone,'selectedPhone',countriesData,spanLanguage);
    });
    let isPhoneUpdating = false;
  // También escucha el evento livewire:updated
  Livewire.hook('morph.updated', ({component})=> {
    //Si el componente es el selector de países
    if(component.id==wirePhoneId){      
        let livewirePhoneComponent = Livewire.find(wirePhoneId);
        if (isPhoneUpdating) return;  // Si ya está actualizando, salir

        isPhoneUpdating = true;
        loadingSpinner.classList.add('hidden');     

        let newSelectedPhone = livewirePhoneComponent.get('selectedPhone');

        // Solo ejecutar si los valores han cambiado
        if (newSelectedPhone !== previousSelectedPhone) {
            previousSelectedPhone = newSelectedPhone;
            setTimeout(() => {
                // Volver a inicializar los selects con los datos actualizados
                initializePhoneSelect(newSelectedPhone, 'selectedPhone',countriesData); 
                isPhoneUpdating = false;  // Reiniciar flag una vez completada la actualización
            }, 500);
        } else {
            isPhoneUpdating = false;  // Reiniciar flag si no hay cambios
        } 
    }
});
</script>
@endpush