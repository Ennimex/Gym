<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="/proyecto/css/stylesfrmregister.css">
</head>
<body>
    <form action="/proyecto/index?clase=controladorlogin&metodo=verificarEmail" method="POST">
        <h2>Recuperar Contraseña</h2>
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" required>
        <button type="submit">Continuar</button>
    </form>
</body>
</html>
