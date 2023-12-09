<?php

class Router
{
    private LocationController $locationClient;

    public function __construct(LocationController $locationClient)
    {
        $this->locationClient = $locationClient;
    }

    public function handleRequest(): array|string
    {
        $requestType = $_GET['request_type'];
        $requestData = $_GET['request_data'];

        if ($requestType === 'get_address') {
            return $this->getAddressByCoordinates($requestData['latitude'], $requestData['longitude']);
        }

        if ($requestType === 'get_coordinates') {
            return $this->getCoordinatesByAddress($requestData['address']);
        }

        return '404';
    }

    private function getAddressByCoordinates(string $latitude, string $longitude): array|string
    {
        $result = $this->locationClient->getAddressByCoordinates($latitude, $longitude);

        return $this->formatResponse($result);
    }

    private function getCoordinatesByAddress($address): array|string
    {
        $result = $this->locationClient->getCoordinatesByAddress($address);

        return $this->formatResponse($result);
    }

    private function formatResponse($result): array|string
    {
        if (isset($result['error'])) {
            return 'Error: ' . $result['error'];
        }

        return $result;
    }
}
