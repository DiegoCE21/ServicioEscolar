<?php
   class Progreso extends Controller {
    function __construct() {
        parent::__construct();
    }

    function render() {
        $this->view->render('alumno/progreso');
    }
}
?>
