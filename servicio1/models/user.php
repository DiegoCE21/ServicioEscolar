<?php
class User {
    private $db;
    
    public function __construct() {
        $this->db = new mysqli('localhost', 'usuario', 'contraseña', 'database');
    }

    public function getUser($email, $password) {
        $stmt = $this->db->prepare('SELECT * FROM registros WHERE correo = ? AND contrasena = ?');
        $stmt->bind_param('ss', $email, $password);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        return $result;
    }
}
?>
