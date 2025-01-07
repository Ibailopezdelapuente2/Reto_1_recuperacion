<?php 

class Usuario{
    private $table = "usuarios";
    private $connection;
    public function __construct(){
        $this->getConnection();
    }
    public function getConnection(){
        $dbObj =new Db();
        $this->connection = $dbObj->conection_db;
    }
    public function comprobarLogin($param){
        $sql = "SELECT * FROM " . $this->table . " WHERE correo=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$param['correo']]);
        $usuarios = $stmt->fetchAll();
        $i = false;
        if(!empty($usuarios)){
            if ($param["correo"] === $usuarios[0]["correo"] && $param["contrasenna"] === $usuarios[0]["contrasenna"]) {
                $_SESSION['id'] = $usuarios[0]['id'];
                $_SESSION['nombre'] = $usuarios[0]['nombre'];
                $_SESSION['rol'] = $usuarios[0]['rol'];
                $_SESSION['avatar'] = $usuarios[0]['avatar'];
                $i = true;
            }
        }
        
        return $i;
    }
    public function createUsuarios($param){
        $sql = "INSERT INTO " . $this->table . " (nombre, contrasenna, correo, rol) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$param["nombre"], $param["contrasenna"], $param["correo"], $param["rol"]]);
    }
}

?>