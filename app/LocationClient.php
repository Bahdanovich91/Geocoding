<?php

class LocationClient
{
    private $apiUrl;
    private $apiKey;

    public function __construct($apiUrl, $apiKey)
    {
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
    }

    public function getAddressByCoordinates($latitude, $longitude)
    {
        $url = $this->apiUrl . 'reverse.php?key=' . $this->apiKey . '&lat=' . $latitude . '&lon=' . $longitude . '&format=json';

        return $this->makeRequest($url);
    }

    public function getCoordinatesByAddress($address)
    {
        $url = $this->apiUrl . 'search.php?key=' . $this->apiKey . '&q=' . urlencode($address) . '&format=json';

        return $this->makeRequest($url);
    }

    private function makeRequest($url)
    {
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response, true);
    }
}
