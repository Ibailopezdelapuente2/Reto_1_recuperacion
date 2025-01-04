<?php 

class Pelicula{
    private $table = "peliculas";
    private $connection;
    public function __construct(){
        $this->getConnection();
    }
    public function getConnection(){
        $dbObj =new Db();
        $this->connection = $dbObj->conection_db;
    }
    public function guardarPelicula($param, $video, $foto){
        $sql= "INSERT INTO " . $this->table . " (nombre, duracion, genero, descripcion, contenido, foto) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt=$this->connection->prepare($sql);
        if (isset($video) && $video['error'] === 0 && isset($foto) && $foto['error'] === 0) {
            $nombreArchivo = $video['name'];
            $rutaDestino = 'assets/videos/' . $nombreArchivo;
            $nombreImagen = $foto['name'];
            $rutaImagen = 'assets/Images/' . $nombreImagen;
            if (move_uploaded_file($video['tmp_name'], $rutaDestino) && move_uploaded_file($_FILES['portada']['tmp_name'], $rutaImagen)){
                $sql = "INSERT INTO ". $this->table ."(nombre, duracion, genero, descripcion, contenido, foto) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $this->connection->prepare($sql);
                $stmt->execute([$param['titulo'], $param['duracion'], $param['genero'], $param['descripcion'], $rutaDestino, $rutaImagen]);
            }
        }
    }
    public function getPeliculas(){
        $sql = "SELECT * FROM " . $this->table;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>