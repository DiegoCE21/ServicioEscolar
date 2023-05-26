<?php
require_once './models/alumnoModel.php';

class Alumno extends Controller {
    function __construct() {
        parent::__construct();
        session_start(); // Inicializar la sesión
    }

    function render() {
        if (isset($_GET['id_relacion'])) {
            $idRelacion = $_GET['id_relacion'];
        
            $data = new AlumnoModel();
            $dataAlumnos = $data->getName($idRelacion);
            $select = $dataAlumnos->getnombre_estudiante() . ' ' . $dataAlumnos->getap_estudiante() . ' ' . $dataAlumnos->getam_estudiante();
        
            $this->view->render('alumno/index', [
                'dato' => $select
            ]);
        } else {
            // id_relacion no se pasó como parámetro en la URL
            echo "Error: Parámetro 'id_relacion' no encontrado.";
        }
        
}}
?>
