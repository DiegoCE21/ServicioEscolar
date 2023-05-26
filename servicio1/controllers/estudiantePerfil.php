<?php

require_once './models/estudianteperfilmodel.php';

class EstudiantePerfil extends Controller {
    function __construct() {
        parent::__construct();
    }

    function render() {
        if (isset($_GET['id_relacion'])) {
            $idRelacion = $_GET['id_relacion'];
        
            $data = new AlumnoModel();
        $data = new EstudiantePerfilModel();
        $dataAlumnos = $data->getAllData($idRelacion); // Cambia el valor a la ID del estudiante deseado
        $nombre = $dataAlumnos->getNombreEstudiante();
        $telefono = $dataAlumnos->getTelefono();
        $correo = $dataAlumnos->getCorreo();
        $escuela = $dataAlumnos->getNombreEscuela();
        $carrera = $dataAlumnos->getCarrera();
        // Genera la respuesta con la interfaz deseada
        ob_start();
        include 'views/empresa/estudiantePerfil.php';
        $content = ob_get_clean();
    
        echo $content;
    }
}
    
}


?>
