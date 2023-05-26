<?php
class PerfilModel extends Model {
    private $nombre_estudiante;
    private $telefono;
    private $correo;
    private $nombre_escuela;
    private $carrera;
    private $contrasena;
    private $nombre_empresa;

    public function setNombreEstudiante($nombre_estudiante) { $this->nombre_estudiante = $nombre_estudiante; }
    public function setTelefono($telefono) { $this->telefono = $telefono; }
    public function setCorreo($correo) { $this->correo = $correo; }
    public function setNombreEscuela($nombre_escuela) { $this->nombre_escuela = $nombre_escuela; }
    public function setCarrera($carrera) { $this->carrera = $carrera; }
    public function setContrasena($contrasena) { $this->contrasena = $contrasena; }
    public function setNombreEmpresa($nombre_empresa) { $this->nombre_empresa = $nombre_empresa; }
        
    public function getNombreEstudiante() { return $this->nombre_estudiante; }
    public function getTelefono() { return $this->telefono; }
    public function getCorreo() { return $this->correo; }
    public function getNombreEscuela() { return $this->nombre_escuela; }
    public function getCarrera() { return $this->carrera; }
    public function getContrasena() { return $this->contrasena; }
    public function getNombreEmpresa() { return $this->nombre_empresa; }

    public function __construct() {
        parent::__construct();
    }

    public function getAllData($id_estudiante) {
        try {
            $query = $this->prepare('SELECT CONCAT(estudiante.nom_estudiante, " ", estudiante.ap_estudiante, " ", estudiante.am_estudiante) AS nombre, telefono, correo, nombre_escuela, carrera, contrasena, nombre_empresa
            FROM estudiante, registros, escuela, haceservicioen, empresa, estudian
                                    WHERE estudiante.id_estudiante = haceservicioen.id_estudiante
                                    AND empresa.id_empresa = haceservicioen.id_empresa
                                    AND estudiante.id_estudiante = registros.id_relacion
                                    AND estudiante.id_estudiante = estudian.id_estudiante
                                    AND escuela.id_escuela = estudian.id_escuela
                                    AND registros.rol = "estudiante"
                                    AND estudiante.id_estudiante = :id');
            $query->execute(['id' => $id_estudiante]);
            $datosDelAlumno = $query->fetch(PDO::FETCH_ASSOC);
            $this->from($datosDelAlumno);

            return $this;
        } catch (PDOException $e) {
            error_log("PerfilModel::getAllData(" . $id_estudiante . ") " . $e);
            return false;
        }
    }

    public function from($array) {
        $this->nombre_estudiante = $array['nombre'];
        $this->telefono = $array['telefono'];
        $this->correo = $array['correo'];
        $this->nombre_escuela = $array['nombre_escuela'];
        $this->carrera = $array['carrera'];
        $this->contrasena = $array['contrasena'];
        $this->nombre_empresa = $array['nombre_empresa'];
    }
}


?>