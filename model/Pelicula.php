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
                $stmt->execute([$param['titulo'], $param['duracion'], $param['genero'], $param['descripcion'], $nombreArchivo, $rutaImagen]);
            }
        }
    }
    public function getPeliculas(){
        $sql = "SELECT * FROM " . $this->table . " ORDER BY id DESC LIMIT 12";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getPeliculaById($id){
        $sql = "SELECT * FROM ". $this->table . " WHERE id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function contarPelis(){
        $sql = "SELECT COUNT(*) as total FROM " . $this->table;
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch()['total'];
    }
    public function getPelisPaginadas($limit, $offset){
        $sql = "SELECT * FROM " . $this->table . " ORDER BY RAND() DESC LIMIT ? OFFSET ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->bindValue(2, $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getPeliculasByGenero($genero){
        $sql = "SELECT * FROM " . $this->table . " WHERE genero=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$genero]);
        return $stmt->fetchAll();
    }
    public function deletePeliById($id){
        $sql = "DELETE FROM " . $this->table . " WHERE id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }
}

?>