<?php
require_once './models/programasalumnomodel.php';

class ProgramasAlumno extends Controller {
    function __construct() {
        parent::__construct();
    }

    function render() {
        $data = new ProgramasAlumnoModel();
        $dataAlumnos = $data->getAllPrograms('ISC');
        $id_programa = $_POST['id_programa'];
        $id_estudiante = $_POST['id_estudiante'];
        $dataEnfermeria = $data->getEstudianteData('1');

        $this->view->render('alumno/programasalumno', [
            'programasAlumnos' => $dataAlumnos,
            'programasEnfermeria' => $dataEnfermeria
        ]);
    }

    function postularme() {
    $id_programa = $_POST['id_programa'];
    $id_estudiante = $_POST['id_estudiante'];

    $model = new ProgramasAlumnoModel();

    $solicitudExistente = $model->checkSolicitudExistente($id_estudiante, $id_programa);

    if ($solicitudExistente) {
        echo 'Ya te has postulado a este programa';
        $mensaje = 'Ya te encuentras registrado en un programa';
    } else {
        $model->insertSolicitud($id_estudiante, $id_programa);

        $servicioExistente = $model->checkServicioExistente($id_estudiante, $id_programa);

        if ($servicioExistente) {
            $mensaje = 'Ya te encuentras registrado en un programa';
        } else {
            $mensaje = 'Te has postulado al programa '.$id_programa;
        }
    }

    $data = new ProgramasAlumnoModel();
    $dataAlumnos = $data->getAllPrograms('ISC');
    $id_programa = $_POST['id_programa'];
    $id_estudiante = $_POST['id_estudiante'];
    $dataEnfermeria = $data->getEstudianteData('1');

    $this->view->render('alumno/programasalumno', [
        'programasAlumnos' => $dataAlumnos,
        'programasEnfermeria' => $dataEnfermeria,
        'mensaje' => $mensaje
    ]);
}

    
}    
?>
