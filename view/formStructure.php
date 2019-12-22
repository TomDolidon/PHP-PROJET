<body>


<form name="" action="<?= $ROUTE_URL ?>index.php" method="get">

    <input type="hidden" name="controller" value="structureController"/>


    <label for="">Nom</label>
    <input type="text" name="nom" value="<?= isset($structure) ? $structure['NOM'] : "" ?>"/>
    <br>
    <label for="">Rue</label>
    <input type="text" name="rue" value="<?= isset($structure) ? $structure['RUE'] : "" ?>"/> <br>

    <label for="">Code Postal</label>
    <input type="text" name="cp" value="<?= isset($structure) ? $structure['CP'] : "" ?>"/> <br>

    <label for="">Ville</label>
    <input type="text" name="ville" value="<?= isset($structure) ? $structure['VILLE'] : "" ?>"/> <br>


    <label for=""> <?= (isset($type) && $type == "association") ? "Nombre de donateurs" : "Nombre d'actionnaires" ?></label>
    <input type="hidden" name="estasso" value= "<?= ($type == "association") ? 1 : 0 ?>" />


    <?php
// idéalement on factorise tous ca dans une fonction php tools/utils.display...
    if ($type == "association") {

        if (isset($structure)) {
            echo "
                <input type=\"text\" name=\"nb_donateurs\" value=" . $structure['NB_DONATEURS'] . "  >
             ";
        } else {
            echo "
                <input type=\"text\" name=\"nb_donateurs\" value=\"\" >
                ";

        }

    } else {
        if (isset($structure)) {
            echo "
                <input type=\"text\" name=\"nb_actionnaires\" value=" . $structure['NB_ACTIONNAIRES'] . "  >
             ";
        } else {
            echo "
                <input type=\"text\" name=\"nb_actionnaires\" value=\"\" >";
        }
    }

    ?>
    <p>


        <?php
        foreach ($secteurs as $secteur){
            if (isset($checkArray)){
                $check = false;
                foreach ($checkArray as $checkedItem) {
                    if (in_array($secteur['ID'],$checkArray) &&$checkedItem==$secteur['ID']){
                        $check = true;
                    }
                }
                if ($check) {
                    echo "
            <label for=\"\">". $secteur['LIBELLE'] . " </label>         
             <input type=\"checkbox\" name=\"secteurs[]\" id=\"secteurs\" value=" .$secteur['ID']." checked>";
                    $check=false;
                }else{
                    echo "
            <label for=\"\">". $secteur['LIBELLE'] . " </label>         
             <input type=\"checkbox\" name=\"secteurs[]\" id=\"secteurs\" value=" .$secteur['ID']." >";
                }
            }else{
                echo "
            <label for=\"\">". $secteur['LIBELLE'] . " </label>         
             <input type=\"checkbox\" name=\"secteurs[]\" id=\"secteurs\" value=" .$secteur['ID']." >";
            }
        }



        ?>





    <p>

        <?php
        if (isset($structure)) {
            echo " <input type=\"submit\" value=\"Modifier\" />
             <input type=\"hidden\" name=\"action\" value=\"submit_update\" />
                          <input type=\"hidden\" name=\"id\" value=" .$structure['ID']. " />
                          ";
        } else {
            echo "            <input type=\"hidden\" name=\"action\" value=\"submit_new\" />
        <input type=\"submit\"  value=\"Créer\"/>
                        
             ";
        };
        ?>

    </p>
</form>


<a href="<?= $ROUTE_URL ?>index.php?controller=indexController" > <input type="reset" value="Annuler"/></a>
</p>
</form>

</body>
