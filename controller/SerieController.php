<?php 

require_once "model/Serie.php";

class SerieController{

    public $page_title;
    public $view;
    public $model;

    public function __construct(){
        $this->view = "list";
        $this->page_title = "";
        $this->model = new Serie();
    }

    public function create(){
        $this->view = "create";
        $this->page_title = "creacion de series";
    }

    public function save(){
        $this->view = "create";
        $this->page_title = "salvar series";
        $serie_id=$this->model->insertarSeries($_POST, $_FILES['portada-serie']);
        $this->model->insertarCapitulos($_POST, $serie_id, $_FILES);
    }

    public function detalle(){
        $this->view = "detalle";
        $this->page_title ="detalle serie";
        $serie = $this->model->getSerieById($_GET["serie_id"]);
        $temporadas = $this->model->getTemporadasBySerieId($_GET["serie_id"]);
        $capitulos = $this->model->getCapitulosByTemporadaId($_GET["temporada_id"]);
        return ["serie" =>$serie, "temporadas" => $temporadas, "capitulos" => $capitulos];
    }

    public function puenteDetalle(){
        $this->view = "detalle";
        $this->page_title ="puente detalle serie";
        $serie_id = $_GET["serie_id"];
        $id_temporadas=$this->model->getIdTemporadaBySerieId($_GET["serie_id"]);
        header("Location: index.php?controller=serie&action=detalle&serie_id=" . $serie_id ."&temporada_id=" . $id_temporadas[0]["id"]);
    }

    public function getCapitulos(){
        $this->view = "detalle";
        $this->page_title = "detalle serie";
        header("Location: index.php?controller=serie&action=detalle&serie_id=". $_GET["serie_id"] ."&temporada_id=" . $_POST["temporadaSelect"]);
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
    public function getAllSeries(){
        $this->view = "listAll";
        $this->page_title ="listar todas las series";
        $paginaActual = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        $limite = 21;
        $offset = ($paginaActual-1)*$limite;
        $totalSeries = $this->model->contarSeries();
        $totalPaginas = ceil($totalSeries / $limite);
        $series = $this->model->getSeriesPaginadas($limite, $offset);
        $dataToView = [
            "data" => $series ?? [],
            "paginaActual" => $paginaActual,
            "totalPaginas" => $totalPaginas
        ];

        $this->renderView("serie/listAll.html", $dataToView);
    }
    public function renderView($view, $dataToView = []){
        extract($dataToView);
        require_once "view/layout/header.php";
        require_once 'view/' . $view . '.php';
    }
    public function listCategoria(){
        $this->view = "listCategoria";
        $this->page_title = "listar por categoria peliculas";
        return $this->model->getSeriesByGenero($_POST["categoria"]);
    }
    public function delete(){
        $this->view = "detalle";
        $this->page_title = "borrar pelicula";
        $this->model->deleteSerieById($_GET["id"]);
        header("Location: index.php?controller=pelicula&action=list");
    }
}

?>