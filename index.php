<?php
session_start();

require_once "./config/route.php";
require_once "./utils/fonctions.php";

$action = null;
if (isset($_REQUEST['action'])) {
	$controllerName = $_GET['controller'];
    $action = $_GET['action'];
    
} else {
	$controllerName = 'indexController';
}

// appel du controlleur adéquat
$controller = './controller/' . $controllerName . '.php';

require $controller;

// appel des vues
require 'view/commun/head.php';
require 'view/' . $view . '.php';

?>
