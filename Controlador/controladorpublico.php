<?php
require_once 'Modelo/clslogin.php';

class controladorpublico {
    private $loginModel;

    public function __construct() {
        $this->loginModel = new clslogin();
    }


    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $email = $_POST['txtEmailI'] ?? '';
            $password = $_POST['txtPasswordI'] ?? '';
            
            $result = $this->loginModel->IniciarSesion($email, $password);
            
            if ($result['respuesta'] == 'Success') {
                session_start();
                $_SESSION['usuario'] = $email;
                header("Location: /proyecto/index?clase=controladorpublico&metodo=inicio");
                exit();
            } else {
                $error = "Usuario o contraseña incorrectos.";
                include_once "Vista/Publica/login.php";
            }
        } else {
            include_once "Vista/Publica/login.php";
        }
    }


    public function logout() {
        session_start();
        session_destroy();
        header("Location: /proyecto/index?clase=controladorpublico&metodo=inicio");
        exit();
    }
}
?>