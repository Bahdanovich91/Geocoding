<?php

require_once 'app/LocationClient.php';
require_once 'routes/Router.php';

$apiUrl = 'https://us1.locationiq.com/v1/';
$apiKey = 'pk.749763491c32c451d073d51e2afe6bd7';
$locationClient = new LocationClient($apiUrl, $apiKey);
$router = new Router($locationClient);

$requestType = $_GET['request_type'];
$requestData = $_GET['request_data'];

$response = $router->handleRequest($requestType, $requestData);

if (isset($response[0]['lat']) && isset($response[0]['lon'])) {
    echo 'latitude: ' . $response[0]['lat'] . '<br>' . 'longitude: ' . $response[0]['lon'];
    echo '<br><button><a href="index.php">Back</a></button>';
}

if (isset($response['address']['city'])) {
    echo 'Address: ' . $response['address']['city'] . '<br>' . 'Country: ' . $response['address']['country'];
    echo '<br><button><a href="index.php">Back</a></button>';
}

return json_encode($response);
