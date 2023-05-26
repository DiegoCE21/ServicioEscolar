<?php
    class InscripcionModel extends Model{
        private $id_programa;
        private $nombre_programa;
        private $descripcion_programa;
        private $fecha_inicio_programa;
        private $hora_inicio;
        private $hora_fin;
        private $actividades;
        private $id_escuela;
        private $carrera_solicitada;
        private $fk_id_empresa;
        private $num_alumnos;

        // exemplo
        public function setid_programa($id_programa){ $this->id_programa = $id_programa;}
        public function setnombre_programa($nombre_programa){ $this->nombre_programa = $nombre_programa;}
        public function setdescripcion_programa($descripcion_programa){ $this->descripcion_programa = $descripcion_programa;}
        public function setfecha_inicio_programa($fecha_inicio_programa){ $this->fecha_inicio_programa = $fecha_inicio_programa;}
        public function sethora_inicio($hora_inicio){ $this->hora_inicio = $hora_inicio;}
        public function sethora_fin($hora_fin){ $this->hora_fin = $hora_fin;}
        public function setactividades($actividades){ $this->actividades = $actividades;}
        public function setid_escuela($id_escuela){ $this->id_escuela = $id_escuela;}
        public function setcarrera_solicitada($carrera_solicitada){ $this->carrera_solicitada = $carrera_solicitada;}
        public function setfk_id_empresa($fk_id_empresa){ $this->fk_id_empresa = $fk_id_empresa;}
        public function setnum_alumnos($num_alumnos){ $this->num_alumnos = $num_alumnos;}
        
        public function getid_programa(){ return $this->id_programa;}
        public function getnombre_programa(){ return $this->nombre_programa;}
        public function getdescripcion_programa(){ return $this->descripcion_programa;}
        public function getfecha_inicio_programa(){ return $this->fecha_inicio_programa;}
        public function gethora_inicio(){ return $this->hora_inicio;}
        public function gethora_fin(){ return $this->hora_fin;}
        public function getactividades(){ return $this->actividades;}
        public function getid_escuela(){ return $this->id_escuela;}
        public function getcarrera_solicitada(){ return $this->carrera_solicitada;}
        public function getfk_id_empresa(){ return $this->fk_id_empresa;}
        public function getnum_alumnos(){ return $this->num_alumnos;}
        // 

        //Si se agregan mas campos, agregar como variable

        public function __construct(){
            parent::__construct();
        }

        public function get() {
            try {
                $query = $this->prepare('SELECT * FROM programa_servicio');
                $query->execute();
                $datosDelPrograma = $query->fetchAll(PDO::FETCH_ASSOC);
    
                return $datosDelPrograma;
            } catch (PDOException $e) {
                // Manejo del error
                return false;
            }
        }

        public function from($array){
            $this->id_programa = $array['id_programa'];
            $this->nombre_programa = $array['nombre_programa'];
            $this->descripcion_programa = $array['descripcion_programa'];
            $this->fecha_inicio_programa = $array['fecha_inicio_programa'];
            $this->hora_inicio = $array['hora_inicio'];
            $this->hora_fin = $array['hora_fin'];
            $this->actividades = $array['actividades'];
            $this->id_escuela = $array['id_escuela'];
            $this->carrera_solicitada = $array['carrera_solicitada'];
            $this->fk_id_empresa = $array['fk_id_empresa'];
            $this->num_alumnos = $array['num_alumnos'];
        }  
    }
?>
