</br>
<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo center">Gestion des contenus</a>
    </div>
</nav>

<div class="row">
    <div class="col s6">

        <?php echo  form_open('admin/updateContenu');
            form_label("Titre du contenu");
            echo "<h3>
 <input type=\"input\" name=\"TitreContenu\" placeholder= \".$contenue->TitreContenu\">
</h3>
            <textarea id='editor1' name='editor1' id='TexteContenu'>$contenue->TexteContenu</textarea>
            </br>
            <button class='btn waves-effect waves-light'' type='submit' name='action'>
                Valider action
            </button>


            <button class='btn waves-effect waves-light' type='submit' name='action'>
                Annuler saisie
            </button>";

            
        ?>
    </form>
    </div>

</div>

</br>
<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo center">Gestion des images</a>
    </div>
</nav>

<div class="row">
    <div class="col s6">

        <h3>Image de présentation</h3>
        <img src="<?=$image->urlIMAGE?>"/>

        <?php echo form_open_multipart('admin/updateImage');?>
        <input type="file" name="monImage" size="20" />
        <br /><br />
        <input type="submit" value="upload" />
        
        </form>

        <button class="btn waves-effect waves-light" type="submit" name="action">
            Valider
        </button>

        <button class="btn waves-effect waves-light" type="submit" name="action">
            Annuler
        </button>
    </div>


    <div class="col s6">
        <h3>Logo principal</h3>
        <img src="<?php echo IMG . $logo->urlLogo?>">
        <i>
        </i>
        <p>
            <input type="checkbox" id="afficherPres" />
            <label for="afficherPres">Afficher</label>
        </p>

        <button class="btn waves-effect waves-light" type="submit" name="action">
            Valider
        </button>

        <button class="btn waves-effect waves-light" type="submit" name="action">
            Annuler
        </button>

    </div>
</div>


<div class="row">

    <div class="col s6">
        <h3>Album</h3>
        <table>
            <thead>
            <tr>
                <th data-field="libelle">libelle</th>
                <th data-field="active">Active</th>
                <th data-field="#"></th>
            </tr>
            </thead>

            <tbody>
<?php foreach($albums as $album)
{
        echo"<tr><th>";
        echo $album->libelleAlbum;
        echo"</th><th>";

                echo "
            <input type=\"checkbox\" id=\"afficherPres\" value =\"$album->afficherAlbum\" name = \"afficherAlbum\" />
            <label for=\"afficherPres\"></label>
    </tr>";
}?>

            </tbody>
        </table>

        </br>

        <button class="btn waves-effect waves-light" type="submit" name="action">
            Valider action
        </button>

        <button class="btn waves-effect waves-light" type="submit" name="action">
            Annuler saisie
        </button>

    </div>

    <div class="col s6">
        <h3>Photo</h3>
        <table>
            <thead>
            <tr>
                <th data-field="url">URL</th>
                <th data-field="album">Album</th>
                <th data-field="active">Active</th>
                <th data-field="#"></th>
            </tr>
            </thead>

            <tbody>
            <?php foreach($photos as $photo)
{ echo"
    <tr>
                <th >$photo->urlPhoto</th>
                <th >$photo->idAlbum</th>
                <th >$photo->afficherPhoto</th>
                <th><a href= ".site_url("admin/deletePhoto/$photo->idPhoto")."> supprimer Photo</a></th>
    </tr>";
}?>

            </tbody>
        </table>
        </br>
        <!-- Modal Trigger -->
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

        <!-- Modal Structure -->
        <div id="modal1" class="modal">
            <div class="modal-content">
                <h4>Modal Header</h4>
                <p>A bunch of text</p>
            </div>
            <div class="modal-footer">
                <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">
            Valider action
        </button>

        <button class="btn waves-effect waves-light" type="submit" name="action">
            Annuler saisie
        </button>

    </div>

</div>

<div class="row">
    <div class="col s6">
        <h3>Lots</h3>
        <table>
            <thead>
            <tr>
                <th data-field="url">URL</th>
                <th data-field="position">position</th>
                <th data-field="#"></th>
            </tr>
            </thead>

            <tbody>
            
                <?php 
                foreach ($lots as $row){
                    echo '<tr>';
                    echo '<td>'.$row->urlLot.'</td>';
                    echo '<td>'.$row->positionLot.'</td>';
                    echo'</tr>';
                }
                   
                ?>              
            
            </tbody>
        </table>

        </br>

        <button class="btn waves-effect waves-light" type="submit" name="action">
            Valider action
        </button>

        <button class="btn waves-effect waves-light" type="submit" name="action">
            Annuler saisie
        </button>

    </div>
</div>
