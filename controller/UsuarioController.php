<?php 

require_once "model/Usuario.php";

class UsuarioController{

    public $page_title;
    public $view;
    public $model;

    public function __construct(){
        $this->view = "login";
        $this->page_title = "";
        $this->model = new Usuario();
    }

    public function login(){
        $this->view = "login";
        $this->page_title = "login";
    }

    public function comprobarLogin(){
        $this->view = "login";
        $this->page_title = "login";
        $i = $this->model->comprobarLogin($_POST);
        if ($i) {
            header("Location:index.php?controller=pelicula&action=list");
            exit();
        }else {
            header("Location:index.php?controller=usuario&action=login");
        }
    }
    public function cerrarSesion(){
        $this->page_title = "cerrarSesion";
        session_unset();
        header("Location: index.php?controller=usuario&action=login");
    }
    public function create(){
        $this->view = "create";
        $this->page_title = "crear usuarios";
        $this->model->createUsuarios($_POST);
    }
    public function createView(){
        $this->view = "create";
        $this->page_title = "crear usuarios";
    }

}

?>