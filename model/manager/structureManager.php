<?php

namespace model\manager;

use PDO;

require_once "./model/dbProvider.php";

class structureManager {


public static function getAllStructures() {

    try {
        $conn = connexionSQL();
        $stmt = $conn->prepare("select * from structure");
        $res = $stmt->execute();
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

public static function deleteSecteurStructure($id) {
    try {
        $conn = connexionSQL();
        $stmt = $conn->prepare("delete from secteurs_structures where id_secteur = :id  ");

        //var_dump($stmt);
        $res=$stmt->execute([":id" => $id]);
        var_dump($res);
        var_dump($stmt);
    }
    catch(PDOException $e)
    {
        echo "Error ".$e->getCode()." : ".$e->getMessage()."<br/>".$e->getTraceAsString();
    }
}

public static function addStructure() {

}

public static function updateStructure(){

}

public static function deleleStructureById($id){
    try {
        $conn = connexionSQL();
        $stmt = $conn->prepare("delete from structure where id = :id  ");

        //var_dump($stmt);
        $res=$stmt->execute([":id" => $id]);
        var_dump($res);
        var_dump($stmt);
    }
    catch(PDOException $e)
    {
        echo "Error ".$e->getCode()." : ".$e->getMessage()."<br/>".$e->getTraceAsString();
    }
}
}

?>