<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Forms</title>
    <link rel="stylesheet" type="text/css" href="../styles/result.css">
</head>
<body>

<?php if (isset($lat) && isset($lon)): ?>
    <div class="result-container">
        <p class="result-text">Latitude: <?= $lat ?></p>
        <p class="result-text">Longitude: <?= $lon ?></p>
        <div class="button-container"><a href="../index.php">Back</a></div>
    </div>
<?php elseif (isset($fullAddress)): ?>
    <div class="result-container">
        <p class="result-text">Full Address: <?= $fullAddress ?></p>
        <div class="button-container"><a href="../index.php">Back</a></div>
    </div>
<?php elseif (isset($error)): ?>
    <div class="result-container">
        <p class="result-text">Error: <?= $error ?></p>
        <div class="button-container"><a href="../index.php">Back</a></div>
    </div>
<?php endif; ?>
</body>
</html>
