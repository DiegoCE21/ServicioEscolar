<?php
session_start();
require_once './models/perfilempresamodel.php';

class PerfilEmpresa extends Controller {
    function __construct() {
        parent::__construct();
    }

    function render() {
        if (!isset($_SESSION['id_relacion'])) {
            echo "No se ha iniciado sesión.";
            return;
        }
     
        $idRelacion = $_SESSION['id_relacion'];
        $data = new PerfilEmpresaModel();
        $dataAlumnos = $data->getAllData($idRelacion); // Cambia el valor a la ID del estudiante deseado
        $nombre = $dataAlumnos->getNombreEmpresa();
        $telefono = $dataAlumnos->getTelefonoEmpresa();
        $correo = $dataAlumnos->getCorreo();
        $contrasena = $dataAlumnos->getContrasena();
        $imagen = $dataAlumnos->getImagenEmpresa();

        // Genera la respuesta con la interfaz deseada
        ob_start();         
        include 'views/empresa/perfilempresa.php';
        $content = ob_get_clean();
    
        echo $content;
    }
}
?>
