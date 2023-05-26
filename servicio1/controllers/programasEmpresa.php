<?php
class ProgramasEmpresa extends Controller {
    function __construct() {
        parent::__construct();
    }

    function render() {
        $data = new ProgramasEmpresaModel();
        $dataAlumnos = $data->getAllPrograms();

        $this->view->render('empresa/programasEmpresa', [
            'dato' => $dataAlumnos
        ]);
    }

    function DeletePrograma($param = null){
        $programaModel   = new ProgramasEmpresaModel();
        $idPrograma       = $param[0];
        $select             = $programaModel->get($idPrograma);

        $id                 = $programaModel->getid_programa();

        // error_log("components::Entra a delete Componente");

        // error_log("components::Componente: " . $nombre . " Ruta de la imagen: " . $img);

        // unlink($img);

        // error_log("components::imagen Eliminada ✔");

        $res = $programaModel->deletePrograma($idPrograma);

        if($param === NULL){
            $this->redirect('components', []); 
        }

        if ($res) {
             echo 'Programa eliminado';
             //ob_flush();
            // flush();
             sleep(1);
            header("Refresh: 1; URL=" . constant('URL') . 'empresa');
            exit();
        }
        
        else{
            // $this->redirect('components', []);
            // error_log("components::Error al eliminar el elemento " . $id);
        }
    }
    
}
?>
