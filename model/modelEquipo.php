<?php
require_once 'config.php';

class modelEquipo{

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

    public function getEquipoByName($name){
        $sql = "SELECT * FROM equipo WHERE nombre = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$name]);
        $equipo = $query->fetch(PDO::FETCH_OBJ);
        return $equipo;
    }

    public function newTeam($nombre, $id_usuario, $capitan, $j2, $j3, $j4, $j5){
        // Insertar el equipo en la tabla "Equipo"
        $sql = "INSERT INTO equipo (nombre, usuario_id) VALUES (?, ?)";
        $query = $this->db->prepare($sql);
        $query->execute([$nombre, $id_usuario]);
        $id_equipo = $this->db->lastInsertId();
    
        // Insertar los jugadores en la tabla intermedia "equipo_jugador"
        $sql = "INSERT INTO equipo_jugador (nombre_equipo, jugador_id, es_capitan) VALUES (?, ?, ?)";
        $query = $this->db->prepare($sql);
        $query->execute([$nombre, $capitan, 1]); // Insertar el capitán
        $query->execute([$nombre, $j2, 0]); // Insertar los otros jugadores
        $query->execute([$nombre, $j3, 0]);
        $query->execute([$nombre, $j4, 0]);
        $query->execute([$nombre, $j5, 0]);
    
        return $id_equipo;
    }

    public function getAll(){
        $sql = "SELECT * FROM equipo";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function checkPlayerInTeam($nombre, $id){
        $sql = "SELECT * FROM equipo_jugador WHERE nombre_equipo = ? AND jugador_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$nombre, $id]);
        $jugador = $query->fetch(PDO::FETCH_OBJ);
        return $jugador;
    }

    public function getAllTeamByUserId($id){
        $sql = "SELECT e.*, u.hizoCambio, j.nombre AS nombre_jugador, j.apellido AS apellido_jugador, j.numero, ej.es_capitan, ej.jugador_id, j.posicion, j.estado, j.puntos
        FROM usuario u 
        JOIN equipo e ON u.id = e.usuario_id 
        JOIN equipo_jugador ej ON e.nombre = ej.nombre_equipo 
        JOIN jugador j ON ej.jugador_id = j.id
        WHERE u.id = ?";

        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $team = $query->fetchAll(PDO::FETCH_OBJ);
        return $team;
    }

    public function getAllInfoPtsTotal(){
        $sql = "SELECT u.nombre, e.nombre AS nombre_equipo, e.puntos, e.puntos_total 
        FROM usuario u 
        INNER JOIN equipo e ON u.id = e.usuario_id 
        ORDER BY e.puntos_total DESC";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAllInfoPts(){
        $sql = "SELECT u.nombre, e.nombre AS nombre_equipo, e.puntos, e.puntos_total 
        FROM usuario u 
        INNER JOIN equipo e ON u.id = e.usuario_id 
        ORDER BY e.puntos DESC";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function actualizarPuntos($nombre, $puntos){
        $sql = "UPDATE equipo SET puntos = ?, puntos_total = puntos_total + ? WHERE nombre = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$puntos, $puntos, $nombre]);
    }
    public function transferir($nombre, $origen, $destino){
        $sql = "UPDATE equipo_jugador SET jugador_id = ? WHERE nombre_equipo = ? AND jugador_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$destino, $nombre, $origen]);
    }

    public function getTeamByUserId($id){
        $sql = "SELECT * FROM equipo WHERE usuario_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $team = $query->fetch(PDO::FETCH_OBJ);
        return $team;
    }

    public function deleteCapitan($team){
        $sql = "UPDATE equipo_jugador 
        SET es_capitan = 0 
        WHERE nombre_equipo = ? AND es_capitan = 1;";
        $query = $this->db->prepare($sql);
        $query->execute([$team->nombre]);
    }

    public function setCapitan($team, $capitan){
        $sql = "UPDATE equipo_jugador
        SET es_capitan = 1
        WHERE nombre_equipo = ? AND jugador_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$team->nombre, $capitan]);
    }
}