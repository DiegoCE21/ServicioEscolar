<?php

class ProgramasAlumnoModel extends Model {
    function __construct() {
        parent::__construct();
    }

    function getAllPrograms($carrera) {
        try {
            $query = $this->prepare('SELECT * FROM programa_servicio WHERE carrera_solicitada = :carrera');
            $query->execute(['carrera' => $carrera]);
            $programas = $query->fetchAll(PDO::FETCH_ASSOC);
            return $programas;
        } catch (PDOException $e) {
            // Manejo del error
            return false;
        }
    }

    function checkSolicitudExistente($id_estudiante, $id_programa) {
        try {
            $query = $this->prepare('SELECT COUNT(*) FROM solicitud WHERE id_estudiante = :id_estudiante AND id_programa = :id_programa');
            $query->execute(['id_estudiante' => $id_estudiante, 'id_programa' => $id_programa]);
            $count = $query->fetchColumn();
            return ($count > 0);
        } catch (PDOException $e) {
            // Manejo del error
            return false;
        }
    }

    function insertSolicitud($id_estudiante, $id_programa) {
        try {
            $query = $this->prepare('INSERT INTO solicitud (id_estudiante, id_programa) VALUES (:id_estudiante, :id_programa)');
            $query->execute(['id_estudiante' => $id_estudiante, 'id_programa' => $id_programa]);
            return true;
        } catch (PDOException $e) {
            // Manejo del error
            return false;
        }
    }

    function checkServicioExistente($id_estudiante, $id_programa) {
        try {
            $query = $this->prepare('SELECT COUNT(*) FROM haceservicioen WHERE id_estudiante = :id_estudiante AND id_programa = :id_programa');
            $query->execute(['id_estudiante' => $id_estudiante, 'id_programa' => $id_programa]);
            $count = $query->fetchColumn();
            return ($count > 0);
        } catch (PDOException $e) {
            // Manejo del error
            return false;
        }
    }

    function insertServicio($id_estudiante, $id_programa) {
        try {
            $query = $this->prepare('INSERT INTO haceservicioen (id_estudiante, id_programa) VALUES (:id_estudiante, :id_programa)');
            $query->execute(['id_estudiante' => $id_estudiante, 'id_programa' => $id_programa]);
            return true;
        } catch (PDOException $e) {
            // Manejo del error
            return false;
        }
    }

    function getEstudianteData($id_estudiante) {
        try {
            $query = $this->prepare('SELECT id_estudiante, id_escuela FROM estudiante WHERE id_estudiante = :id_estudiante');
            $query->execute(['id_estudiante' => $id_estudiante]);
            $estudianteData = $query->fetch(PDO::FETCH_ASSOC);
            return $estudianteData;
        } catch (PDOException $e) {
            // Manejo del error
            return false;
        }
    }
}
?>
