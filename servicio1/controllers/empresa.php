<?php
session_start();
require_once './models/empresamodel.php';

class Empresa extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function render() {
        if (!isset($_SESSION['id_relacion'])) {
            echo "No se ha iniciado sesión.";
            return;
        }

        $idRelacion = $_SESSION['id_relacion'];
        $empresaModel = new EmpresaModel();
        $empresa = $empresaModel->getDatos($idRelacion);
        $data['dato'] = $empresa->getNombreEmpresa();
        $this->view->render('empresa/index', $data);
    }
}
?>
