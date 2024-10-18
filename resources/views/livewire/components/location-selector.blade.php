<div id="{{ $customLocationId }}" wire:id="{{ $customLocationId }}">
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
<script src="{{ asset('assets/js/selectorLocation.js') }}"></script>
<script>
  // Variables constantes
  let initialized = false;
  const locationComponent = document.getElementById("locationComponent");
  const wireLoctaionId = locationComponent.getAttribute('wire:id');
  const spanLanguage = "{{ __('forms.register.select-PlaceHolder')}}";

  //Variables del controlador
  let countriesData = @json($countries);
  let selectedCountry = @json($selectedCountry);
  let selectedState = @json($selectedState);
  let selectedCity = @json($selectedCity);

  // Inicializar seletores
  let previousSelectedCountry = selectedCountry;
  let previousSelectedState = selectedState;
  let previousSelectedCity = selectedCity;

  // Funciones para cargar el select personalizado
  function initializeCountrySelect(selectedCountry,selectorCountry,spanLang) {
    new DynamicSelect('#country', {
        columns: 3,
        width: '100%',
        dropdownWidth: '100%',
        placeholder: "--{{ __('forms.register.select-country')}}--",
        data: countriesData.map(function(country) {
            return {
                value: country.name.common,
                img: country.flags.png,
                imgWidth: '50px',
                imgHeight: '30px',
                text: country.name.common,
            };
        }),
    }, selectedCountry,selectorCountry,spanLang);
  }
  function initializeStateSelect(selectedState,selectorState,statesData,spanLang) {
    new DynamicSelect('#state', {
        columns: 3,
        width: '100%',
        dropdownWidth: '100%',
        placeholder: "--{{ __('forms.register.select-state')}}--",
        data: statesData.map(function(state) {
            return {
                value: state.name,
                text: state.name,
            };
        }),
    }, selectedState,selectorState,spanLang);
  }
  function initializeCitySelect(selectedCity,selectorCity,citiesData,spanLang) {
    new DynamicSelect('#city', {
        columns: 3,
        width: '100%',
        dropdownWidth: '100%',
        placeholder: "--{{ __('forms.register.select-city')}}--",
        data: citiesData.map(function(city) {
            return {
                value: city.name,
                text: city.name,
            };
        }),
    }, selectedCity,selectorCity,spanLang);
  }
  //***************************************

  //Consumo de API para listar paises
  document.addEventListener('livewire:initialized', () => {
        initializeCountrySelect(selectedCountry,"selectedCountry",spanLanguage);
    })

  let isLocationUpdating = false;
  // También escucha el evento livewire:updated
  Livewire.hook('morph.updated', ({component})=> {
    //Si el componente es el selector de países
    if(component.id==wireLoctaionId){      
        let livewireLocationComponent = Livewire.find(wireLoctaionId);
        if (isLocationUpdating) return;  // Si ya está actualizando, salir

        isLocationUpdating = true;
        loadingSpinner.classList.add('hidden');     

        let newSelectedCountry = livewireLocationComponent.get('selectedCountry');
        let newSelectedState = livewireLocationComponent.get('selectedState');
        let newSelectedCity = livewireLocationComponent.get('selectedCity');

        let statesData = livewireLocationComponent.get('states');
        let citiesData = livewireLocationComponent.get('cities');
        // Solo ejecutar si los valores han cambiado
        if (newSelectedCountry !== previousSelectedCountry || 
          newSelectedState !== previousSelectedState || 
          newSelectedCity !== previousSelectedCity) {

            previousSelectedCountry = newSelectedCountry;
            previousSelectedState = newSelectedState;
            previousSelectedCity = newSelectedCity;

            setTimeout(() => {
                // Volver a inicializar los selects con los datos actualizados
                initializeCountrySelect(newSelectedCountry, "selectedCountry",spanLanguage);
                if(statesData.length > 0){
                  initializeStateSelect(newSelectedState, "selectedState", statesData,spanLanguage);
                }
                if(citiesData.length > 0){
                  initializeCitySelect(newSelectedCity, "selectedCity", citiesData,spanLanguage);
                }           
                isLocationUpdating = false;  // Reiniciar flag una vez completada la actualización
            }, 500);
        } else {
          isLocationUpdating = false;  // Reiniciar flag si no hay cambios
        } 
    }
})
</script>
@endpush