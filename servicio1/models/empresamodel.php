<?php
class EmpresaModel extends Model {
    private $nombre_empresa;

    public function setNombreEmpresa($nombre_empresa) {
        $this->nombre_empresa = $nombre_empresa;
    }

    public function getNombreEmpresa() {
        return $this->nombre_empresa;
    }

    public function __construct() {
        parent::__construct();
    }

    public function getDatos($id_empresa) {
        try {
            $query = $this->prepare('SELECT nombre_empresa
                FROM empresa
                WHERE id_empresa = :id');
            $query->execute(['id' => $id_empresa]);
            $datosDeLaEmpresa = $query->fetch(PDO::FETCH_ASSOC);
            $this->from($datosDeLaEmpresa);

            return $this;
        } catch (PDOException $e) {
            error_log("EmpresaModel::getDatos() " . $e);
            return false;
        }
    }

    public function from($array) {
        $this->nombre_empresa = $array['nombre_empresa'];
    }
}
?>
