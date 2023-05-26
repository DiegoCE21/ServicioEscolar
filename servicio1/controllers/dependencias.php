<?php
require_once 'models/dependenciasmodel.php';
require_once 'controllers/controller.php';

class Dependencias extends Controller {
    function __construct() {
        parent::__construct();
    }

    function render() {
        $data = new DependenciasModel();
        $dataAlumnos = $data->getDatos();

        $this->view->render('asesor/dependencias', [
            'dato' => $dataAlumnos
        ]);
    }
}
?>
