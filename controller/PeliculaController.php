<?php 

require_once "model/Pelicula.php";
require_once "model/Serie.php";

class PeliculaController{

    public $page_title;
    public $view;
    public $model;
    public $modelSerie;

    public function __construct(){
        $this->view = "list";
        $this->page_title = "";
        $this->model = new Pelicula();
        $this->modelSerie = new Serie();
    }
    public function list(){
        $this->view = "list";
        $this->page_title = "listar peliculas";
        $peliculas = $this->model->getPeliculas();
        $series = $this->modelSerie->getSeries();

        return ["peliculas" => $peliculas, "series" => $series];
    }
    public function create(){
        $this->view = "create";
        $this->page_title = "creacion de peliculas";
    }
    public function save(){
        $this->view = "create";
        $this->page_title = "creacion de peliculas";
        $this->model->guardarPelicula($_POST, $_FILES['contenido'], $_FILES['portada']);
    }
    public function detalle(){
        $this->view = "detalle";
        $this->page_title = "detalle de pelicula";
        return $this->model->getPeliculaById($_GET["id"]);
                
    }
    public function download(){
        $this->view = "detalle";
        $this->page_title = "detalle de pelicula";
        if (isset($_GET['file'])) {
            $file = basename($_GET['file']); 
            $filePath = 'assets/videos/' . $file;
        
            if (file_exists($filePath)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . $file . '"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($filePath));
        
                flush();
                readfile($filePath);
                exit;
            }
        }
    }
}

?>