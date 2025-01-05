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
}

?>