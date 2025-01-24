<?php
// Verifica si la sesión no está iniciada antes de llamarla
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['Usuario']) || $_SESSION['Rol'] !== 'cliente') {
    // Redirige a la página de login si no hay sesión o el rol no es cliente
    header("Location: /proyecto/index?clase=controladorlogin&metodo=login");
    exit();
}

$usuario = $_SESSION['Usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto/css/targetCliente.css">
    <title>Menú Navegación - Cliente</title>
</head>
<body>
    <!-- Barra de navegación -->
    <header>
        <nav class="navbar">
            <!-- Logo -->
            <div class="logo">
                <img src="/proyecto/img/logo.png" alt="Logo de BDGYM">
            </div>

            <!-- Links de navegación -->
            <ul class="nav-links">
                <li>
                    <a href="#">PRODUCTOS</a>
                    <ul class="submenu">
                        <li><a href="/proyecto/index?clase=controladorproductos&metodo=MostrarCardio">Cardio</a></li>
                        <li><a href="/proyecto/index?clase=controladorproductos&metodo=MostrarFuerza">Fuerza</a></li>
                        <li><a href="/proyecto/index?clase=controladorproductos&metodo=MostrarCrossfit">Crossfit y Boxeo</a></li>
                        <li><a href="/proyecto/index?clase=controladorproductos&metodo=MostrarAccesorios">Accesorios</a></li>
                        <li><a href="/proyecto/index?clase=controladorproductos&metodo=MostrarResidencial">Equipo Residencial</a></li>
                    </ul>
                </li>
                <li><a href="/proyecto/index?clase=controladorgimnasios&metodo=MostrarGimnasios">GIMNASIOS EQUIPADOS</a></li>
                <li><a href="/proyecto/index?clase=controladorempresa&metodo=InformacionEmpresa">EMPRESA</a></li>
                <li><a href="/proyecto/index?clase=controladorcontacto&metodo=FormularioContacto">VENTANA CLIENTE</a></li>
            </ul>

            <!-- Barra de búsqueda -->
            <div class="search-bar">
                <form action="/proyecto/index?clase=controladorproductos&metodo=buscarProducto" method="GET">
                    <input type="text" name="search" placeholder="Buscar productos...">
                    <button type="submit">🔍</button>
                </form>
            </div>

            <!-- Carrito -->
            <div class="cart-icon">
                <a href="/proyecto/index?clase=controladorcarrito&metodo=verCarrito">
                    <img src="/proyecto/img/carrito.png" alt="Carrito de compras">
                </a>
                <span class="cart-count">0</span>
            </div>

            <!-- Mensaje de bienvenida y cierre de sesión -->
            <div class="welcome-section">
                <span class="welcome-message">¡Nos alegra tenerte, <?php echo htmlspecialchars($usuario); ?>!</span>
                <div class="logout">
                    <a href="/proyecto/index?clase=controladorlogin&metodo=logout">Cerrar sesión</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Cuerpo del contenido dinámico -->
    <main>
        <?php include_once($vista); ?>
    </main>
</body>
</html>
