<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - BDGYM</title>
    <link rel="stylesheet" href="/proyecto/css/stylesfrmregister.css">
</head>
<body>
    <form action="/proyecto/index?clase=controladorlogin&metodo=register" method="POST" onsubmit="return validarContraseñas()">
        <h2>Registro</h2>
        <?php 
        if (isset($error)) echo "<p>$error</p>"; 
        if (isset($mensaje)) echo "<p>$mensaje</p>";
        ?>
        <label for="txtNombre">Nombre:</label>
        <input type="text" name="txtNombre" id="txtNombre" required>
        
        <label for="txtEmail">Correo:</label>
        <input type="email" name="txtEmail" id="txtEmail" required>
        
        <label for="txtPassword">Contraseña:</label>
        <input type="password" name="txtPassword" id="txtPassword" required>
        
        <label for="txtConfirmPassword">Confirmar Contraseña:</label>
        <input type="password" name="txtConfirmPassword" id="txtConfirmPassword" required>

        <label for="pregunta">Pregunta Secreta:</label>
        <select name="pregunta" id="pregunta" onchange="mostrarCampoPersonalizado()">
            <option value="" disabled selected>Selecciona una pregunta...</option>
            <option value="¿Cuál es el nombre de tu primera mascota?">¿Cuál es el nombre de tu primera mascota?</option>
            <option value="¿Cuál es tu película favorita?">¿Cuál es tu película favorita?</option>
            <option value="¿En qué ciudad naciste?">¿En qué ciudad naciste?</option>
            <option value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
            <option value="¿Cuál es tu color favorito?">¿Cuál es tu color favorito?</option>
            <option value="custom">Escribir mi propia pregunta</option>
        </select>
        
        <div id="preguntaPersonalizada" style="display: none;">
            <label for="customPregunta">Escribe tu pregunta:</label>
            <input type="text" name="customPregunta" id="customPregunta">
        </div>
        
        <label for="respuesta">Respuesta Secreta:</label>
        <input type="text" name="respuesta" id="respuesta" required>
        
        <button type="submit">Registrarse</button>
        <p>¿Ya tienes cuenta? <a href="/proyecto/index?clase=controladorlogin&metodo=login">Inicia Sesión</a></p>
    </form>

    <script>
        function mostrarCampoPersonalizado() {
            const select = document.getElementById('pregunta');
            const campoPersonalizado = document.getElementById('preguntaPersonalizada');
            
            if (select.value === 'custom') {
                campoPersonalizado.style.display = 'block';
                document.getElementById('customPregunta').required = true;
            } else {
                campoPersonalizado.style.display = 'none';
                document.getElementById('customPregunta').required = false;
            }
        }

        function validarContraseñas() {
            const password = document.getElementById('txtPassword').value;
            const confirmPassword = document.getElementById('txtConfirmPassword').value;

            if (password !== confirmPassword) {
                alert('Las contraseñas no coinciden. Por favor, verifica e inténtalo de nuevo.');
                return false; // Evita que el formulario se envíe
            }

            return true; // Permite el envío del formulario si las contraseñas coinciden
        }
    </script>
</body>
</html>