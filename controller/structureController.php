
<?php

use model\manager\structureManager;
use model\manager\secteurManager;
use model\manager\secteur_structureManager;
use model\Structure;

require_once './model/manager/structureManager.php';
require_once './model/manager/secteurManager.php';
require_once './model/manager/secteur_structureManager.php';
require_once './model/Structure.php';

if(isset($_GET)) {

    switch($action) {
        case 'new':
            $type = $_GET['type'];

            $secteurs = secteurManager::getAllSecteurs();

            $view = "formStructure";

            break;
        
        case 'edit':

            $structure = structureManager::getStructurerById($_GET['id'])[0];

            var_dump($structure);

            ($structure['ESTASSO'] == "0") ? $type = "entreprise" : $type = "association";

            $secteurs = secteurManager::getAllSecteurs();
            $checkArray = [];

            foreach (secteur_structureManager::getByStructureId(intval($structure['ID'])) as $checkedSecteur){
                array_push($checkArray,$checkedSecteur['ID_SECTEUR']);
            }


            $view = "formStructure";
            break;

        case 'delete':
            secteur_structureManager::deleteSecteurStructureByStructureId($_GET['id']);
            structureManager::deleleStructureById($_GET['id']);

            $structures = structureManager::getAllStructures();
            $secteurs = secteurManager::getAllSecteurs();

            $view = "accueil";
            break;


        case 'submit_update':

            $structure = [
                "nom"  => $_GET['nom'],
                "rue"  => $_GET['rue'],
                "cp"  => intval($_GET['cp']),
                "ville"  =>  $_GET['ville'],
                "estasso" => intval($_GET['estasso']),
                "nb_actionnaires" => (isset($_GET['nb_actionnaires'])) ? intval($_GET['nb_actionnaires']) : null,
                "nb_donateurs" => (isset($_GET['nb_donateurs'])) ?intval($_GET['nb_donateurs']) : null,
            ];

            $checkedSecteurs = isset($_GET['secteurs']) ?$_GET['secteurs'] : [] ;

            // on supprimer toute les jointures pour cette structure
            secteur_structureManager::deleteSecteurStructureByStructureId(intval($_GET['id']));

            // on rajoute dans la table de jointure ceux qui sont check
            foreach ($checkedSecteurs as $secteur) {
                    if (!isset(secteur_structureManager::getByStructureAndSecteurId(intval($_GET['id']), intval($checkedSecteurs))[0])){
                        secteur_structureManager::addOne( intval($_GET['id']), intval($secteur));
                    }
            }


        // todo : reste plus qu'à faire ca et gg !
            structureManager::updateStructure(intval($_GET['id']), $structure);



            $structures = structureManager::getAllStructures();
            $secteurs = secteurManager::getAllSecteurs();

            $view = "accueil";
            break;

        case 'submit_new':
            $structure = [
               "nom"  => $_GET['nom'],
                "rue"  => $_GET['rue'],
                "cp"  =>$_GET['cp'],
                "ville"  =>  $_GET['ville'],
                "estasso" => $_GET['estasso'],
                "nb_actionnaires" => (isset($_GET['nb_actionnaires'])) ? $_GET['nb_actionnaires'] : null,
                "nb_donateurs" => (isset($_GET['nb_donateurs'])) ?$_GET['nb_donateurs'] : null,
            ];


            $idStructure = structureManager::addStructure($structure);

            $secteurs = isset($_GET['secteurs']) ?$_GET['secteurs'] : [] ;

            foreach ($secteurs as $secteur) {
                secteur_structureManager::addOne( intval($idStructure), intval($secteur));
            }



            $structures = structureManager::getAllStructures();
            $secteurs = secteurManager::getAllSecteurs();

            $view = "accueil";
            break;
    }
}


?>