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
    public function listAll(){
        $this->view = "listAll";
        $this->page_title = "listar todas las peliculas";
        $paginaActual = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        $limite = 21;
        $offset = ($paginaActual-1)*$limite;
        $totalPelis = $this->model->contarPelis();
        $totalPaginas = ceil($totalPelis / $limite);
        $pelis = $this->model->getPelisPaginadas($limite, $offset);
        $dataToView = [
            "data" => $pelis ?? [],
            "paginaActual" => $paginaActual,
            "totalPaginas" => $totalPaginas
        ];

        $this->renderView("pelicula/listAll.html", $dataToView);
    }
    public function renderView($view, $dataToView = []){
        extract($dataToView);
        require_once "view/layout/header.php";
        require_once 'view/' . $view . '.php';
    }
    public function listCategoria(){
        $this->view = "listCategoria";
        $this->page_title = "listar por categoria peliculas";
        return $this->model->getPeliculasByGenero($_POST["categoria"]);
    }
    public function delete(){
        $this->view = "detalle";
        $this->page_title = "borrar pelicula";
        $this->model->deletePeliById($_GET["id"]);
        header("Location: index.php?controller=pelicula&action=list");
    }
}

?>