<div >  
  <select class="form-select" id="photo" name="photo"></select>
</div>
@push('templateScripts')
<script src="{{ asset('assets/js/selector.js') }}"></script>
<script>
  let countriesData = @json($countries);
  
  function initializeDynamicSelect(selection) {
    new DynamicSelect('#photo', {
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
    }, selection);
  }
  document.addEventListener('DOMContentLoaded', () => {
    const selectHidden = document.getElementById('selectHidden');
  });
  document.addEventListener('livewire:init', function() {
    initializeDynamicSelect();
  });

  // También escucha el evento livewire:updated
  Livewire.hook('morph.updated', function() {
    loadingSpinner.classList.add('hidden');
    const selectedCountry = @this.get('selectedCountry');
    setTimeout(() => {
      initializeDynamicSelect(selectedCountry);
    }, 500);
    
})

</script>
@endpush