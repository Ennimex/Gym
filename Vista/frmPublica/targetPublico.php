<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/targetGeneral.css">
    <title>Menú Navegación</title>
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
                    <a href="#">PRODUCTOS</a>
                    <ul class="submenu">
                        <li><a href="/Proyecto/index?clase=controladorproductos&metodo=MostrarCardio">Cardio</a></li>
                        <li><a href="/Proyecto/index?clase=controladorproductos&metodo=MostrarFuerza">Fuerza</a></li>
                        <li><a href="/Proyecto/index?clase=controladorproductos&metodo=MostrarCrossfit">Crossfit y Boxeo</a></li>
                        <li><a href="/Proyecto/index?clase=controladorproductos&metodo=MostrarAccesorios">Accesorios</a></li>
                        <li><a href="/Proyecto/index?clase=controladorproductos&metodo=MostrarResidencial">Equipo Residencial</a></li>
                    </ul>
                </li>
                <li><a href="/Proyecto/index?clase=controladorgimnasios&metodo=MostrarGimnasios">GIMNASIOS EQUIPADOS</a></li>
                <li><a href="/Proyecto/index?clase=controladorempresa&metodo=InformacionEmpresa">EMPRESA</a></li>
                <li><a href="/Proyecto/index?clase=controladorlogin&metodo=login">Iniciar Sesion</a></li>
                <li><a href="/Proyecto/index?clase=controladorlogin&metodo=register">Registrarse</a></li>
            </ul>
        </nav>
    </div>
</header>
<!-- Cuerpo del contenido dinámico -->
<?php include_once($vista); ?>
</body>
</html>
