<?php
    require_once 'backend.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Location Forms</title>
    <link rel="stylesheet" type="text/css" href="styles/index.css">
</head>
<body>

    <div class="forms-container">
        <h2>Form to Send Coordinates</h2>
        <form action="backend.php" method="get">
            <input type="hidden" name="request_type" value="get_address">
            <span>Latitude: </span>
            <input type="text" name="request_data[latitude]" required><br>
            <span>Longitude: </span>
            <input type="text" name="request_data[longitude]" required><br>
            <input type="submit" value="Get Address">
        </form>

        <hr>

        <h2>Form to Send Location</h2>
        <form action="backend.php" method="get">
            <input type="hidden" name="request_type" value="get_coordinates">
            <span>Address: </span>
            <input type="text" name="request_data[address]" required><br>
            <input type="submit" value="Get Coordinates">
        </form>
    </div>

</body>
</html>
