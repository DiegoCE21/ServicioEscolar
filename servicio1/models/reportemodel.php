<?php

class ReporteModel extends Model {
    private $nombre;
    private $nombre_empresa;
    private $nombre_escuela;

    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setNombreEscuela($nombre_escuela) { $this->nombre_escuela = $nombre_escuela; }
    public function setNombreEmpresa($nombre_empresa) { $this->nombre_empresa = $nombre_empresa; }
        
    public function getNombre() { return $this->nombre; }
    public function getNombreEscuela() { return $this->nombre_escuela; }
    public function getNombreEmpresa() { return $this->nombre_empresa; }

    public function __construct() {
        parent::__construct();
    }

    public function getDatos($id_estudiante) {
        try {
            $query = $this->prepare('SELECT CONCAT(estudiante.nom_estudiante, " ", estudiante.ap_estudiante, " ", estudiante.am_estudiante) AS nombre, nombre_escuela, nombre_empresa
                FROM estudiante
                INNER JOIN registros ON estudiante.id_estudiante = registros.id_relacion
                INNER JOIN estudian ON estudiante.id_estudiante = estudian.id_estudiante
                INNER JOIN escuela ON escuela.id_escuela = estudian.id_escuela
                INNER JOIN haceservicioen ON estudiante.id_estudiante = haceservicioen.id_estudiante
                INNER JOIN empresa ON empresa.id_empresa = haceservicioen.id_empresa
                WHERE registros.rol = "estudiante" AND estudiante.id_estudiante = :id');
            $query->execute(['id' => $id_estudiante]);
            $datosDelAlumno = $query->fetch(PDO::FETCH_ASSOC);
            $this->from($datosDelAlumno);

            return $this;
        } catch (PDOException $e) {
            error_log("ReporteModel::getDatos() " . $e);
            return false;
        }
    }
    public function from($array) {
        // $this->nom_estudiante = $array['nom_estudiante'];
        // $this->ap_estudiante = $array['ap_estudiante'];
        // $this->am_estudiante = $array ['am_estudiante'];
        $this->nombre = $array['nombre'];
        $this->nombre_empresa = $array['nombre_empresa'];
        $this->nombre_escuela = $array['nombre_escuela'];
    }
}
?>
