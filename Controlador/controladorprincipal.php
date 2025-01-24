<?php

class controladorprincipal
{
    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    private $vista;
    
    public function login()
    {    

        
        include_once("Vista/frmPulica/frmLogin.php");
    }
    
    public function Cliente()
    {    
        $vista="Vistas/Alumno/frmcontenidoAceptado.php";
        include_once("Vistas/frmplantillaAlumno.php");
    }
//puchaina rico uno pa mi y otra pa mi compa 
    public function Publico()
    {    
        $vista="Vista/frmPublica/menuPublico.php";
        include_once("Vista/frmPublica/targetPublico.php");
    }

    public function Administrador()
    {    
        $vista="Vistas/frmAdministrador/menuAdmi.php";
        include_once("Vistas/frmAdministrador/targetAdmi.php");
    }
}
?>

