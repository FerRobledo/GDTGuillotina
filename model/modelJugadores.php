<?php
require_once 'config.php';

class modelJugadores{

    private $db;

    public function __construct(){
        $this->db = $this->connectToDatabase();
    }

    function connectToDatabase()
    {
        try {
            $db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
            return $db;
        } catch (PDOException $e) {
            // (conexion fallida)
            die('Error de conexión a la base de datos: ' . $e->getMessage());
        }
    }

    public function getAll(){
        $sql = "SELECT * FROM jugador ORDER BY posicion";
        $query = $this->db->prepare($sql);
        $query->execute();
        $list = $query->fetchALL(PDO::FETCH_OBJ);
        return $list;
    }

    public function getById($id){
        $sql = "SELECT * FROM jugador WHERE id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $jugador = $query->fetch(PDO::FETCH_OBJ);
        return $jugador;
    }

    public function newJugador($nombre, $apellido, $posicion){
        $sql = "INSERT INTO jugador (nombre, apellido, posicion, puntos, puntos_totales) VALUES (?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->execute([$nombre, $apellido, $posicion, 0, 0]);
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function set0Pts(){
        $sql = "UPDATE jugador
                SET puntos = 0";
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function actualizarPts($idj, $puntos){
        $sql = "UPDATE jugador 
                SET puntos = ?
                WHERE id = ?;";
        $query = $this->db->prepare($sql);
        $query->execute([$puntos, $idj]);
    }

    public function deletePlayer($id){
        $sql = "DELETE FROM `jugador` WHERE id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
    }
}