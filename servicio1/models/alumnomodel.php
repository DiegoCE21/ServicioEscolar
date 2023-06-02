<?php
    class AlumnoModel extends Model{
        private $id_estudiante;
        private $nombre_estudiante;
        private $ap_estudiante;
        private $am_estudiante;
        private $semestre_estudiante;
        private $telefono;
        private $carrera;
        private $imagen;

        // exemplo
        public function setid_estudiante($id_estudiante){ $this->id_estudiante = $id_estudiante;}
        public function setnombre_estudiante($nombre_estudiante){ $this->nombre_estudiante = $nombre_estudiante;}
        public function setap_estudiante($ap_estudiante){ $this->ap_estudiante = $ap_estudiante;}
        public function setam_estudiante($am_estudiante){ $this->am_estudiante = $am_estudiante;}
        public function setsemestre_estudiante($semestre_estudiante){ $this->semestre_estudiante = $semestre_estudiante;}
        public function settelefono($telefono){ $this->telefono = $telefono;}
        public function setcarrera($carrera){ $this->carrera = $carrera;}
        public function setimagen($imagen){ $this->imagen = $imagen;}
        
        public function getid_estudiante(){ return $this->id_estudiante;}
        public function getnombre_estudiante(){ return $this->nombre_estudiante;}
        public function getap_estudiante(){ return $this->ap_estudiante;}
        public function getam_estudiante(){ return $this->am_estudiante;}
        public function getsemestre_estudiante(){ return $this->semestre_estudiante;}
        public function gettelefono(){ return $this->telefono;}
        public function getcarrera(){ return $this->carrera;}
        public function getimagen(){ return $this->imagen;}
        // 

        //Si se agregan mas campos, agregar como variable

        public function __construct(){
            parent::__construct();
        }

        public function get($id_estudiante){
            try{
                $query = $this->prepare('SELECT * FROM estudiante WHERE id_estudiante = :id');
                 $query->execute([
                 'id' => $id_estudiante]);
                $datosDelAlumno = $query->fetch(PDO::FETCH_ASSOC);
                //print_r($datosDelAlumno);
                $this->from($datosDelAlumno);

                return $this;
            }
            catch(PDOException $e){
                    error_log("Alumno::get(".$id_estudiante.") ". $e);
                    return false;
                }
        }

        public function getName($id_estudiante){
            try{
                $query = $this->prepare('SELECT nom_estudiante, ap_estudiante, am_estudiante, imagen FROM estudiante WHERE id_estudiante = :id');
                 $query->execute([
                 'id' => $id_estudiante]);
                $datosDelAlumno = $query->fetch(PDO::FETCH_ASSOC);
                //print_r($datosDelAlumno);
                $this->from($datosDelAlumno);

                return $this;
            }
            catch(PDOException $e){
                    error_log("Alumno::get(".$id_estudiante.") ". $e);
                    return false;
                }
        }

        public function from($array){
            $this->id_estudiante = $array['id_estudiante'];
            $this->nombre_estudiante = $array['nom_estudiante'];
            $this->ap_estudiante = $array['ap_estudiante'];
            $this->am_estudiante = $array['am_estudiante'];
            $this->semestre_estudiante = $array['semestre_estudiante'];
            $this->telefono = $array['telefono'];
            $this->carrera = $array['carrera'];
            $this->imagen = base64_encode($array['imagen']);
        }

        public function etapa($id_estudiante){
            try{
                $query = $this->prepare('SELECT * FROM etapa WHERE id_estudiante = :id_estudiante');
                 $query->execute([
                 'id_estudiante' => $id_estudiante]);
                $etapas = $query->fetch(PDO::FETCH_ASSOC);
                //print_r($datosDelAlumno);
                $query->execute();
                $etapas = $query->fetchAll(PDO::FETCH_ASSOC);
      

                return $etapas;
            }
            catch(PDOException $e){
                    error_log("Alumno::get(".$id_estudiante.") ". $e);
                    return false;
                }
        }
    
        public function etapa2($id_estudiante){
            $query = $this->prepare(' UPDATE etapa SET etapa2 = 1 WHERE id_estudiante = :id_estudiante');
            $query->execute([
                'id_estudiante' => $id_estudiante]);
               $etapa = $query->fetch(PDO::FETCH_ASSOC);
               return $etapa;
        }
    }
?>