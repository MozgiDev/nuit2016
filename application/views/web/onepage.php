
<!--nav et header-->


<!--lgo-->

<nav style="box-shadow:none">
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo center" ><img src="<?php echo (IMG . $logo[0]->urlLogo) ?>" width="150"></a>
    </div>
</nav>


<nav style="box-shadow:none">
    <div class="nav-wrapper">
        <div class="col s12 m4"></div>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <div class="col s12 m4">
            <ul class="hide-on-med-and-down">
                <li><a href="#presentation">Présentation</a></li>
                <li><a href="#inscription">Inscription</a></li>
                <li><a href="#association">Association</a></li>
                <li><a href="#lots">Lots</a></li>
            </ul>

        </div>
        <div class="col s12 m4"></div>
    </div>
</nav>
<nav style="height: 150px;box-shadow:none">
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo center"><img style="margin-top: 20px;" src="<?php echo (IMG . $image[0]->urlIMAGE) ?>"></a>
    </div>
</nav>


<div class="container">
    <!--Presentation-->
    <div class="row" id="presentation">
        <h1 class="center">Presentation</h1>
        <div class="row">
            <div class="col s12 m6 l6">





                <p>Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem suiSed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem s.</p>
            </div>
            <div class="col s12 m6 l6">
                <p>Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem suiSed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem s.</p>
            </div>
        </div>
        <div class="row">

            <div class="slider-album">
                <?php
                // BOucle sur l'album
                foreach ($album as $row) {

                    if ($row->afficherAlbum == 1) {

                        echo '<div class = "col s12 m4">';
                        echo '<div class = "card">';
                        echo '<div class = "card-image">';
                        echo '<div class = "slider">';
                        echo '<ul class = "slides">';
                        // on boucle sur les images liée a l'album

                        foreach ($photos as $rowP) {
                            if ($rowP->idAlbum == $row->idAlbum) {
                                echo '<li>';
                                echo '<img class="materialboxed" src = "' . IMG . $rowP->urlPhoto . '">';
                                echo '</li>';
                            }
                        }
                        echo '</ul>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class = "card-content">';
                        echo '<p class = "center">' . $row->libelleAlbum . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>




            </div>

        </div>
    </div>



    <!--Association-->
    <div class="row" id="association">

        <h1 class="center">Association</h1>
        <div class="association">
            <?php
            foreach ($association as $row) {
                if ($row->afficherAssociation == 1) {
                    echo '<a href="' . $row->urlSiteAssociation . '">';
                    echo '<div class="col s12 m3">';
                    echo '<img class="imgRonde" width="200" src="' . IMG . $row->urlPhotoAssociation . '">';
                    echo '</div>';
                    echo '</a>';
                }
            }
            ?>



        </div>
    </div>

    <!--Lots-->
    <div class="row" id="lots">

        <h1 class="center">Lots</h1>

        <?php
        $i = 0;
        foreach ($lots as $row) {
            $i = $i + 1;
            echo '<div class="col s12 m4">';
            echo '<div class="row">';
            echo '<div class="col s12 m7">';
            echo '<div class="card">';
            echo '<div class="card-image">';
            echo '<img src="' . IMG . $row->urlLot . '">';
            echo '</div>';
            echo '<div class="card-content">';
            echo '<p class="center">' . $i . 'er n-' . $i . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>



    </div>


    <!--Bouton et footer-->

    <div class="row" id="inscription">
        <div class="row">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="Pseudo" id="pseudo" type="text" class="validate">
                    <label for="first_name">Pseudo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" class="validate">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12 l12 m12 center">
                    <a class="waves-effect waves-light btn btninscript" onclick="inscription()">Valider</a>
                </div>
            </div>

        </div>

    </div>
</div>
<div id="modal_inscription" class="modal">
    <div class="modal-content">
        <h4>Token:</h4>
        <div id="token">  <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div></div>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">OK</a>
    </div>
</div>


<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="row center">
                <img src="<?php echo (IMG . $logo[0]->urlLogo) ?>" width="150px;">
            </div>
            <div class="row">
                <div class="nav-wrapper">
                    <div class="col s12 m4">
                      <nav style="box-shadow:none">
                      <ul class="hide-on-med-and-down">
                          <li><a href="#presentation">Présentation</a></li>
                          <li><a href="#inscription">Inscription</a></li>
                          <li><a href="#association">Association</a></li>
                          <li><a href="#lots">Lots</a></li>
                      </ul>
                    </nav>
                    </div>
                    <div class="col s12 m4"></div>
                </div>
            </div>
        </div>
        <div class="container">© 2016 Nuit 2016 </a> </div>
    </div>

</div>
</footer>
</div>
