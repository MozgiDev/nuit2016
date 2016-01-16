<div class="input-field col s12">
    <select>
      <?php foreach($joueurs as $unJoueur)
        echo '<option value=".'$unJoueur->idJoueur.'">'.$unJoueur->pseudo.'</option>';
      ?>
    </select>
  </div>