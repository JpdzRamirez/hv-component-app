<?php

namespace App\Services;

class LocationService
{

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    private function curlRequest($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        return json_decode($response, true);
    }

    public function fetchCountries()
    {
        $url = 'https://restcountries.com/v3.1/all';
        $response = $this->curlRequest($url);
        
        if ($response !== false) {
            // Ordenar alfabéticamente por el nombre común del país
            usort($response, function ($a, $b) {
                return strcmp($a['name']['common'], $b['name']['common']);
            });
            return $response;
        }
        
        return [];
    }

    public function fetchStates($countryName)
    {
        $geonameId = $this->getCountryId($countryName)['geonameID'];
        $url = "http://api.geonames.org/childrenJSON?geonameId={$geonameId}&username=jpdzramirez&lang=es";
        
        return $this->curlRequest($url);
    }

    public function fetchCities($stateId)
    {
        $url = "http://api.geonames.org/childrenJSON?geonameId={$stateId}&username=jpdzramirez";
        return $this->curlRequest($url);
    }

    public function getCountryId($countryName)
    {
        $url = 'http://api.geonames.org/countryInfoJSON?username=jpdzramirez';
        $response = $this->curlRequest($url);
        
        if ($response !== false) {
            foreach ($response['geonames'] as $country) {
                if (strcasecmp($country['countryName'], $countryName) === 0) {
                    $response=[
                        'geonameID'=>$country['geonameId'],
                        'countryID'=>$country['countryCode']
                    ];
                    return $response; // Retorna el geonameId
                }
            }
        }
        return null;
    }

    public function getStateId($stateName, $countryID)
    {
        $stateNameEncoded = urlencode($stateName);
        $url = "http://api.geonames.org/searchJSON?q={$stateNameEncoded}&country={$countryID}&featureCode=ADM1&maxRows=1&username=jpdzramirez";
        
        $response = $this->curlRequest($url);
        if ($response !== false && isset($response['geonames'][0])) {
            return $response['geonames'][0]['geonameId']; // Retorna el geonameId
        }
        return null;
    }
}
