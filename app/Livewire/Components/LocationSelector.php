<?php

namespace App\Livewire\Components;

use Livewire\Component;

class LocationSelector extends Component
{
    public $countries = [];
    public $states = [];
    public $cities = [];

    public $countryID = null;
    public $stateID = null;

    public $selectedCountry = null;
    public $selectedState = null;

    protected $listeners = ['selectorCharger'];

    private function curlRequest($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_VERBOSE, true); // Mostrar salida de depuración
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Desactivar verificación de SSL solo para desarrollo
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Solo desarrollo
        $response = curl_exec($ch);
        curl_close($ch);
        // Comprobar si la solicitud fue exitosa
        if ($response != false && $response != null) {
            // Almacenar los datos en la propiedad $countries
            return json_decode($response, true);
        } else {
            // Manejar el error en caso de que la solicitud falle
            return [];
        }
    }
    private function getCountryId($countryName)
    {
        // Llama a la API de Rest Countries o Geonames para obtener el geonameId
        $url = 'http://api.geonames.org/countryInfoJSON?username=jpdzramirez';
        $response = $this->curlRequest($url);
        if ($response !== false && $response != null) {
            // $countries = json_decode($response, true);
            foreach ($response['geonames'] as $country) {
                if (strcasecmp($country['countryName'], $countryName) === 0) {
                    $this->countryID = $country['countryCode'];
                    return $country['geonameId']; // Retorna el geonameId
                }
            }
        }
        return null;
    }
    private function getStateId($stateName)
    {
        // Llama a la API de Rest Countries o Geonames para obtener el geonameId
        $stateNameEncoded=urlencode($stateName);
        $url = "http://api.geonames.org/searchJSON?q={$stateNameEncoded}&country={$this->countryID}&featureCode=ADM1&maxRows=1&username=jpdzramirez";
        $response = $this->curlRequest($url);
        if ($response !== false && $response != null) {
            // $countries = json_decode($response, true);
            $this->stateID = $response['geonames'][0]['geonameId'];
            return $this->stateID; // Retorna el geonameId

        }
        return null;
    }

    public function mount()
    {
        $this->fetchCountries();
    }

    public function fetchCountries()
    {
        // Hacer la solicitud a la API de Rest Countries
        $url = 'https://restcountries.com/v3.1/all';
        $search = $this->curlRequest($url);

        // Comprobar si la solicitud fue exitosa
        if ($search != false) {
            // Almacenar los datos en la propiedad $countries
            $this->countries =  $search;
            // Ordenar alfabéticamente por el nombre común del país
            usort($this->countries, function ($a, $b) {
                return strcmp($a['name']['common'], $b['name']['common']);
            });
        }
    }
    public function fetchStates($countryName)
    {
        // Reemplaza 'your_api_key' con tu clave de API real
        //$apiKey = '297549c88bb4b790b37842e145a5fa7d';

        // Hacer una solicitud a OpenWeatherMap para obtener las ciudades clima de ciudades
        //$url = "http://api.openweathermap.org/data/2.5/weather?q={$country}&appid={$apiKey}";

        $geonameId = $this->getCountryId($countryName);

        $url = "http://api.geonames.org/childrenJSON?geonameId={$geonameId}&username=jpdzramirez&lang=es";

        $search = $this->curlRequest($url);

        // Comprobar si la solicitud fue exitosa
        if ($search != false && $search != null) {
            $this->states = $search['geonames']; // El resultado contiene las ciudades
            if (count($this->cities) > 0) {
                $this->cities = [];
                $this->selectedState = null;
            }
        }
    }
    public function fetchCities($stateName)
    {

        $geonameStateId = $this->getStateId($stateName);
        $url = "http://api.geonames.org/childrenJSON?geonameId={$geonameStateId}&username=jpdzramirez";
        $search = $this->curlRequest($url);
        // Comprobar si la solicitud fue exitosa
        if ($search != false && $search != null) {
            $this->cities = $search['geonames']; // El resultado contiene las ciudades
        }
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

    public function render()
    {
        return view('livewire.components.location-selector');
    }
}
