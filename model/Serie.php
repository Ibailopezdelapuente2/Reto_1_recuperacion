<?php 

class Serie{
    private $table = "series";
    private $connection;
    public function __construct(){
        $this->getConnection();
    }
    public function getConnection(){
        $dbObj =new Db();
        $this->connection = $dbObj->conection_db;
    }
    public function getSeries(){
        $sql = "SELECT * FROM " . $this->table . " ORDER BY id DESC LIMIT 12";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function insertarSeries($param, $portada){
        if (isset($portada) && $portada['error'] === 0) {
            $nombreImagen = $portada['name'];
            $rutaImagen = 'assets/Images/' . $nombreImagen;
            if (move_uploaded_file($portada['tmp_name'], $rutaImagen)) {
                $sql = "INSERT INTO ". $this->table . " (nombre, genero, descripcion, foto) VALUES (?, ?, ?, ?)";
                $stmt = $this->connection->prepare($sql);
                $stmt->execute([$param["titulo"], $param["genero"], $param["descripcion"], $rutaImagen]);
                return $this->connection->lastInsertId();
            }
        }
        
    }
    public function insertarCapitulos($param, $serie_id, $capituloVideo){
        if(isset($param["temporadas"]))foreach($param["temporadas"] as $temporadaIndex => $temporada){
            $sql = "INSERT INTO temporadas (id_serie, numero) VALUES (:id_serie, :numero)";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([":id_serie" => $serie_id, ":numero" => $temporadaIndex]);

            $temporada_id = $this->connection->lastInsertId();

            foreach($temporada["capitulos"] as $capituloIndex => $capitulo){
                $video = $capituloVideo['temporadas']['tmp_name'][$temporadaIndex]['capitulos'][$capituloIndex]['contenido'];
                $videoName = $capituloVideo['temporadas']['name'][$temporadaIndex]['capitulos'][$capituloIndex]['contenido'];
                $videoPath = "assets/videos/" . basename($videoName);
                move_uploaded_file($video, $videoPath);
                $sql = "INSERT INTO capitulos (id_temporada, id_serie, num_capitulo, titulo, duracion, descripcion, contenido) VALUES (:id_temporada, :serie_id, :numero, :titulo, :duracion, :descripcion, :contenido)";
                $stmt = $this->connection->prepare($sql);
                $stmt->execute([':id_temporada' => $temporada_id,
                    ':serie_id' => $serie_id,
                    ':numero' => $capituloIndex,
                    ':titulo' => $capitulo['titulo'],
                    ':duracion' => $capitulo['duracion'],
                    ':descripcion' => $capitulo['descripcion'],
                    ':contenido' => $videoName]);
            }
        }
    }
    public function getTemporadasBySerieId($serie_id){
        $sql = "SELECT * FROM temporadas WHERE id_serie=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$serie_id]);
        return $stmt->fetchAll();
    }
    public function getCapitulosByTemporadaId($temporada_id){
        $sql = "SELECT * FROM capitulos WHERE id_temporada=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$temporada_id]);
        return $stmt->fetchAll();
    }
    public function getSerieById($serie_id){
        $sql = "SELECT * FROM ". $this->table . " WHERE id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$serie_id]);
        return $stmt->fetchAll();
    }
    public function getIdTemporadaBySerieId($serie_id){
        $sql = "SELECT id FROM temporadas WHERE id_serie=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$serie_id]);
        return $stmt->fetchAll();
    }
    public function getAllSeries(){
        $sql="SELECT * FROM " . $this->table;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function contarSeries(){
        $sql = "SELECT COUNT(*) as total FROM " . $this->table;
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetch()['total'];
    }
    public function getSeriesPaginadas($limit, $offset){
        $sql = "SELECT * FROM " . $this->table . " ORDER BY RAND() DESC LIMIT ? OFFSET ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->bindValue(2, $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getSeriesByGenero($genero){
        $sql = "SELECT * FROM " . $this->table . " WHERE genero=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$genero]);
        return $stmt->fetchAll();
    }
    public function deleteSerieById($id){
        $sql = "DELETE FROM " . $this->table . " WHERE id=?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }
}

?>