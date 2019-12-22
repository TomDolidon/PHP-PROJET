<?php
session_start();

require_once "./config/route.php";
require_once "./controller/fonctions.php";


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



/* if (isset($_POST['structure_form'])) {
    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['rue'] = $_POST['rue'];
    $_SESSION['cp'] = $_POST['cp'];
    $_SESSION['ville'] = $_POST['ville'];
    $_SESSION['nbDonateurs'] = $_POST['nbDonateurs'];
    $_SESSION['nbActionnaires'] = $_POST['nbActionnaires'];
   // $_SESSION['assoc'] = $_POST['assoc'];
}

if (isset($_POST['secteur_add'])) {
    $_SESSION['libelle'] = $_POST['libelle'];
    var_dump($_POST);
    addSecteur($_SESSION['libelle']);
}

if (isset($_POST['secteur_update'])) {
    $_SESSION['secteur_libelle'] = $_POST['secteur_libelle'];
    var_dump($_POST);
    updateSecteur($_POST['id'], $_POST['secteur_libelle']);
}

if (isset($_POST['secteur_delete'])) {
    $_SESSION['secteur_libelle'] = $_POST['secteur_libelle'];
    var_dump($_POST);
    deleteSecteurStructure($_POST['id']);
    deleteSecteur($_POST['id']);
} */



?>
