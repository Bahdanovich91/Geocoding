<?php

class Router
{
    private $locationClient;

    public function __construct(LocationClient $locationClient)
    {
        $this->locationClient = $locationClient;
    }

    public function handleRequest()
    {
        $requestType = $_GET['request_type'];
        $requestData = $_GET['request_data'];

        if ($requestType === 'get_address') {
            return $this->getAddressByCoordinates($requestData['latitude'], $requestData['longitude']);
        } elseif ($requestType === 'get_coordinates') {
            return $this->getCoordinatesByAddress($requestData['address']);
        } else {
            return '404';
        }
    }

    private function getAddressByCoordinates($latitude, $longitude)
    {
        $result = $this->locationClient->getAddressByCoordinates($latitude, $longitude);

        return $this->formatResponse($result);
    }

    private function getCoordinatesByAddress($address)
    {
        $result = $this->locationClient->getCoordinatesByAddress($address);

        return $this->formatResponse($result);
    }

    private function formatResponse($result)
    {
        if (isset($result['error'])) {

            return 'Error: ' . $result['error'];
        } else {

            return $result;
        }
    }
}
