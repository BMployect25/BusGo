<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mapa</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
</head>
<body>
    <div id="map" style="height: 600px; width: 100%;"></div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        window.paradas = <?= json_encode($paradas) ?>;
        window.recorrido = <?= json_encode($recorrido) ?>;
    </script>

    <script type="module">
        import { iniciarMapa } from "/Pruebas/BusGo/public/js/mapa/main.js";
        
        document.addEventListener("DOMContentLoaded", function() {
            iniciarMapa(window.recorrido);
        });
    </script>
</body>
</html>