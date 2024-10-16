<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Services\LocationService;

class LocationSelector extends Component
{
    public $customId;

    public $countries = [];
    public $states = [];
    public $cities = [];

    public $selectedCountry = null;
    public $selectedState = null;
    public $selectedCity = null;

    protected $locationService;

    protected $listeners = ['selectorCharger']; // Agrega el listener aquí

    public function __construct($customId="selectorComponent")
    {   
        $this->customId = $customId;
        $this->locationService = new LocationService();
    }

    public function mount()
    {   
        $this->fetchCountries();
    }

    public function fetchCountries()
    {
        $this->countries = $this->locationService->fetchCountries();
    }

    public function selectorCharger(string $optionSelected, string $idSelector)
    {
        switch ($idSelector) {
            case "selectedCountry":
                $this->selectedCountry = $optionSelected;
                $this->fetchStates($optionSelected);
                break;

            case "selectedState":
                $this->selectedState = $optionSelected;
                $this->fetchCities($optionSelected);
                break;
        }
    }

    public function fetchStates($countryName)
    {
        $locationService = new LocationService();
        $this->states = $locationService->fetchStates($countryName)['geonames'];
        $this->cities = []; // Resetear ciudades al cambiar de país
        $this->selectedState = null; // Resetear estado seleccionado
    }

    public function fetchCities($stateName)
    {
        $locationService = new LocationService();
        $countryId = $locationService->getCountryId($this->selectedCountry)['countryID'];
        $stateId = $locationService->getStateId($stateName, $countryId);

        if ($stateId) {
            $this->cities = $locationService->fetchCities($stateId)['geonames'];
        }
    }

    public function syncLocation($location)
    {
        $this->dispatch('bindingLocation', [
            'country' => $location['country'],
            'state' => $location['state'],
            'city' => $location['city']
        ]);
    }

    public function render()
    {
        return view('livewire.components.location-selector',[
            'customId'=>$this->customId,
        ]);
    }
}
