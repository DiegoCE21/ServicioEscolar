<?php
    class Reporte extends Controller{
        function __construct(){
            parent::__construct();
        }

        function render(){
            $this->view->render('alumno/reporte');
        }
    }
?>