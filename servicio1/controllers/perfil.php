<?php
session_start();
require_once './models/perfilmodel.php';

class Perfil extends Controller {
    function __construct() {
        parent::__construct();
        session_start(); // Iniciar la sesión
    }

    function render() {
        if (!isset($_SESSION['id_relacion'])) {
            echo "No se ha iniciado sesión.";
            return;
        }
     
        $idRelacion = $_SESSION['id_relacion'];
        $data = new PerfilModel();
        $dataAlumnos = $data->getAllData($idRelacion); // Cambia el valor a la ID del estudiante deseado
        $nombre = $dataAlumnos->getNombreEstudiante();
        $telefono = $dataAlumnos->getTelefono();
        $correo = $dataAlumnos->getCorreo();
        $escuela = $dataAlumnos->getNombreEscuela();
        $carrera = $dataAlumnos->getCarrera();
        $contrasena = $dataAlumnos->getContrasena();
        $empresa = $dataAlumnos->getNombreEmpresa();
        
        // Genera la respuesta con la interfaz deseada
        ob_start();         
        include 'views/alumno/perfil.php';
        $content = ob_get_clean();
    
        echo $content;
    }
}
?>
