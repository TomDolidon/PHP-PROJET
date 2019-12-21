

<body>

  <div class="container">

    <div class="row">
      <div class="col-lg-8 offset-lg-2">

        <h2> Liste des secteurs d'activités :</h1>

        <a href="<?= $ROUTE_URL ?>index.php?controller=secteurController&action=new"> Nouveau </a>

        <table>
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
                <a href='". $ROUTE_URL . "index.php?controller=secteurController&action=edit&id=".
                $s['ID']."
                '> Editer </a> 

                <a href='". $ROUTE_URL . "index.php?controller=secteurController&action=delete&id=".
                $s['ID']."
                '> Supprimer </a> 

                </td>
              </tr>";

          }
          ?>
          </tbody>

        </table>

      </div>
      
    </div>

    <div class="row">
      <div class="col-lg-8 offset-lg-2">

        <h2> Liste des associations :</h1>

        <a href="<?= $ROUTE_URL ?>index.php?controller=structureController&action=new"> Nouveau </a>

        <table>
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
                <a href='". $ROUTE_URL . "index.php?controller=structureController&action=edit&id=".
                $s['ID']."
                '> Editer </a> 

                <a href='". $ROUTE_URL . "index.php?controller=structureController&action=delete&id=".
                $s['ID']."
                '> Supprimer </a> 

                </td>
              </tr>";
            }
          }
          ?>
          </tbody>

        </table>

      </div>
      
    </div>

    <div class="row">
      <div class="col-lg-8 offset-lg-2">

        <h2> Liste des Entreprises :</h1>

        <a href="<?= $ROUTE_URL ?>index.php?controller=structureController&action=new"> Nouveau </a>

        <table>
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
                <a href='". $ROUTE_URL . "index.php?controller=structureController&action=edit&id=".
                $s['ID']."
                '> Editer </a> 

                <a href='". $ROUTE_URL . "index.php?controller=structureController&action=delete&id=".
                $s['ID']."
                '> Supprimer </a> 

                </td>
              </tr>";
            }
          }
          ?>
          </tbody>

        </table>

      </div>
      
    </div>
  </div>


</body>
</html>