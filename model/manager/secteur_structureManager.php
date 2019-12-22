<?php

namespace model\manager;

use PDO;

require_once "./model/dbProvider.php";

class secteur_structureManager {


    public static function addOne($id_structure, $id_secteur){
        try {
            $conn = connexionSQL();
            $stmt = $conn->prepare("insert into secteurs_structures(id_structure, id_secteur) values (:id_structure, :id_secteur)");

            $res= $stmt->execute(
                [
                    ":id_structure" => $id_structure ,
                    ":id_secteur" => $id_secteur
                ]);
           // var_dump($res);


        }
        catch(PDOException $e)
        {
            echo "Error ".$e->getCode()." : ".$e->getMessage()."<br/>".$e->getTraceAsString();
        }
    }


    public static function deleteSecteurStructureByStructureId($id) {
        try {
            $conn = connexionSQL();
            $stmt = $conn->prepare("delete from secteurs_structures where id_structure = :id  ");

            //var_dump($stmt);
            $res=$stmt->execute([":id" => $id]);
      //     var_dump($res);
       //     var_dump($stmt);
        }
        catch(PDOException $e)
        {
            echo "Error ".$e->getCode()." : ".$e->getMessage()."<br/>".$e->getTraceAsString();
        }
    }

    public static function deleteSecteurStructureBySecteurId($id) {
        try {
            $conn = connexionSQL();
            $stmt = $conn->prepare("delete from secteurs_structures where id_secteur = :id  ");

            //var_dump($stmt);
            $res=$stmt->execute([":id" => $id]);
          //  var_dump($res);
          //  var_dump($stmt);
        }
        catch(PDOException $e)
        {
            echo "Error ".$e->getCode()." : ".$e->getMessage()."<br/>".$e->getTraceAsString();
        }
    }

    public static function getByStructureId($idStructure) {

        try {
            $conn = connexionSQL();
            $stmt = $conn->prepare("select * from secteurs_structures where id_structure = :id");
            $res=$stmt->execute([":id" => $idStructure]);

            if ($res) {
                $lines = $stmt->fetchAll(PDO::FETCH_BOTH);
            }
            // fermeture de la connexion
            $conn = null;
            return $lines;
        }catch(PDOException $e)
        {
            echo "Error ".$e->getCode()." : ".$e->getMessage()."<br/>".$e->getTraceAsString();
        }
    }

    public static function getByStructureAndSecteurId($idStructure, $idSecteur) {

        try {
            $conn = connexionSQL();
            $stmt = $conn->prepare("select * from secteurs_structures where id_structure = :idStructure and id_secteur = :idSecteur");
            $res=$stmt->execute([":idStructure" => $idStructure,":idSecteur" => $idSecteur]);

            if ($res) {
                $lines = $stmt->fetchAll(PDO::FETCH_BOTH);
            }
            // fermeture de la connexion
            $conn = null;
            return $lines;
        }catch(PDOException $e)
        {
            echo "Error ".$e->getCode()." : ".$e->getMessage()."<br/>".$e->getTraceAsString();
        }
    }
}

?>