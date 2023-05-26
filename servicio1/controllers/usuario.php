<?php
// LoginController.php
require_once './models/usuario.php';

class Usuario extends Controller {
    function __construct() {
        parent::__construct();
        session_start(); // Iniciar la sesión
    }

    function render() {
        $this->view->render('login/index');
    }

    function verify() {
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        $user = new UsuarioModel();
        $userData = $user->verifyUser($correo, $contrasena);

        if ($userData) {
            // El usuario existe, iniciar sesión
            $_SESSION['user'] = $correo;
            $_SESSION['id_relacion'] = $userData['id_relacion'];
            
            // Redireccionar según el rol
            $rol = $userData['rol'];
            switch ($rol) {
                case 'Administrador':
                    // echo $_SESSION['id_relacion'];
                    header('location: ' . constant('URL') . 'asesor');
                    break;
                case 'Estudiante':
                    header('location: ' . constant('URL') . 'alumno?id_relacion=' . $userData['id_relacion']);
                    break;
                case 'Empresa':
                    header('location: ' . constant('URL') . 'empresa');
                    break;
                default:
                    // Rol desconocido, redirigir a la página de inicio de sesión con error
                    // $this->view->message = "Rol desconocido";
                    // $this->render();
                    echo "Rol desconocido";
                    break;
            }
        } else {
            // El usuario no existe, redirigir a la página de inicio de sesión con error
            // $this->view->message = "Credenciales incorrectas";
            // $this->render();
            echo "Credenciales incorrectas";
        }
    }
}
?>