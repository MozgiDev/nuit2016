</br>
<nav>
	<div class="nav-wrapper">
		<a href="#" class="brand-logo center">Gestion des ateliers</a>
	</div>
</nav>

<div class="row">
  <div class="col s6">
    <table>
      <thead>
        <tr>
          <th data-field="nom">Atelier</th>
          <th data-field="urlphoto">Libelle</th>
          <th data-field="urlweb">Description</th>
          <th data-field="#">Actions</th>
        </tr>
      </thead>

      <tbody>
          <?php
        foreach($ateliers as $unAtelier)
        {
          echo '<tr>';
          echo '<td>'.$unAtelier->libelleAtelier.'</td>';
          echo '<td>'.$unAtelier->descriptionAtelier.'</td>';
          echo '<td>'.$unAtelier->afficherAtelier.'</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>

  </br>
    <button class="btn waves-effect waves-light" type="submit" name="action">
      Ajouter atelier
    </button>

    <button class="btn waves-effect waves-light" type="submit" name="action">
      Valider
    </button>

    <button class="btn waves-effect waves-light" type="submit" name="action">
      Annuler
    </button>
  </div>
</div>

<div class="row">
</br></br>
  <div class="col s3">
      <select class="browser-default">
        <option value="1" selected>Option 1</option>
        <option value="2">Option 2</option>
        <option value="3">Option 3</option>
      </select>
    </div>
</div>

<div class="row">
      <div class="col s6">
             <table class='responsive-table'>
              <thead>
              <th>Libelle</th>  
              <th>Description</th>  
              <th>action</th> 
              </thead>

              <tbody>
            
              </tbody>
</table>
			</div>
</div>

<div class="row">
  <div class="col s6">
    <button class="btn waves-effect waves-light" type="submit" name="action">
      Imprimer atelier
    </button>

    <button class="btn waves-effect waves-light" type="submit" name="action">
      Imprimer tous les ateliers
    </button>

    <button class="btn waves-effect waves-light" type="submit" name="action">
      Valider
    </button>

    <button class="btn waves-effect waves-light" type="submit" name="action">
      Annuler
    </button>
  </div>
</div>
