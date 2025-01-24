<?php
class clsconexion {
    private $servidor = 'localhost';
    private $base = 'bdgym'; 
    private $usuario = 'root'; 
    private $passw = '';

    public $conectar;

    function __construct() {
        $this->conectar = new mysqli($this->servidor, $this->usuario, $this->passw, $this->base);

        if ($this->conectar->connect_error) {
            die("Imposible conectarse: " . $this->conectar->connect_error);
        }
        $this->conectar->set_charset("utf8");
    }

    public function cerrarConexion() {
        if ($this->conectar) {
            $this->conectar->close();
        }
    }
}
?>