<body>

    <div class="container">
        
        <div class="row">

            <div  class="col-lg-6 offset-lg-3">
                <?php
                    if(isset($errorMessage)) {
                        echo "<div class=\"errorMessage\"> " . $errorMessage . " </div>";
                    }
                ?>

                <h2 class="formTitle">    
                <?= (isset($type) && $type == "association") ? "Créer une nouvelle association" : "Créer une nouvelle entreprise" ?>
                </h2>

                <form name="" action="<?= $ROUTE_URL ?>index.php" method="get">

                    <input type="hidden" name="controller" value="structureController"/>

                    <div class="divInput">
                        <span class="col-lg-4 offset-lg-1">Nom : </span>
                        <input style="float:right;" type="text" name="nom" value="<?= isset($structure) ? $structure['NOM'] : "" ?>"/>
                    </div>

                    <div class="divInput">
                        <span class="col-lg-4 offset-lg-1">Rue :   </span>
                        <input style="float:right;" type="text" name="rue" value="<?= isset($structure) ? $structure['RUE'] : "" ?>"/>
                    </div>

                    <div class="divInput">
                        <span class="col-lg-4 offset-lg-1">Code Postal :</span>
                        <input style="float:right;" type="text" name="cp" value="<?= isset($structure) ? $structure['CP'] : "" ?>"/> <br>
                    </div>

                    <div class="divInput">
                        <span class="col-lg-4 offset-lg-1">Ville :</span>
                        <input style="float:right;" type="text" name="ville" value="<?= isset($structure) ? $structure['VILLE'] : "" ?>"/> <br>
                    </div>

                    <div class="divInput">

                        <span class="col-lg-4 offset-lg-1"> <?= (isset($type) && $type == "association") ? "Nombre de donateurs :" : "Nombre d'actionnaires :" ?></span>
                        <input type="hidden" name="estasso" value= "<?= ($type == "association") ? 1 : 0 ?>" />

                        <?php
                            if ($type == "association") {
                                if (isset($structure)) {
                                    echo "
                                        <input style=\"float:right;\" class=\"col-lg-4 offset-lg-1\" type=\"text\" name=\"nb_donateurs\" value=" . $structure['NB_DONATEURS'] . "  >
                                    ";
                                } else {
                                    echo "
                                        <input style=\"float:right;\" class=\"col-lg-4 offset-lg-1\" type=\"text\" name=\"nb_donateurs\" value=\"\" >
                                        ";
                                }
                            } else {
                                if (isset($structure)) {
                                    echo "
                                        <input style=\"float:right;\" class=\"col-lg-4 offset-lg-1\" type=\"text\" name=\"nb_actionnaires\" value=" . $structure['NB_ACTIONNAIRES'] . "  >
                                    ";
                                } else {
                                    echo "
                                        <input style=\"float:right;\" class=\"col-lg-4 offset-lg-1\" type=\"text\" name=\"nb_actionnaires\" value=\"\" >";
                                }
                            }
                        ?>
                    </div>

                <div>
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
                </div>


            <?php
            if (isset($structure)) {
                echo " <input class=\"btn btn-primary btnValider\" type=\"submit\" value=\"Modifier\" />
                <input type=\"hidden\" name=\"action\" value=\"submit_update\" />
                            <input type=\"hidden\" name=\"id\" value=" .$structure['ID']. " />
                            ";
            } else {
                echo "            <input type=\"hidden\" name=\"action\" value=\"submit_new\" />
            <input class=\"btn btn-primary btnValider\" type=\"submit\"  value=\"Créer\"/>
                            
                ";
            };
            ?>

    
            <a class="btn btn-danger btnAnnuler" href="<?= $ROUTE_URL ?>index.php"> Annuler </a>
   
            </form>

        </div>

    </div>

</body>
