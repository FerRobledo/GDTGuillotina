<?php
require_once 'config.php';

class userModel{

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

    public function newUser($nombre, $user, $password){
        $sql = "INSERT INTO usuario (nombre, username, `password`, hizoCambio) values (?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->execute([$nombre, $user, $password, false]);
        return $this->db->lastInsertId();
    }

    public function getByUsername($username){
        $sql = "SELECT * FROM usuario WHERE username = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$username]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    public function hizoCambio($id){
        $sql = "UPDATE usuario SET hizoCambio = 1 WHERE id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
    }

    public function darCambios(){
        $sql = "UPDATE usuario SET hizoCambio = 0";
        $query = $this->db->prepare($sql);
        $query->execute();
    }

}