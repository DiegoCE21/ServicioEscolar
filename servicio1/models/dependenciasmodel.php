<?php
require_once 'model.php';

class DependenciasModel extends Model {
    private $id_empresa;
    private $nombre_empresa;
    private $calle_empresa;
    private $ciudad_empresa;
    private $telefono_empresa;

    public function setIdEmpresa($id_empresa) { $this->id_empresa = $id_empresa; }
    public function setCalleEmpresa($calle_empresa) { $this->calle_empresa = $calle_empresa; }
    public function setCiudadEmpresa($ciudad_empresa) { $this->ciudad_empresa = $ciudad_empresa; }
    public function setTelefonoEmpresa($telefono_empresa) { $this->telefono_empresa = $telefono_empresa; }
    public function setNombreEmpresa($nombre_empresa) { $this->nombre_empresa = $nombre_empresa; }
        
    public function getIdEmpresa() { return $this->id_empresa; }
    public function getCalleEmpresa() { return $this->calle_empresa; }
    public function getCiudadEmpresa() { return $this->ciudad_empresa; }
    public function getTelefonoEmpresa() { return $this->telefono_empresa; }
    public function getNombreEmpresa() { return $this->nombre_empresa; }

    public function __construct() {
        parent::__construct();
    }

    public function getDatos() {
        try {
            $query = $this->prepare('SELECT * FROM empresas');
            $query->execute();
            $datosDelAlumno = $query->fetchAll(PDO::FETCH_ASSOC);

            return $datosDelAlumno;
        } catch (PDOException $e) {
            error_log("DependenciasModel::getDatos() " . $e);
            return false;
        }
    }
}
?>
