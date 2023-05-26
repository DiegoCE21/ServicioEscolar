<?php

// UserModel.php
class UsuarioModel extends Model{
    private $id_usuario;
    private $correo;
    private $contrasena;
    private $rol;
    private $id_relacion;

    public function setid_usuario($id_usuario){ $this->id_usuario = $id_usuario;}
    public function setcorreo($correo){ $this->correo = $correo;}
    public function setcontrasena($contrasena){ $this->contrasena = $contrasena;}
    public function setrol($rol){ $this->rol = $rol;}
    public function setid_relacion($id_relacion){ $this->id_relacion = $id_relacion;}

    public function getid_usuario(){ return $this->id_usuario;}
    public function getcorreo(){ return $this->correo;}
    public function getcontrasena(){ return $this->contrasena;}
    public function getrol(){ return $this->rol;}
    public function getid_relacion(){ return $this->id_relacion;}

    public function __construct(){
        parent::__construct();
    }

    public function verifyUser($correo, $contrasena){
        try{
            $query = $this->prepare('SELECT * FROM registros WHERE correo = :correo AND contrasena = :contrasena');
            $query->execute([
                'correo' => $correo,
                'contrasena' => $contrasena
            ]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
            return $user;
        }catch(PDOException $e){
            error_log("UserModel::verifyUser() " . $e);
            return false;
        }
    }
}


?>