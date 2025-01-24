<?php
require_once 'Modelo/clslogin.php';

class controladorlogin {
    private $loginModel;

    public function __construct() {
        $this->loginModel = new clslogin();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $email = $_POST['txtEmailI'] ?? '';
            $password = $_POST['txtPasswordI'] ?? '';
            //que estas haciendo pa?

            // Llama al método para verificar email y contraseña
            $result = $this->loginModel->IniciarSesion($email, $password);

            if ($result && $result->num_rows > 0) {
                $usuario = $result->fetch_assoc();

                // Guarda datos del usuario en la sesión
                $_SESSION['Usuario'] = $usuario['nombre'];
                $_SESSION['Email'] = $usuario['email'];
                $_SESSION['Rol'] = $usuario['rol'];

                // Redirige según el rol del usuario
                if ($usuario['rol'] === 'cliente') {
                    $this->Cliente();
                } elseif ($usuario['rol'] === 'administrador') {
                    $this->Administrador();
                } else {
                    $this->ErrorLogin("Rol no reconocido. Contacta a soporte.");
                }
            } else {
                $this->ErrorLogin("Usuario o contraseña incorrectos.");
            }
        } else {
            include_once "Vista/frmPublica/login.php";
        }
    }

    public function recuperar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $pregunta = $_POST['pregunta'] ?? '';
            $respuesta = $_POST['respuesta'] ?? '';
            $email = $_SESSION['email'] ?? null;
            $nuevoPassword = $_POST['nuevoPassword'] ?? null;

            if ($pregunta === 'custom') {
                $pregunta = $_POST['customPregunta'] ?? '';
            }

            // Verifica pregunta, respuesta y actualiza la contraseña
            $result = $this->loginModel->RecuperarContrasena($email, $pregunta, $respuesta, $nuevoPassword);

            if ($result) {
                ?><script>alert("Contraseña actualizada correctamente.")</script><?php
                session_destroy(); // Limpia la sesión después de la recuperación
                include_once "Vista/frmPublica/login.php"; // Redirige al login
            } else {
                ?><script>alert("La pregunta o respuesta no coincide.")</script><?php
                $this->ConfirmarRespuesta();
                
            }
        } else {
            include_once "Vista/frmPublica/recuperar.php";
        }
    }

    public function verificarEmail() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $email = $_POST['email'] ?? null;
    
            // Verifica si el correo existe en la base de datos
            $result = $this->loginModel->BuscarPorCorreo($email);
    
            if ($result && $result->num_rows > 0) {
                $usuario = $result->fetch_assoc();
    
                $_SESSION['email'] = $email; // Guarda el correo en la sesión
                $_SESSION['pregunta'] = $usuario['pregunta']; // Guarda la pregunta secreta en la sesión
    
                header("Location: /proyecto/index?clase=controladorlogin&metodo=confirmarResp");
                exit();
            } else {
                ?><script>alert("El correo electrónico no está registrado.")</script><?php
                include_once "Vista/frmPublica/recuperar.php";
            }
        } else {
            include_once "Vista/frmPublica/recuperar.php";
        }
    }
    
    

    private function Cliente() {
        $vista = "Vista/frmCliente/menuCliente.php";
        include_once("Vista/frmCliente/targetCliente.php");
    }

    private function Administrador() {
        $vista = "Vista/frmAdministrador/menuAdmi.php";
        include_once("Vista/frmAdministrador/targetAdmi.php");
    }

    private function ConfirmarRespuesta() {
        include_once("Vista/frmPublica/confirmarResp.php");
    }

    private function ErrorLogin($mensaje) {
        $error = $mensaje;
        include_once "Vista/frmPublica/login.php";
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['txtNombre'] ?? '';
            $email = $_POST['txtEmail'] ?? '';
            $password = $_POST['txtPassword'] ?? '';
            $pregunta = $_POST['pregunta'] ?? '';
            $respuesta = $_POST['respuesta'] ?? '';

            if ($pregunta === 'custom') {
                $pregunta = $_POST['customPregunta'] ?? '';
            }

            $result = $this->loginModel->RegistrarUsuario($nombre, $email, $password, 'cliente', $pregunta, $respuesta);

            if ($result) {
                $mensaje = "Registro exitoso, por favor inicie sesión.";
                include_once "Vista/frmPublica/login.php";
            } else {
                $error = "No se pudo registrar el usuario.";
                include_once "Vista/frmPublica/register.php";
            }
        } else {
            include_once "Vista/frmPublica/register.php";
        }
    }

    public function confirmarResp() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $respuesta = $_POST['respuesta'] ?? null;
        $email = $_SESSION['email'] ?? null;

        if ($respuesta && $email) {
            // Verifica si la respuesta es correcta
            $result = $this->loginModel->ValidarRespuesta($email, $respuesta);

            if ($result && $result->num_rows > 0) {
                // Si es correcta, redirige al formulario para restablecer contraseña
                header("Location: /proyecto/index?clase=controladorlogin&metodo=restablecerPass");
                exit();
            } else {
                ?><script>alert("La respuesta es incorrecta. Inténtalo nuevamente.")</script><?php
                include_once "Vista/frmPublica/confirmarResp.php";
            }
        } else {
            header("Location: /proyecto/index?clase=controladorlogin&metodo=recuperar");
            exit();
        }
    } else {
        include_once "Vista/frmPublica/confirmarResp.php";
    }
}

public function restablecerPass() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $nuevaPassword = $_POST['nuevaPassword'] ?? null;
        $confirmarPassword = $_POST['confirmarPassword'] ?? null;
        $email = $_SESSION['email'] ?? null;

        if ($nuevaPassword && $confirmarPassword && $email) {
            if ($nuevaPassword === $confirmarPassword) {
                // Actualiza la contraseña en la base de datos
                $result = $this->loginModel->ActualizarPassword($email, $nuevaPassword);

                if ($result) {
                    ?><script>alert("Contraseña restablecida correctamente.")</script><?php
                    session_destroy(); // Limpia la sesión después de la recuperación
                    include_once "Vista/frmPublica/login.php";
                } else {
                    ?><script>alert("Error al actualizar la contraseña. Inténtalo más tarde.")</script><?php
                    include_once "Vista/frmPublica/restablecerPass.php";
                }
            } else {
                ?><script>alert("Las contraseñas no coinciden. Inténtalo nuevamente.")</script><?php
                include_once "Vista/frmPublica/restablecerPass.php";
            }
        } else {
            header("Location: /proyecto/index?clase=controladorlogin&metodo=recuperar");
            exit();
        }
    } else {
        include_once "Vista/frmPublica/restablecerPass.php";
    }
}

    

    public function logout() {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
        header("Location: /proyecto/index?clase=controladorprincipal&metodo=Publico");
        exit();
    }
}
?>
