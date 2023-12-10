<?php

class Router
{
    private LocationController $locationClient;

    public function __construct(LocationController $locationClient)
    {
        $this->locationClient = $locationClient;
    }

    public function handleRequest(): array
    {
        $requestType = $_GET['request_type'];
        $requestData = $_GET['request_data'];

        if ($requestType === 'get_address') {
            $latitude = $requestData['latitude'];
            $longitude = $requestData['longitude'];

            if (!is_numeric($latitude) || !is_numeric($longitude)) {
                return ['error' => 'Invalid coordinates. Latitude and longitude must be floats or integer.'];
            }

            return $this->getAddressByCoordinates($latitude, $longitude);
        }

        if ($requestType === 'get_coordinates') {
            return $this->getCoordinatesByAddress($requestData['address']);
        }

        return ['error' => '404'];
    }

    private function getAddressByCoordinates(float $latitude, float $longitude): array
    {
        $result = $this->locationClient->getAddressByCoordinates($latitude, $longitude);

        return $this->formatResponse($result);
    }

    private function getCoordinatesByAddress($address): array
    {
        $result = $this->locationClient->getCoordinatesByAddress($address);

        return $this->formatResponse($result);
    }

    private function formatResponse($result): array
    {
        if (isset($result['error'])) {
            return ['error' => $result['error']];
        }

        return $result;
    }
}
