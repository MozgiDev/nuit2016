<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="fr">
    <head>
        <meta charset="UTF-8">

        <title>Prenuit</title>
        <link rel="stylesheet" href="<?php echo (Materialize . 'css/materialize.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo (Materialize . 'css/materialize.icons.css'); ?>">
        <link rel="stylesheet" href="<?php echo (CSS . 'css/style.css'); ?>">
        <link rel="stylesheet" href="assets/slick.css">
    </head>
    <body>
        <!-- Le fichier Template a pour caractéristique d'être le point de passage
        la variable $content au millieu de cette page contient toutes les autres pages
        Ont peut donc écrire le code de la barre de navigation qu'une seul fois ainsi que tous les appels
        des feuilles CSS, JS-->

        <!-- Barre de navigation -->

        <!-- Fin de barre de navigation -->

        <!-- Contenue des pages dans la variables $contents -->
        <div id="container">
            <?= $contents ?>
        </div>
        <!-- Fin du contenue des pages dans la variables $contents -->


        <!--Appelles des feuilles JS-->
        <script src="<?php echo (Jquery); ?>"></script>
        <script src="<?php echo (Materialize . 'js/materialize.min.js'); ?>"></script>
        <script type="text/javascript" src="assets/slick.min.js"></script>
        <script>
            $('.slider-album').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                speed: 400,
                autoplay: true,
                autoplaySpeed: 5000
            });

            $(document).ready(function () {
                $('.slider').slider({full_width: true});
            });
        </script>

        <script type="text/javascript">
            
  $(document).ready(function() {
    $('select').material_select();
  });
            
        </script>

            <script>
        function inscription() {
            pseudo = $('#pseudo').val();
            mail = $('#email').val();

            $('#modal_inscription').openModal();

            $.ajax({
                url: "http://localhost/nuit2016/index.php/joueur/inscription",
                type: "POST",
                data: 'pseudo=moi&mail=mlkj@mail.com',
                success: function (html) {
                    console.log(html);
                    $('#token').html(html);
                }
            });
        }
    </script>
        <!--Fin d'appelles des feuilles JS-->
    </body>
</html>
