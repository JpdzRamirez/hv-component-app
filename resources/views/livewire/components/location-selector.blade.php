<div id="{{ $customId }}" wire:id="{{ $customId }}">
  <div class="row mb-3">
    <div class="col-md-4">
      <label for="country" class="form-label">{{__('forms.register.label-country')}}</label>
      <select class="form-select" id="country" name="country"></select>
    </div>
    <div class="col-md-4">
      <label for="state" class="form-label">{{__('forms.register.label-state')}}</label>
      <select class="form-select" id="state" name="state"></select>
    </div>
    <div class="col-md-4">
      <label for="city" class="form-label">{{__('forms.register.label-city')}}</label>
      <select class="form-select" id="city" name="city"></select>
    </div>
  </div>
</div>
@push('templateScripts')
<script src="{{ asset('assets/js/selector.js') }}"></script>
<script>
  let initialized = false;
  const componentElement = document.getElementById("selectorComponent");
  const wireId = componentElement.getAttribute('wire:id');

  let countriesData = @json($countries);
  let selectedCountry = @json($selectedCountry);
  let selectedState = @json($selectedState);
  let previousSelectedCountry = selectedCountry;
  let previousSelectedState = selectedState;
  function initializeCountrySelect(selectedCountry,selectorCountry) {
    new DynamicSelect('#country', {
        columns: 3,
        width: '100%',
        dropdownWidth: '100%',
        placeholder: '--Select a Country--',
        data: countriesData.map(function(country) {
            return {
                value: country.name.common,
                img: country.flags.png,
                imgWidth: '50px',
                imgHeight: '30px',
                text: country.name.common,
            };
        }),
    }, selectedCountry,selectorCountry);
  }
  function initializeStateSelect(selectedState,selectorState,statesData) {
    new DynamicSelect('#state', {
        columns: 3,
        width: '100%',
        dropdownWidth: '100%',
        placeholder: '--Select a State--',
        data: statesData.map(function(state) {
            return {
                value: state.name,
                text: state.name,
            };
        }),
    }, selectedState,selectorState);
  }
  function initializeCitySelect(selectedCity,selectorCity,citiesData) {
    new DynamicSelect('#city', {
        columns: 3,
        width: '100%',
        dropdownWidth: '100%',
        placeholder: '--Select a City--',
        data: citiesData.map(function(city) {
            return {
                value: city.name,
                text: city.name,
            };
        }),
    }, selectedCity,selectorCity);
  }

  document.addEventListener('livewire:initialized', () => {
        initializeCountrySelect(selectedCountry,"selectedCountry");
    })

  let isUpdating = false;
  // También escucha el evento livewire:updated
  Livewire.hook('morph.updated', ({component})=> {
    if(component.id==wireId){      
        let livewireComponent = Livewire.find(wireId);
        if (isUpdating) return;  // Si ya está actualizando, salir
        isUpdating = true;
        loadingSpinner.classList.add('hidden');        
        let newSelectedCountry = livewireComponent.get('selectedCountry');
        let newSelectedState = livewireComponent.get('selectedState');
        let statesData = livewireComponent.get('states');
        let citiesData = livewireComponent.get('cities');
        // Solo ejecutar si los valores han cambiado
        if (newSelectedCountry !== previousSelectedCountry || newSelectedState !== previousSelectedState) {
            previousSelectedCountry = newSelectedCountry;
            previousSelectedState = newSelectedState;

            setTimeout(() => {
                // Volver a inicializar los selects con los datos actualizados
                initializeCountrySelect(newSelectedCountry, "selectedCountry");
                if(statesData.length > 0){
                  initializeStateSelect(newSelectedState, "selectedState", statesData);
                }
                if(citiesData.length > 0){
                  initializeCitySelect(null, "selectedCity", citiesData);
                }           
                isUpdating = false;  // Reiniciar flag una vez completada la actualización
            }, 500);
        } else {
            isUpdating = false;  // Reiniciar flag si no hay cambios
        } 
    }
})
</script>
@endpush