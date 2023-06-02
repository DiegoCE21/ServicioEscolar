<?php
class UserModel extends Model implements IModel{
    private $correo;
    private $contrasena;
    private $rol;

    public function __construct(){
        parent::__construct();
        $this->correo = '';
        $this->contrasena = '';
        $this->rol = '';
    }

    public function save(){
        try {
            $query = $this->db->prepare('INSERT INTO tprofesor(nombre, apellido, username, role, password) VALUES(:nombre, :apellido, :username, :role, :password)');
            $query->execute([
                'nombre'    => $this->nombre,
                'apellido'  => $this->apellido,
                'username'  => $this->username,
                'role'      => $this->role,
                'password'  => $this->password
            ]);

            return true;
        } catch (PDOException $e) {
            error_log('USERMODEL::SAVE->PDOException ' . $e);
            return false;
        }
    }

    public function getAll(){
        $items = [];

        try {
            $query = $this->db->query('SELECT * FROM registros');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UserModel();
                $item->setCorreo($p['correo']); 
                $item->setContrasena($p['contrasena']);  
                $item->setRol($p['rol']); 
                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            error_log('USERMODEL::GetAll->PDOException ' . $e);
            return [];
        }
    }

    public function get($correo){
        try {
            $query = $this->db->prepare('SELECT * FROM registros WHERE correo = :id');
            $query->execute(['id' => $correo]);

            $user = $query->fetch(PDO::FETCH_ASSOC);
           
            $this->setCorreo($user['correo']); 
            $this->setContrasena($user['contrasena']); 
            $this->setRol($user['rol']);
            echo $this;
            return $this;
        } catch (PDOException $e) {
            error_log('USERMODEL::GetId->PDOException ' . $e);
            return NULL;
        }
    }

    public function delete($correo){
        try {
            $query = $this->db->prepare('DELETE FROM registros WHERE correo = :id');
            $query->execute(['id' => $correo]);
            
            return true;
        } catch (PDOException $e) {
            error_log('USERMODEL::Delete->PDOException ' . $e);
            return false;
        }
    }

    public function update(){
        try {
            $query = $this->db->prepare('UPDATE registros SET correo = :correo, contrasena = :contrasena, rol = :rol WHERE correo = :correo');
            $query->execute([
                'correo' => $this->correo,
                'contrasena' => $this->contrasena,
                'rol' => $this->rol
            ]);

            return true;
        } catch (PDOException $e) {
            error_log('USERMODEL::Update->PDOException ' . $e);
            return false;
        }
    }

    public function from($array){
        $this->correo = $array['correo'];
        $this->contrasena = $array['contrasena'];
        $this->rol = $array['rol'];
    }

    public function __toString(){
        $result = [
            'correo' => $this->correo,
            'contrasena' => $this->contrasena,
            'rol' => $this->rol
        ];
        return json_encode($result);
    }

    // Getters and Setters
    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function getContrasena(){
        return $this->contrasena;
    }

    public function setContrasena($contrasena){
        $this->contrasena = $contrasena;
    }

    public function getRol(){
        return $this->rol;
    }

    public function setRol($rol){
        $this->rol = $rol;
    }
}
?>
