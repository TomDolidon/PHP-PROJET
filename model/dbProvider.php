<?php

function connexionSQL() {

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "php_project";

    try {
      // connexion à l'aide d'une chaîne de connexion
     $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
     // Configure le mode d'erreur de PDO à exception (mode non par défaut)
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
    }
    catch(PDOException $e)
    {
    echo "Error ".$e->getCode()." : ".$e->getMessage()."<br/>".$e->getTraceAsString();

    }

}

?>