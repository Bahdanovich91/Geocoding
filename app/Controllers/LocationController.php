<?php

class LocationController
{
    private string $apiUrl;
    private string $apiKey;
    private HttpClient $httpClient;

    public function __construct(string $apiUrl, string $apiKey, HttpClient $httpClient)
    {
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
        $this->httpClient = $httpClient;
    }

    public function getAddressByCoordinates(float $latitude, float $longitude): array
    {
        $url = $this->apiUrl . 'reverse.php?key=' . $this->apiKey . '&lat=' . $latitude . '&lon=' . $longitude . '&format=json';

        return $this->httpClient->makeRequest($url);
    }

    public function getCoordinatesByAddress(string $address): array
    {
        $url = $this->apiUrl . 'search.php?key=' . $this->apiKey . '&q=' . urlencode($address) . '&format=json';

        return $this->httpClient->makeRequest($url);
    }
}
