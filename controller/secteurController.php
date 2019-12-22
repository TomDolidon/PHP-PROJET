<?php

use model\manager\structureManager;
use model\manager\secteurManager;
use model\manager\secteur_structureManager;

require_once './model/manager/structureManager.php';
require_once './model/manager/secteurManager.php';
require_once './model/manager/secteur_structureManager.php';

if (isset($_GET)) {

    switch ($action) {
        case 'new':

            $view = "formSecteur";
            break;

        case 'edit':

            $secteur = secteurManager::getSecteurById($_GET['id'])[0];

            $view = "formSecteur";
            break;

        case 'delete':

            secteur_structureManager::deleteSecteurStructureBySecteurId($_GET['id']);
            secteurManager::deleteSecteurById($_GET['id']);

            $secteurs = SecteurManager::getAllSecteurs();
            $structures = structureManager::getAllStructures();

            $view = "accueil";
            break;

        case 'submit_new':

            if ( $_GET['libelle'] == "") {

                $errorMessage = "Ce champ est obligatoire";                
                $view = "formSecteur";
                
            } else {
                // On vérifie qu'aucune entité porte déjà ce libelle
                $libelle = $_GET['libelle'];
                $exist = false;
                foreach (secteurManager::getAllSecteurs() as $_secteur) {
                    if ($_secteur['LIBELLE'] == $libelle) $exist = true;
                }
                if (!$exist) {
                    secteurManager::addSecteur($libelle);
                } else {
                    $erreur = "Ce libelle est déjà utilisé";
                    $view = "formSecteur";
                    break;
                }
                $secteurs = SecteurManager::getAllSecteurs();
                $structures = structureManager::getAllStructures();
                // on appelle la vue formulaire de secteur
                $view = "accueil";
            }

            break;

        // update secteur
        case 'submit_update':

            //on vérifie que le champ n'est pas vide
            if ( $_GET['libelle'] == "") {

                $errorMessage = "Ce champ est obligatoire";           
                
                $secteur = [
                    'ID' => $_GET['id'], 'LIBELLE' => $_GET['libelle'],
                ];

                $view = "formSecteur";
                
            } else {

                // On vérifie qu'aucune entité porte déjà ce libelle
                $libelle = $_GET['libelle'];
                $exist = false;
                foreach (secteurManager::getAllSecteurs() as $_secteur) {
                    if ($_secteur['LIBELLE'] == $libelle) $exist = true;
                }
                if (!$exist) {
                    secteurManager::updateSecteur($_GET['id'], $libelle);
                } else {
                    $errorMessage = "Ce libelle est déjà utilisé";
                    $secteur = [
                        'ID' => $_GET['id'], 'LIBELLE' => $_GET['libelle'],
                    ];
                    $view = "formSecteur";
                    break;
                }

                $secteurs = SecteurManager::getAllSecteurs();
                $structures = structureManager::getAllStructures();

                $view = "accueil";
                break;
            }
    }
}


?>