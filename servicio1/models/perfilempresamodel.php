<?php
class PerfilEmpresaModel extends Model {
    private $nombre_empresa;
    private $nom_titular_empresa;
    private $ap_titular_empresa;
    private $am_titular_empresa;
    private $correo;
    private $contrasena;
    private $telefono_empresa;
    private $imagen_empresa;

    public function setNombreEmpresa($nombre_empresa) { $this->nombre_empresa = $nombre_empresa; }
    public function setNomTitularEmpresa($nom_titular_empresa) { $this->nom_titular_empresa = $nom_titular_empresa; }
    public function setApTitularEmpresa($ap_titular_empresa) { $this->ap_titular_empresa = $ap_titular_empresa; }
    public function setAmTitularEmpresa($am_titular_empresa) { $this->am_titular_empresa = $am_titular_empresa; }
    public function setTelefonoEmpresa($telefono_empresa) { $this->telefono_empresa = $telefono_empresa; }
    public function setCorreo($correo) { $this->correo = $correo; }
    public function setContrasena($contrasena) { $this->contrasena = $contrasena; }
    public function setImagenEmpresa($imagen_empresa){ $this->imagen_empresa = $imagen_empresa;}

    public function getNombreEmpresa() { return $this->nombre_empresa; }
    public function getNomTitularEmpresa() { return $this->nom_titular_empresa; }
    public function getApTitularEmpresa() { return $this->ap_titular_empresa; }
    public function getAmTitularEmpresa() { return $this->am_titular_empresa; }
    public function getTelefonoEmpresa() { return $this->telefono_empresa; }
    public function getCorreo() { return $this->correo; }
    public function getContrasena() { return $this->contrasena; }
    public function getImagenEmpresa(){ return $this->imagen_empresa;}

    public function __construct() {
        parent::__construct();
    }

    public function getAllData($idEmpresa) {
        try {
            $query = $this->prepare('SELECT nombre_empresa, nom_titular_empresa, ap_titluarr_empresa, 
            am_titluar_empresa, telefono_empresa, imagen_empresa, correo, contrasena FROM empresa, registros
            WHERE empresa.id_empresa = registros.id_relacion AND id_empresa = :id ');
            $query->execute(['id' => $idEmpresa]);
            $datosDelAlumno = $query->fetch(PDO::FETCH_ASSOC);
            $this->from($datosDelAlumno);

            return $this;
        } catch (PDOException $e) {
            error_log("PerfilModel::getAllData(" . $idEmpresa . ") " . $e);
            return false;
        }
    }

    public function from($array) {
        $this->nombre_empresa = $array['nombre_empresa'];
        $this->nom_titular_empresa = $array['nom_titular_empresa'];
        $this->ap_titular_empresa = $array['ap_titular_empresa'];
        $this->am_titular_empresa = $array['am_titular_empresa'];
        $this->correo = $array['correo'];
        $this->contrasena = $array['contrasena'];
        $this->telefono_empresa = $array['telefono_empresa'];
        $this->imagen_empresa = base64_encode($array['imagen_empresa']);
    }
}
?>
