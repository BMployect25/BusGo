<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mapa</title>
</head>
<body>
    <div id="map"></div>

    <script>
        const paradas = <?= json_encode($paradas) ?>;
        const recorrido = <?= json_encode($recorrido) ?>;
    </script>

    <script type="module" src="/Pruebas/BusGo/public/js/mapa/main.js"></script>
</body>
</html>