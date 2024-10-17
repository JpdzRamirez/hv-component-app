<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Contracts\CountryServiceInterface;
use App\Contracts\StateServiceInterface;
use App\Contracts\CityServiceInterface;

use App\Services\GeoLocationHandler;

use Illuminate\Support\Facades\App;

class LocationSelector extends Component
{
    public $customLocationId;

    public $countries = [];
    public $states = [];
    public $cities = [];

    public $selectedCountry = null;
    public $selectedState = null;
    public $selectedCity = null;

    protected CountryServiceInterface $countryService;
    protected StateServiceInterface $stateService;
    protected CityServiceInterface $cityService;
    protected GeoLocationHandler $geoLocationHandler;

    protected $listeners = ['selectorCharger','syncLocation']; 

    public function mount(CountryServiceInterface $countryService, $customLocationId = "locationComponent")
    {
        $this->countryService = $countryService;
        $this->customLocationId = $customLocationId;
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
                $this->fetchCities($optionSelected);
                break;
        }
    }

    public function fetchStates($countryName)
    {
        $this->stateService = App::make(StateServiceInterface::class);
        $this->states = $this->stateService->fetchStates($countryName)['geonames'];
        $this->cities = []; // Resetear ciudades al cambiar de país
        $this->selectedState = null; // Resetear estado seleccionado
        $this->selectedCity = null; 
    }

    public function fetchCities($stateName)
    {
        $this->cityService = App::make(CityServiceInterface::class);
        $countryId = $this->cityService->getCountryId($this->selectedCountry)['countryID'];
        $stateId = $this->cityService->getStateId($stateName, $countryId);

        if ($stateId) {
            $this->cities = $this->cityService->fetchCities($stateId)['geonames'];
            $this->selectedCity = null; 
        }
    }

    public function syncLocation($geoLocation)
    {   
        $this->geoLocationHandler = App::make(GeoLocationHandler::class);
        $data = $this->geoLocationHandler->syncLocation($geoLocation);
        $this->selectedCity=$data['city'];
        $this->dispatch('bindingLocation', $data);
    }

    public function render()
    {
        return view('livewire.components.location-selector',[
            'customLocationId'=>$this->customLocationId,
        ]);
    }
}
