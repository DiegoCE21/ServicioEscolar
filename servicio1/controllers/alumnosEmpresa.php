<?php
require_once 'models/alumnosempresamodel.php';
class AlumnosEmpresa extends Controller {
    function __construct() {
        parent::__construct();
    }

    function render() {
        $data = new AlumnosEmpresaModel();
        $dataAlumnos = $data->getDatos();

        $this->view->render('empresa/alumnosEmpresa', [
            'dato' => $dataAlumnos
        ]);
    }
}
?>
