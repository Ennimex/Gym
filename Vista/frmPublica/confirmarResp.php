<?php
// Inicia la sesión si aún no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica que la pregunta esté disponible en la sesión
if (!isset($_SESSION['pregunta'])) {
    header("Location: /proyecto/index?clase=controladorlogin&metodo=recuperar");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Respuesta</title>
    <link rel="stylesheet" href="/proyecto/css/stylesfrmregister.css">
</head>
<body>
    <form action="/proyecto/index?clase=controladorlogin&metodo=confirmarResp" method="POST">
        <h2>Restablecer Contraseña</h2>
        <p>Pregunta Secreta:</p>
        <p><strong><?php echo htmlspecialchars($_SESSION['pregunta']); ?></strong></p>

        <label for="respuesta">Respuesta Secreta:</label>
        <input type="text" name="respuesta" id="respuesta" required>
        <button type="submit">Confirmar Respuesta</button>
    </form>
</body>
</html>
