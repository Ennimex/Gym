<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - BDGYM</title>
    <link rel="stylesheet" href="/proyecto/css/stylesfrmlogin.css">
</head>
<body>
    <form action="/proyecto/index?clase=controladorlogin&metodo=login" method="POST">
        <h2>Iniciar Sesión</h2>
        <?php if (isset($error)) echo "<p>$error</p>"; ?>
        <label for="txtEmailI">Correo:</label>
        <input type="email" name="txtEmailI" id="txtEmailI" required>
        <label for="txtPasswordI">Contraseña:</label>
        <input type="password" name="txtPasswordI" id="txtPasswordI" required>
        <button type="submit">Iniciar Sesión</button>
        <p>No tienes una cuenta? <a href="/proyecto/index?clase=controladorlogin&metodo=register">Regístrate</a></p>
        <p><a href="/proyecto/index?clase=controladorlogin&metodo=recuperar">Olvidé mi contraseña</a></p>
    </form>
</body>
</html>
