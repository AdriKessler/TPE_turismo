<?php

require_once "./Model/TourModel.php";
require_once "./View/ApiView.php";
require_once "./Model/UserModel.php";

class ApiController{

    private $model;
    private $view;
    private $userModel;

    function __construct(){
        $this-> model = new TourModel();
        $this-> view = new ApiView();
        $this-> userModel = new UserModel();
    }

    function obtenerComentarios(){
        $comentarios = $this->model->getComentarios();
        return $this->view->response ($comentarios, 200);
    }

    function insertarComentario($params =null){
        $body = $this->getBody();
       
        if(isset($body->email)&&isset($body->opinion)&&isset($body->id_usuario)&&isset($body->id_atraccion)&&isset($body->puntaje)){
            $email= $body->email;
            $opinion= $body->opinion;
            $usuario= $body->id_usuario;
            $id_atraccion= $body->id_atraccion;
            $puntaje = $body->puntaje;
           
            $comment= $this->model-> agregarComentario($email, $opinion, $puntaje, $usuario, $id_atraccion);
            if (is_null($comment)){
                $this->view-> response("El comentario se agregó con éxito",200);
            } else {
                $this->view-> response("Lo siento, el comentario no se pudo agregar",500);
            }
        }
        else{
            $this->view-> response("Lo siento, el comentario no se pudo agregar",500);
        }

        
    }

    function eliminarComentario ($params = null){
        $idComentario = $params [":ID"];
        $comentario = $this->model->getComentario($idComentario);
        if ($comentario){
            $this->model-> borrarComentario ($idComentario);
            return $this-> view-> response("El comentario con el id = $idComentario fue eliminado",200);
        } else {
            return $this-> view-> response("El comentario con el id= $idComentario no existe", 404);
        }
    }

   //devuelve el body del request
   private function getBody (){
        $bodyString = file_get_contents("php://input"); 
        return json_decode($bodyString);
    }
}