<?php
session_start();

require_once './models/reportemodel.php';

class Reporte extends Controller {
    function __construct() {
        parent::__construct();
        $this->model = new ReporteModel();
    }

    function render() {
        if (!isset($_SESSION['id_relacion'])) {
            echo "No se ha iniciado sesión.";
            return;
        }
     
        $idRelacion = $_SESSION['id_relacion'];
        $datosDelAlumno = $this->model->getDatos($idRelacion);
        $this->view->datos = $datosDelAlumno;
        $this->view->render('alumno/reporte', [
            'datos' => $datosDelAlumno
        ]);
    }
}
?>
