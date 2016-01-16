
<!--nav et header-->


<!--lgo-->

<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo center"><img src="<?php echo (IMG . $logo) ?>"></a>
    </div>
</nav>


<nav>
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
<nav>
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo center">IMAGE MAGIC DAY</a>
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
                                echo '<img src = "' . IMG . $rowP->urlPhoto . '">';
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
        echo '<div class="col s12 m3">';
        echo '<img class="materialboxed imgRonde" width="200" src="' . IMG . $row->urlPhotoAssociation . '">';
        echo '</div>';
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
    echo '<img src="' . $row->urlLot . '">';
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
                <div class="col s12 l12 m12 center">
                    <a class="waves-effect waves-light btn btninscript">Pseudo</a>
                </div>
            </div>
            <div class="row">
                <div class="col s12 l12 m12 center">
                     <input id="email" type="email" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="col s12 l12 m12 center">
                    <a class="waves-effect waves-light btn btninscript">Valider</a>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="row">
    <footer class="page-footer">
        <div class="container">
            <div class="row">

                <div class="row">


                </div>

                <div class="row">
                    <div class="row">
                        <img src="<?php echo (IMG . $logo) ?>">
                    </div>
                    <div class="row">
                        <div class="nav-wrapper">
                            <div class="col s12 m4"></div>
                            <div class="col s12 m4">

                                // des lien ici

                            </div>
                            <div class="col s12 m4"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
</div>
<div class="footer-copyright">
    <div class="container">
        © 2014 Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
    </div>
</div>
</footer>
</div>