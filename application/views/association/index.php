</br>
<nav>
	<div class="nav-wrapper">
		<a href="#" class="brand-logo center">Gestion des associations</a>
	</div>
</nav>

<div class="col s6">
  <h3>Liste des associations</h3>
  <table>
    <thead>
      <tr>
        <th data-field="nom">Nom de l'association</th>
        <th data-field="urlphoto">Photo</th>
        <th data-field="urlweb">Site web</th>
        <th data-field="afficher">Afficher</th>
        <th data-field="#">Action</th>
      </tr>
    </thead>

    <tbody>
        
        <?php
        
        foreach ($association as $row){
            echo '<tr>';
                echo '<td>'.$row->libelleAssociation.'</td>';

                echo '<td>';
                    echo $row->urlPhotoAssociation;
                echo '</td>';
                echo '<td>';
                    echo $row->urlSiteAssociation;
                echo '</td>';
                echo '<td>';
                    echo $row->afficherAssociation;
                echo '</td>';
                echo '<td>';
                   echo '<a href="'.URL.'index.php/Admin/deleteAssociation/'.$row->idAssociation.'">delete</a>';
                       
                echo '</td>';
            echo '</tr>';
        }
        
        ?>
      </tr>
    </tbody>
  </table>

</br>
<button class="btn waves-effect waves-light" type="submit" name="action">
    Ajouter association
</button>



<button class="btn waves-effect waves-light" type="submit" name="action">
    Annuler
</button>
</div>
