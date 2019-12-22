

<body>

  <div class="container">

    <div class="row">
      <div class="col-lg-8 offset-lg-2">

        <h2> Liste des secteurs d'activités :</h2>

        <table class="col-lg-6 offset-lg-3">
          <thead>
            <tr>
              <th>
                Nom
              </th>
              <th>
                Actions
              </th>
            </tr>
          </thead> 

          <tbody>

          <?php

          foreach ($secteurs as $s){          
              echo "
              <tr>

                <td>". $s['LIBELLE'] ."</td>

                <td>    
                <a class=\"btn btn-primary\" href='". $ROUTE_URL . "index.php?controller=secteurController&action=edit&id=".
                $s['ID']."
                '> Editer </a> 

                <a class=\"btn btn-danger\" href='". $ROUTE_URL . "index.php?controller=secteurController&action=delete&id=".
                $s['ID']."
                '> Supprimer </a> 

                </td>
              </tr>";

          }
          ?>
          </tbody>

        </table>

        <a class="btn btn-primary col-lg-2 offset-lg-5 mt-4"  href="<?= $ROUTE_URL ?>index.php?controller=secteurController&action=new"> Nouveau </a>


      </div>
      
    </div>

    <div class="row">
      <div class="col-lg-8 offset-lg-2">

        <h2> Liste des associations :</h2>


        <table class="col-lg-10 offset-lg-1">
          <thead>
            <tr>
              <th>
                Nom
              </th>
              <th>
                Rue 
              </th>
              <th>
                Code postal 
              </th>
              <th>
                Ville 
              </th>
              <th>
                Donateurs
              </th>
              <th>
                Actions
              </th>
            </tr>
          </thead> 

          <tbody>

          <?php

          foreach ($structures as $s){   
            if (isset($s['ESTASSO']) && $s['ESTASSO'] ==1){
        
              echo "
              <tr>

                <td>". $s['NOM'] ."</td>
                <td>". $s['RUE'] ."</td>
                <td>". $s['CP'] ."</td>
                <td>". $s['VILLE'] ."</td>
                <td>". $s['NB_DONATEURS'] ."</td>


                <td>    
                <a class=\"btn btn-primary\" href='". $ROUTE_URL . "index.php?controller=structureController&action=edit&id=".
                $s['ID']."
                '> Editer </a> 

                <a class=\"btn btn-danger\" href='". $ROUTE_URL . "index.php?controller=structureController&action=delete&id=".
                $s['ID']."
                '> Supprimer </a> 

                </td>
              </tr>";
            }
          }
          ?>
          </tbody>

        </table>

        <a class="btn btn-primary col-lg-2 offset-lg-5 mt-4"  href="<?= $ROUTE_URL ?>index.php?controller=structureController&action=new&type=association"> Nouveau </a>

      </div>
      
    </div>

    <div class="row">
      <div class="col-lg-8 offset-lg-2">

        <h2> Liste des Entreprises :</h2>

        <table class="col-lg-10 offset-lg-1">
          <thead>
            <tr>
              <th>
                Nom
              </th>
              <th>
                Rue 
              </th>
              <th>
                Code postal 
              </th>
              <th>
                Ville 
              </th>
              <th>
                Actionaires
              </th>
              <th>
                Actions
              </th>
            </tr>
          </thead> 

          <tbody>

          <?php

          foreach ($structures as $s){   
            if (isset($s['ESTASSO']) && $s['ESTASSO'] ==0){
        
              echo "
              <tr>

                <td>". $s['NOM'] ."</td>
                <td>". $s['RUE'] ."</td>
                <td>". $s['CP'] ."</td>
                <td>". $s['VILLE'] ."</td>
                <td>". $s['NB_ACTIONNAIRES'] ."</td>


                <td>    
                <a class=\"btn btn-primary\" href='". $ROUTE_URL . "index.php?controller=structureController&action=edit&id=".
                $s['ID']."
                '> Editer </a> 

                <a class=\"btn btn-danger\" href='". $ROUTE_URL . "index.php?controller=structureController&action=delete&id=".
                $s['ID']."
                '> Supprimer </a> 

                </td>
              </tr>";
            }
          }
          ?>
          </tbody>

        </table>

        <a class="btn btn-primary col-lg-2 offset-lg-5 mt-4" href="<?= $ROUTE_URL ?>index.php?controller=structureController&action=new&type=entreprise"> Nouveau </a>

      </div>
      
    </div>
  </div>


</body>
</html>