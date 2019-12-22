<?php

function createInput($nom,$type) {
    echo '<input type="'.$type.'"  name="'.$nom.'" id="'.$nom.'" value="';
    if (isset($_SESSION[$nom])) echo htmlspecialchars($_SESSION[$nom]);
    elseif (isset($_COOKIE[$nom])) {
        echo htmlspecialchars($_COOKIE[$nom]);
    }
    echo '"/>';
}

function displaySecteurs() {

    $secteurs = getAllSecteurs();

    foreach ($secteurs as $s){
        echo '<form name="" action="index.php" method="post">
        <input type="text"  name="secteur_libelle"  value="'.$s['LIBELLE'].'" />
        <input type="hidden"  name="id" id="'.$s['ID'].'" value="'.$s['ID'].'" />
           <p>
        <input type="submit" name="secteur_update" value="Mettre à jour"/>
        <input type="submit" name="secteur_delete" value="Supprimer"/>
          </p>
        </form>
       ';

    }
}



function displayStructures() {

    $structures = getAllStructures();

    echo'<h3>Assoc</h3> <br/>';
    foreach ($structures as $s){
        if (isset($s['ESTASSO']) && $s['ESTASSO'] ==1){
            echo '<form name="" action="index.php" method="post">
        <label for="">Nom</label>
        <input type="text"  name="assoc_nom" id="'.$s['ID'].'" value="'.$s['NOM'].'"/> 
        <label for="">Rue</label>
        <input type="text"  name="assoc_rue" id="'.$s['ID'].'" value="'.$s['RUE'].'"/>
        <label for="">Code Postal</label>  
        <input type="text"  name="assoc_cp" id="'.$s['ID'].'" value="'.$s['CP'].'"/>
        <label for="">Ville</label>
        <input type="text"  name="assoc_ville" id="'.$s['ID'].'" value="'.$s['VILLE'].'"/>  
        <label for="">Nombre de donateurs</label>
        <input type="number"  name="assoc_nbDonteurs" id="'.$s['ID'].'" value="'.$s['NB_DONATEURS'].'"/>
           <p>
        <input type="submit" name="assoc_update" value="Mettre à jour"/> 
        <input type="submit" name="assoc_delete" value="Supprimer"/>
          </p>
        </form>
       ';
        }
    }
    echo'<h3>Entreprise</h3> <br/>';
    foreach ($structures as $s){
        if (isset($s['ESTASSO']) && $s['ESTASSO'] ==0){
            echo '<form name="" action="index.php" method="post">
        <label for="">Nom</label>
        <input type="text"  name="entreprise_name" id="'.$s['ID'].'" value="'.$s['NOM'].'" <br/>
                <label for="">Rue</label>
        <input type="text"  name="entreprise_rue" id="'.$s['ID'].'" value="'.$s['RUE'].'" <br/>
                <label for="">Code Postal</label>
        <input type="text"  name="entreprise_cp" id="'.$s['ID'].'" value="'.$s['CP'].'" <br/>
                <label for="">Ville</label>
        <input type="text"  name="entreprise_ville" id="'.$s['ID'].'" value="'.$s['VILLE'].'" <br/> 
                <label for="">Nombre d\'actionnaires</label>   
        <input type="number"  name="entreprise_nbActionnaires" id="'.$s['ID'].'" value="'.$s['NB_ACTIONNAIRES'].'" <br/>    
           <p>
        <input type="submit" name="entreprise_update" value="Mettre à jour"/>
        <input type="submit" name="entreprise_delete" value="Supprimer"/>
          </p>
        </form>
       ';
        }
    }
}


?>
<?php
