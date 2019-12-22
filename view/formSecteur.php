<body>

    <div class="container">

        <div class="row">

            <div  class="col-lg-6 offset-lg-3">
                <h2 class="formTitle"> Créer un nouveau secteur :</h2>

                <form name="" action="<?= $ROUTE_URL ?>index.php" method="get">


                    <span class="col-lg-4 offset-lg-1">Libelle : </span>

                    <input class="col-lg-4 offset-lg-1" type="text" name="libelle" value="<?= isset($secteur) ? $secteur['LIBELLE'] : "" ?>"/>


                    <input type="hidden" name="controller" value="secteurController"/>

                    <?php
                    if (isset($secteur)) {
                        echo " <input class=\"btnValider btn btn-primary\" type=\"submit\" value=\"modifier\" />
                        <input type=\"hidden\" name=\"action\" value=\"submit_update\" />
                                    <input type=\"hidden\" name=\"id\" value=\" " . $secteur['ID'] . "\" />  ";
                    } else {
                        echo "            <input type=\"hidden\" name=\"action\" value=\"submit_new\" />
                        <input class=\"btn btn-primary btnValider\" type=\"submit\" value=\"Créer secteur d'activite\" />
                                    
                        ";
                    };
                    ?>

                    <input class="btn btn-danger btnAnnuler" type="reset" value="Annuler"/>
                    <?php if (isset($erreur))echo $erreur; ?>

                </form>

            </div>

        </div>

    </div>

</body>

