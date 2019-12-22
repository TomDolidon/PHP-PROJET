<?php

namespace model\manager;

use PDO;

require_once "./model/dbProvider.php";

class structureManager
{


    public static function getAllStructures()
    {

        try {
            $conn = connexionSQL();
            $stmt = $conn->prepare("select * from structure");
            $res = $stmt->execute();
            if ($res) {
                $lines = $stmt->fetchAll(PDO::FETCH_BOTH);
            }
            // on récupère les libelles de chaque secteur
            for ($i=0; $i<sizeof($lines);$i++){
                $associationTablesArray = secteur_structureManager::getByStructureId($lines[$i]['ID']);
                $lines[$i]['SECTEURS']="";
                // on créer une varaible Secteurs à notre structure, contenant les libelles des structures (concatenées)
                foreach ($associationTablesArray as $assoc){
                    $secteur = secteurManager::getSecteurById($assoc['ID_SECTEUR'])[0];
                    $lines[$i]['SECTEURS'] = $lines[$i]['SECTEURS'] . " " . $secteur['LIBELLE'] . " ";
                }

            }
            var_dump($lines);

            $conn = null;
            return $lines;
        } catch (PDOException $e) {
            echo "Error " . $e->getCode() . " : " . $e->getMessage() . "<br/>" . $e->getTraceAsString();
        }
    }

    public static function getStructurerById($id)
    {

        try {
            $conn = connexionSQL();
            $stmt = $conn->prepare("select * from structure where  id = :id");
            $res = $stmt->execute([":id" => $id]);

            if ($res) {

                // TODO recupe objet pas tableau
                $lines = $stmt->fetchAll(PDO::FETCH_BOTH);
            }
            // fermeture de la connexion
            $conn = null;
            return $lines;
        } catch (PDOException $e) {
            echo "Error " . $e->getCode() . " : " . $e->getMessage() . "<br/>" . $e->getTraceAsString();
        }
    }



    public static function addStructure($structure)
    {

        try {
            $conn = connexionSQL();
            $stmt = $conn->prepare("insert into structure(nom, rue, cp, ville, estasso,nb_actionnaires, nb_donateurs ) values (:nom, :rue, :cp, :ville, :estasso, :nb_actionnaires, :nb_donateurs)");

            //var_dump($stmt);
            $res = $stmt->execute(
                [":nom" => $structure['nom'],
                    ":rue" => $structure['rue'],
                    ":cp" => $structure['cp'],
                    ":ville" => $structure['ville'],
                    ":estasso" => $structure['estasso'],
                    ":nb_actionnaires" => $structure['nb_actionnaires'],
                    ":nb_donateurs" => $structure['nb_donateurs']

                ]);
            return $conn->lastInsertId("structure");


        } catch (PDOException $e) {
            echo "Error " . $e->getCode() . " : " . $e->getMessage() . "<br/>" . $e->getTraceAsString();
        }
    }

    public static function updateStructure($id, $structure)
    {

        try {
            $conn = connexionSQL();
            $stmt = $conn->prepare('UPDATE structure SET 
                id = :id,
			    nom = :nom, 
				rue = :rue, 
				cp = :cp,
				ville = :ville, 
				estasso = :estasso, 
				nb_donateurs = :nb_donateurs,
				nb_actionnaires = :nb_actionnaires,
			    WHERE id = :id
			    '
            );

            //var_dump($stmt);
            $res = $stmt->execute(array(
                ":id" => $id,
                    ":nom" => $structure['nom'],
                    ":rue" => $structure['rue'],
                    ":cp" => $structure['cp'],
                    ":ville" => $structure['ville'],
                    ":estasso" => $structure['estasso'],
                    ":nb_donateurs" => $structure['nb_donateurs'],
                ":nb_actionnaires" => $structure['nb_actionnaires'],

            ));

        } catch (PDOException $e) {
            echo "Error " . $e->getCode() . " : " . $e->getMessage() . "<br/>" . $e->getTraceAsString();
        }

    }

    public static function deleleStructureById($id)
    {


        try {
            $conn = connexionSQL();
            $stmt = $conn->prepare("delete from structure where id = :id  ");

            //var_dump($stmt);
            $res = $stmt->execute([":id" => $id]);

        } catch (PDOException $e) {
            echo "Error " . $e->getCode() . " : " . $e->getMessage() . "<br/>" . $e->getTraceAsString();
        }
    }
}

?>