<?php
session_start();
require_once './models/alumnoModel.php';

class Alumno extends Controller {
    function __construct() {
        parent::__construct();
        session_start(); // Inicializar la sesión
    }

    function render() {
        if (!isset($_SESSION['id_relacion'])) {
            echo "No se ha iniciado sesión.";
            return;
        }

        $idRelacion = $_SESSION['id_relacion'];
        
            $data = new AlumnoModel();
            $dataAlumnos = $data->getName($idRelacion);
            $select = $dataAlumnos->getnombre_estudiante() . ' ' . $dataAlumnos->getap_estudiante() . ' ' . $dataAlumnos->getam_estudiante();
            $imagen = $dataAlumnos->getimagen();
            $etapas = $data->etapa($idRelacion);
            $this->view->render('alumno/index', [
                'dato' => $select,
                'imagen' => $imagen,
                'etapa' => $etapas
            ]);
        }

        public function actualizarEtapa(){
            $data = new AlumnoModel();
            $idRelacion = $_SESSION['id_relacion'];
            
            // Realizar las acciones necesarias
            $data->etapa2($idRelacion);
            
            sleep(2);
            
       
        }

        
}
?>
