<?php

use model\manager\secteurManager;
use model\manager\structureManager;

require_once './model/manager/secteurManager.php';
require_once './model/manager/structureManager.php';

$secteurs = SecteurManager::getAllSecteurs();
$structures = structureManager::getAllStructures(); 

$view = "accueil";

?>