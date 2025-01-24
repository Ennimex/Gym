<?php
// Verifica si la sesión no está iniciada antes de llamarla
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['Usuario']) || $_SESSION['Rol'] !== 'administrador') {
    // Redirige a la página de login si no hay sesión o el rol no es administrador
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
    <link rel="stylesheet" href="css/targetGeneral.css">
    <title>Panel de Administración</title>
</head>
<body>
<header>
    <div id="main-menu">
        <nav id="menu-area">
            <div class="logo">
                <img src="img/logo.png" alt="Logo">
            </div>
            <ul>
                <li>
                    <a href="#">GESTIONES</a>
                    <ul class="submenu">
                        <li><a href="/Proyecto/index?clase=controladorproductos&metodo=gestionarProductos">Gestión de Productos</a></li>
                        <li><a href="/Proyecto/index?clase=controladorpedidos&metodo=gestionarPedidos">Gestión de Pedidos</a></li>
                        <li><a href="/Proyecto/index?clase=controladorclientes&metodo=gestionarClientes">Gestión de Clientes</a></li>
                    </ul>
                </li>
                <li><a href="/Proyecto/index?clase=controladorreportes&metodo=mostrarReportes">Reportes de Ventas</a></li>
                <li><a href="/Proyecto/index?clase=controladorcategorias&metodo=gestionarCategorias">Categorías</a></li>
                <li><a href="/Proyecto/index?clase=controladorconfiguracion&metodo=ajustes">Configuración</a></li>
                <li><a href="/Proyecto/index?clase=controladorempresa&metodo=InformacionEmpresa">EMPRESA</a></li>
                <!-- Mensaje de bienvenida -->
                <li class="welcome-message">
                    Bienvenido Administrador, <?php echo htmlspecialchars($usuario); ?>!
                </li>
                <li class="logout">
                    <a href="/proyecto/index?clase=controladorlogin&metodo=logout">Cerrar sesión</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
<br>
<br>
<!-- Cuerpo del contenido dinámico -->
<?php include_once($vista); ?>
</body>
</html>
