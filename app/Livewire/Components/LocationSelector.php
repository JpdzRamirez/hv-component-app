<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Contracts\CountryServiceInterface;
use App\Contracts\StateServiceInterface;
use App\Contracts\CityServiceInterface;

use Illuminate\Support\Facades\App;

class LocationSelector extends Component
{
    public $customId;

    public $countries = [];
    public $states = [];
    public $cities = [];

    public $selectedCountry = null;
    public $selectedState = null;
    public $selectedCity = null;

    protected CountryServiceInterface $countryService;
    protected StateServiceInterface $stateService;
    protected CityServiceInterface $cityService;

    protected $listeners = ['selectorCharger']; // Agrega el listener aquí

    public function mount(CountryServiceInterface $countryService, $customId = "selectorComponent")
    {
        $this->countryService = $countryService;
        $this->customId = $customId;
        $this->fetchCountries();
    }

    public function fetchCountries()
    {
        $this->countries = $this->countryService->fetchCountries();
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
                $this->fetchCities(null,$optionSelected);
                break;
        }
    }

    public function fetchStates($countryName)
    {
        $this->stateService = App::make(StateServiceInterface::class);
        $this->states = $this->stateService->fetchStates($countryName)['geonames'];
        $this->cities = []; // Resetear ciudades al cambiar de país
        $this->selectedState = null; // Resetear estado seleccionado
    }

    public function fetchCities($stateName)
    {
        $this->cityService = App::make(CityServiceInterface::class);
        $countryId = $this->cityService->getCountryId($this->selectedCountry)['countryID'];
        $stateId = $this->cityService->getStateId($stateName, $countryId);

        if ($stateId) {
            $this->cities = $this->cityService->fetchCities($stateId)['geonames'];
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
