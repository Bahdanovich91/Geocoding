<?php
require_once 'app/Controllers/LocationController.php';
require_once 'app/Services/HttpClient.php';
require_once 'routes/Router.php';
require_once 'result.php';

$config = require_once 'env.php';

$apiUrl = $config['API_URL'];
$apiKey = $config['API_KEY'];

$httpClient = new HttpClient();
$locationClient = new LocationController($apiUrl, $apiKey, $httpClient);
$router = new Router($locationClient);

$requestType = $_GET['request_type'];
$requestData = $_GET['request_data'];

$response = $router->handleRequest($requestType, $requestData);

if (isset($response[0]['lat']) && isset($response[0]['lon'])) {
    displayCoordinates($response[0]['lat'], $response[0]['lon']);
}

if (isset($response['address']['city'])) {
    displayLocation($response['address']['city'], $response['address']['country'], $response['display_name']);
}
