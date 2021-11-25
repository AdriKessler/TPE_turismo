<?php

require_once "./Model/TourModel.php";
require_once "./Model/UserModel.php";
require_once "./View/TourView.php";
require_once "./Helpers/AuthHelper.php";
require_once "./Model/LugarModel.php";

class TourController{

    private $model;
    private $userModel;
    private $view;
    private $authHelper;
    private $lugarModel;

    function __construct(){
        $this-> model = new TourModel();
        $this-> view= new TourView ();
        $this->authHelper = new AuthHelper();
        $this->lugarModel = new LugarModel();
        $this->userModel= new UserModel();
    }

    function showInicioPublico(){
        $atracciones = $this-> model-> getAtracciones();
        $this-> view->showVistaPublica($atracciones);
        $this-> view->showComentario();
    }
    
    function showInicio (){
        $this->authHelper->chequearIngreso();
        $atracciones = $this-> model-> getAtracciones();
        $provincias = $this-> lugarModel-> getProvincias();
        $this-> view->showAtracciones($atracciones,$provincias);
    }

    function agregarAtraccion (){
        $this-> model-> crearAtraccion ($_POST['nombre'], $_POST['descripcion'], $_POST['provincia']);
        $provincias = $this-> lugarModel-> getProvincias();
        $atracciones = $this ->model ->getAtracciones();
        $this-> view-> showAtracciones($atracciones,$provincias);
    }

    function eliminarAtraccion($id){
        $this->authHelper->chequearIngreso();
        $this-> model->borrarDato($id);
        $this-> view-> mostrarDatos();
    }
    
    function editarAtraccion($id){
        $this->authHelper->chequearIngreso();

        $nombre =$_POST['nombre'];
        $descripcion =$_POST['descripcion'];
        $provincia =$_POST['provincia'];
        if (isset($id)&&(!empty($nombre)&&!empty($descripcion)&&!empty($provincia))){
            $this-> model-> modificarDato($id,$nombre,$descripcion,$provincia);
            $provincias = $this-> lugarModel-> getProvincias();
            $atracciones = $this ->model -> getAtracciones();
            
            $this-> view-> showAtracciones($atracciones,$provincias);
        }
    }

    function verAtraccion($id_vista){
        $atract = $this-> model->getAtraccion($id_vista);
        $this-> view-> mostrarAtraccion($atract);  
    }

    function buscarPorProvincia(){  
        $atraccionesPorProvincia = $this ->model ->getAtraccionesPorProvincia($_POST['provincia']);
        $this-> view-> mostrarFiltro($atraccionesPorProvincia);
    }

    function verComentario(){
        $this-> model->getComentarios();
        $this->view->showComentario();
    }

}