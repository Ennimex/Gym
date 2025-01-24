<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/proyecto/css/stylesfrmregister.css">
    <title>Document</title>
</head>
<body>

    <form action="/proyecto/index?clase=controladorlogin&metodo=restablecerPass" method="POST">
    <h2>Restablecer Contraseña</h2>
    <label for="nuevaPassword">Nueva Contraseña:</label>
    <input type="password" name="nuevaPassword" id="nuevaPassword" required>

    <label for="confirmarPassword">Confirmar Contraseña:</label>
    <input type="password" name="confirmarPassword" id="confirmarPassword" required>

    <button type="submit">Restablecer</button>
</form>


</body>
</html>