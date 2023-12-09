<?php

class LocationController
{
    private string $apiUrl;
    private string $apiKey;
    private HttpClientController $httpClient;

    public function __construct($apiUrl, $apiKey, HttpClientController $httpClient)
    {
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
        $this->httpClient = $httpClient;
    }

    public function getAddressByCoordinates($latitude, $longitude)
    {
        $url = $this->apiUrl . 'reverse.php?key=' . $this->apiKey . '&lat=' . $latitude . '&lon=' . $longitude . '&format=json';

        return $this->httpClient->makeRequest($url);
    }

    public function getCoordinatesByAddress($address)
    {
        $url = $this->apiUrl . 'search.php?key=' . $this->apiKey . '&q=' . urlencode($address) . '&format=json';

        return $this->httpClient->makeRequest($url);
    }
}
