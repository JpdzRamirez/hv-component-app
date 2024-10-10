<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class LocationSelector extends Component
{
    public $countries = [];
    public $cities = [];
    public $states=[];
    public $selectedCountry = '';

    protected $listeners = ['countrySelected'];

    private function curlRequest($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_VERBOSE, true); // Mostrar salida de depuración
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Desactivar verificación de SSL solo para desarrollo
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Solo desarrollo
        $response = curl_exec($ch);

        // Comprobar si la solicitud fue exitosa
        if ($response != false && $response !=null) {
            // Almacenar los datos en la propiedad $countries
            return json_decode($response, true);
        } else {
            // Manejar el error en caso de que la solicitud falle
            return [];
        }
    }
    private function getCountryId($countryName){
        // Llama a la API de Rest Countries o Geonames para obtener el geonameId
        $url = 'http://api.geonames.org/countryInfoJSON?username=jpdzramirez';
        $response = $this->curlRequest($url);
        if ($response !== false && $response!=null) {
           // $countries = json_decode($response, true);
            foreach ($response['geonames'] as $country) {
                if (strcasecmp($country['countryName'], $countryName) === 0) {
                    return $country['geonameId']; // Retorna el geonameId
                }
            }
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
        $search=$this->curlRequest($url);

        // Comprobar si la solicitud fue exitosa
        if ($search !=false) {
            // Almacenar los datos en la propiedad $countries
            $this->countries =  $search;
            // Ordenar alfabéticamente por el nombre común del país
            usort($this->countries, function($a, $b) {
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

            $geonameId=$this->getCountryId($countryName);
            $username = 'jpdzramirez'; 
            
            $url = "http://api.geonames.org/childrenJSON?geonameId={$geonameId}&username={$username}";

            $search=$this->curlRequest($url);

            // Comprobar si la solicitud fue exitosa
            if ($search != false && $search !=null) {
                $this->states = $search['geonames']; // El resultado contiene las ciudades
            } else {
                $this->states = [];
            }
        }
        public function countrySelected( string $country)
        {
            $this->selectedCountry = $country;
            $this->fetchStates($country);
        }

    public function render()
    {
        return view('livewire.components.location-selector');
    }
}
