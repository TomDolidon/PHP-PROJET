<?php

namespace model\manager;

use PDO;

require_once "./model/dbProvider.php";

class secteurManager {


public static function getAllSecteurs() {

    try {
        $conn = connexionSQL();
        $stmt = $conn->prepare("select * from secteur");
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

    public static function getSecteurById($id) {

        try {
            $conn = connexionSQL();
            $stmt = $conn->prepare("select * from secteur where  id = :id");
            $res=$stmt->execute([":id" => $id]);

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
/*
    public static function getSecteurByLibelle($libelle) {

        try {
            $conn = connexionSQL();
            $stmt = $conn->prepare("select * from secteur where  libelle = :libelle");
            $res=$stmt->execute([":libelle" => $libelle]);

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
*/
public static function addSecteur($libelle){
    try {
        $conn = connexionSQL();
        $stmt = $conn->prepare("insert into secteur(libelle) values (:libelle)");

        //var_dump($stmt);
        $res=$stmt->execute([":libelle" => $libelle]);
        var_dump($res);
        var_dump($stmt);
    }
    catch(PDOException $e)
    {
        echo "Error ".$e->getCode()." : ".$e->getMessage()."<br/>".$e->getTraceAsString();
    }
}

public static function updateSecteur($id, $libelle){
    try {
        $conn = connexionSQL();
        $stmt = $conn->prepare("update secteur set libelle = :libelle where id = :id  ");

        //var_dump($stmt);
        $res=$stmt->execute([":libelle" => $libelle, ":id" => $id]);
        var_dump($res);
        var_dump($stmt);
    }
    catch(PDOException $e)
    {
        echo "Error ".$e->getCode()." : ".$e->getMessage()."<br/>".$e->getTraceAsString();
    }
}

public static function deleteSecteurById($id) {

    try {
        $conn = connexionSQL();
        $stmt = $conn->prepare("delete from secteur where id = :id  ");

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
