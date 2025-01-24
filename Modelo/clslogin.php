<?php
require_once 'clsconexion.php';

class clslogin extends clsconexion {

    public function IniciarSesion($email, $password) {
        $sql = "CALL spLogin(?, ?)";
        $stmt = $this->conectar->prepare($sql);
        if (!$stmt) {
            die("Error al preparar la consulta: " . $this->conectar->error);
        }
        $stmt->bind_param('ss', $email, $password);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function RegistrarUsuario($nombre, $email, $password, $rol, $pregunta, $respuesta) {
        $sql = "CALL spInsertarUsuarios(?, ?, ?, ?, ?, ?)";
        $stmt = $this->conectar->prepare($sql);
        if (!$stmt) {
            die("Error al preparar la consulta: " . $this->conectar->error);
        }
        $stmt->bind_param('ssssss', $nombre, $email, $password, $rol, $pregunta, $respuesta);
        $stmt->execute();
        return $stmt->affected_rows > 0;
    }

    public function ValidarPreguntaRespuesta($email, $pregunta, $respuesta) {
        $sql = "CALL spValidacionPreguntaRespuesta(?, ?, ?)";
        $stmt = $this->conectar->prepare($sql);
        if (!$stmt) {
            die("Error al preparar la consulta: " . $this->conectar->error);
        }
        $stmt->bind_param('sss', $email, $pregunta, $respuesta);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function RecuperarContrasena($email, $pregunta, $respuesta, $nuevaContrasena) {
        $sql = "CALL spRecuperarContrasena(?, ?, ?, ?)";
        $stmt = $this->conectar->prepare($sql);

        if (!$stmt) {
            die("Error al preparar la consulta: " . $this->conectar->error);
        }
        $stmt->bind_param('ssss', $email, $pregunta, $respuesta, $nuevaContrasena);
        if (!$stmt->execute()) {
            die("Error al ejecutar la consulta: " . $stmt->error);
        }
        return $stmt->affected_rows > 0;
    }

    public function BuscarPorCorreo($email) {
        $sql = "SELECT email, pregunta FROM tblUsuarios WHERE email = ?";
        $stmt = $this->conectar->prepare($sql);
    
        if (!$stmt) {
            die("Error al preparar la consulta: " . $this->conectar->error);
        }
    
        $stmt->bind_param('s', $email);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function ValidarRespuesta($email, $respuesta) {
        $sql = "SELECT * FROM tblUsuarios WHERE email = ? AND respuesta = md5(?)";
        $stmt = $this->conectar->prepare($sql);
    
        if (!$stmt) {
            die("Error al preparar la consulta: " . $this->conectar->error);
        }
    
        $stmt->bind_param('ss', $email, $respuesta);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function ActualizarPassword($email, $nuevaPassword) {
        $nuevaPasswordHash = md5($nuevaPassword); // Encripta la contraseña con md5
        $sql = "UPDATE tblUsuarios SET contrasena = ? WHERE email = ?";
        $stmt = $this->conectar->prepare($sql);
    
        if (!$stmt) {
            die("Error al preparar la consulta: " . $this->conectar->error);
        }
    
        $stmt->bind_param('ss', $nuevaPasswordHash, $email);
        return $stmt->execute();
    }
    
    
    
}
?>
