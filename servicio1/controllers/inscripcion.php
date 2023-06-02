<?php
   class Inscripcion extends Controller {
    function __construct() {
        parent::__construct();
    }

    function render() {
        $data = new InscripcionModel();
        $dataAlumnos = $data->get();

        $this->view->render('alumno/inscripcion', [
            'dato' => $dataAlumnos
        ]);
    }
}
?>
