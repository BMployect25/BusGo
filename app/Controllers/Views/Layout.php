<?php
require_once __DIR__ . '/partials/header.php';
require_once __DIR__ . '/partials/menu.php';
require_once __DIR__.'/partials/flash.php';

//la linea mas importante de Layout
require_once __DIR__.'/'.$vista;

require_once __DIR__.'/partials/footer.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
    <title>Layout</title>
</head>
<body>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js">
</script>
</body>
</html>