<?php
require_once('./smarty-3.1.39/libs/Smarty.class.php');
class TourView{
    private $smarty;
    function __construct (){
        $this-> smarty= new Smarty();
    }

    function showVistaPublica($atracciones){
        $this->smarty->assign('titulo',"Destinos Disponibles");
        $this->smarty->assign('atracciones', $atracciones);
        $this->smarty->display('templates/vista_publica.tpl');
    }
   
    function showAtracciones ($atracciones,$provincias){
        $this->smarty->assign('titulo',"Lista de Atracciones");
        $this->smarty->assign('listado',"Lista de Provincias");
        $this->smarty->assign('atracciones', $atracciones);
        $this->smarty->assign('provincias', $provincias);
        $this->smarty->display('templates/atracciones.tpl');
    }

    function mostrarDatos(){
        header ("Location:".BASE_URL."inicio");
    }

    function mostrarAtraccion ($atraccion){
        $this->smarty->assign('atracciones', $atraccion);
        $this->smarty->display('templates/detalle_atraccion.tpl');
    }
    
    function mostrarFiltro($atracciones){
        $this->smarty->assign('titulo',"Resultado de la Búsqueda");
        $this->smarty->assign('atracciones', $atracciones);
        $this->smarty->display('templates/filtro.tpl');
   }

    function LoginLocation(){
        header("Location: ".BASE_URL."login");
    }

    function showComentario(){
        $this->smarty->display('templates/comentarios.tpl');
    }

}