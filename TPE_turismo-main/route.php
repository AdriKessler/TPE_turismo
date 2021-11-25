<?php

require_once "Controller/TourController.php";
require_once "Controller/LugarController.php";
require_once "Controller/LoginController.php";
require_once "Controller/ApiController.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


if (!empty($_GET['action'])){
    $action= $_GET ['action'];
}else {
    $action= 'login'; //acción por defecto si no envía
}
$params = explode('/', $action);

$tourController = new TourController();
$lugarController= new LugarController();
$loginController= new LoginController();
$apiController= new ApiController();

switch ($params[0]) {
    case 'login': 
        $tourController->showInicioPublico();
        break;
    case 'logout': 
        $tourController->showInicioPublico();
        break;
    case 'verify': 
        $loginController->verificacion(); 
        break;
    case 'registrar': 
        $loginController->cargarRegistro();
        break;
    case 'registro': 
        $loginController->registro();
        break;
    case 'iniciar': 
        $loginController->login();
        break;
    case 'inicio': 
        $lugarController->showInicio();
        $loginController->verificacion(); 
        $loginController->administrarUsuarios();
        $tourController->verComentario();
        break;
    case 'administrarPermisos':
        $loginController->administrarPermisos($params[1]);
        break;
    case 'eliminarUsuario':
        $loginController->eliminarUsuario($params[1]);
        break;
    case 'verComentario': 
        $tourController->verAtraccion($params[1]);
        $tourController->verComentario($params[1]);
        break; 
    case 'agregarAtraccion': 
        $tourController->agregarAtraccion(); 
        break;
    case 'eliminarAtraccion': 
        $tourController->eliminarAtraccion($params[1]); 
        break;
    case 'editarAtraccion':
        $tourController->editarAtraccion($params[1]);
        break;
    case 'verAtraccion':
        $tourController->verAtraccion($params[1]);
        break;
    case 'buscarPorProvincia':
        $tourController->buscarPorProvincia();
        break;
    case 'agregarProvincia':
        $lugarController->agregarProvincia();
        break;
    case 'eliminarProvincia':
        $lugarController-> eliminarProvincia($params[1]);
        break;
    case 'editarProvincia':
        $lugarController->editarProvincia($params[1]);
        break;
    case 'verProvincia':
        $lugarController->verProvincia($params[1]);
        break;
    default:
        echo ("404: Page not found");
        break;
}
