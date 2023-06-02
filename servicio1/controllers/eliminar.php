<?php
class ProgramasEmpresa extends Controller {
    function __construct() {
        parent::__construct();
    }

    function eliminar($id_programa) {
        $model = new ProgramasEmpresaModel();
        $success = $model->eliminarPrograma($id_programa);
    
        if ($success) {
            $response = array('success' => true);
        } else {
            $response = array('success' => false);
        }
    
        header('Content-Type: application/json'); // Establecer la cabecera Content-Type
        echo json_encode($response);
    }
    
}
?>
