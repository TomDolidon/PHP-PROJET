
<?php

use model\manager\structureManager;

require_once './model/manager/structureManager.php';

if(isset($_GET)) {

    switch($action) {
        case 'new':
            $view = "formStructure";
            break;
        
        case 'edit':
            $view = "formStructure";
            break;

        case 'delete':

            structureManager::deleleStructureById($_GET['id']);

            $stuctures = structureManager::getAllStructures();

            $view = "accueil";
            break;


        case 'submit':

            //lorsqu'o valide le formulaire de création / modifictaion

            break;
    }
}


?>