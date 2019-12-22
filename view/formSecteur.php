<body>


<form name="" action="<?= $ROUTE_URL ?>index.php" method="get">
    <label for="">Libelle</label>

    <input type="text" name="libelle" value="<?= isset($secteur) ? $secteur['LIBELLE'] : "" ?>"/>


    <p>
        <input type="hidden" name="controller" value="secteurController"/>

        <?php
        if (isset($secteur)) {
            echo " <input type=\"submit\" value=\"modifier\" />
             <input type=\"hidden\" name=\"action\" value=\"submit_update\" />
                         <input type=\"hidden\" name=\"id\" value=\" " . $secteur['ID'] . "\" />  ";
        } else {
            echo "            <input type=\"hidden\" name=\"action\" value=\"submit_new\" />
             <input type=\"submit\" value=\"Créer secteur d'activite\" />
                        
             ";
        };
        ?>
        <br>
    </p>
</form>
<a href="<?= $ROUTE_URL ?>index.php?controller=indexController" > <input type="reset" value="Annuler"/></a>
<?php if (isset($erreur))echo $erreur; ?>

</body>
