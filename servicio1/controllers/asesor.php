<?php

class Asesor extends Controller {
    function __construct() {
        parent::__construct();
    }

    function render() {
      
        $this->view->render('asesor/index');
    }
}
?>
