<?php if (isset($_SESSION['rol'])): ?>
    <nav class="menu">
        <?php if ($_SESSION['rol'] === 'admin'): ?>
            <a href="/Pruebas/BusGo/public/usuarios">Usuarios</a>
            <a href="/Pruebas/BusGo/public/ruta">Rutas</a>
            <a href="/Pruebas/BusGo/public/vehiculos">Vehículos</a>
            <a href="/Pruebas/BusGo/public/viajes">Viajes</a>
        <?php elseif ($_SESSION['rol'] === 'cliente'): ?>
            <a href="/Pruebas/BusGo/public/rutas">Ver Rutas</a>
            <a href="/Pruebas/BusGo/public/buscar">Buscar Ruta</a>
            <a href="/Pruebas/BusGo/public/horarios">Ver Horarios</a>
        <?php endif; ?>
    </nav>
<?php endif; ?>
