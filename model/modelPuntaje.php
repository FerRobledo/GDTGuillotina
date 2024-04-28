<?php
    require_once 'config.php';

    class modelPuntaje{
    
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

        public function getById($id){
            $sql = "SELECT * FROM puntaje WHERE id = ?";
            $query = $this->db->prepare($sql);
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function getValoracionById($id){
            $sql = "SELECT valoracion FROM puntaje WHERE id_jugador = ?";
            $query = $this->db->prepare($sql);
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function cargarPuntos($idj, $tor, $fec , $val, $fig, $vallainv, $golrecib, $goloro, $taram, $tarro, $gol, $penaler, $penalat, $golpen, $golcon){
            $sql = "INSERT INTO puntaje (`torneo`, `fecha`, `id_jugador`, `valoracion`, `figura`, `valla_invicta`, `gol_recibido`, `gol_oro`, `tarjeta_amarilla`, `tarjeta_roja`, `gol`, `penal_errado`, `penal_atajado`, `gol_penal`, `gol_contra`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute([$tor, $fec, $idj, $val, $fig, $vallainv, $golrecib, $goloro, $taram, $tarro, $gol, $penaler, $penalat, $golpen, $golcon]);
            return $this->db->lastInsertId();
        }

    }