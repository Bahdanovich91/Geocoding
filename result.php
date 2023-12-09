<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Forms</title>
    <link rel="stylesheet" type="text/css" href="styles/result.css">
</head>
<body>
<?php

function displayCoordinates($lat, $lon)
{
    echo '<div class="result-container">';
    echo '<p class="result-text">Latitude: ' . $lat . '</p>';
    echo '<p class="result-text">Longitude: ' . $lon . '</p>';
    echo '<div class="button-container"><a href="index.php">Back</a></div>';
    echo '</div>';
}

function displayLocation($city, $country, $fullAddress)
{
    echo '<div class="result-container">';
    echo '<p class="result-text">Address: ' . $city . '</p>';
    echo '<p class="result-text">Country: ' . $country . '</p>';
    echo '<p class="result-text">Full Address: ' . $fullAddress . '</p>';
    echo '<div class="button-container"><a href="index.php">Back</a></div>';
    echo '</div>';
}

?>
</body>
</html>
