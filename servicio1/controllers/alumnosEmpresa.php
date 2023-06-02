<?php
session_start();
require_once 'models/alumnosempresamodel.php';
class AlumnosEmpresa extends Controller {
    function __construct() {
        parent::__construct();
    }

    function render() {
        if (!isset($_SESSION['id_relacion'])) {
            echo "No se ha iniciado sesión.";
            return;
        }
     
        $idRelacion = $_SESSION['id_relacion'];
        $data = new AlumnosEmpresaModel();
        $dataAlumnos = $data->getDatos($idRelacion);
        $imagen = $data->getImagen();
        $this->view->render('empresa/alumnosEmpresa', [
            'dato' => $dataAlumnos,
            'imagen' => $imagen
        ]);
    }
}
?>
