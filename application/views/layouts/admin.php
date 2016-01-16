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
    </head>
    <body>
        <!-- Le fichier Template a pour caractéristique d'être le point de passage
        la variable $content au millieu de cette page contient toutes les autres pages
        Ont peut donc écrire le code de la barre de navigation qu'une seul fois ainsi que tous les appels
        des feuilles CSS, JS-->

        <!-- Barre de navigation -->
        <nav>
        	<div class="nav-wrapper">
        		<a href="#" class="brand-logo center">Back Office</a>
        	</div>
        </nav>

        <nav>
        	<div class="nav-wrapper">
        		<ul id="nav-mobile" class="hide-on-med-and-down">
        			<li><a href="#">Gestions des contenus</a></li>
        			<li><a href="#">Gestions des joueurs</a></li>
        			<li><a href="#">Gestion des ateliers</a></li>
        			<li><a href="#">Gestion des associations</a></li>
        		</ul>
        	</div>
        </nav>

        <!-- Fin de barre de navigation -->

        <!-- Contenue des pages dans la variables $contents -->
        <div id="container">
            <?= $contents ?>
        </div>
        <!-- Fin du contenue des pages dans la variables $contents -->



        <!--Pied de page-->
        <footer>
            Footer Nuit 2016
        </footer>
        <!--Fin de pied de page-->

        <!--Appelles des feuilles JS-->
        <script src="<?php echo (Jquery); ?>"></script>
        <script src="<?php echo (Materialize . 'js/materialize.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo (ASSETS . 'ckeditor/ckeditor.js'); ?>"></script>
        <script>
            $(document).ready(function () {
                $('.slider').slider({full_width: true});
                
                CKEDITOR.replace( 'editor1' );

            });
        </script>
        <!--Fin d'appelles des feuilles JS-->
    </body>
</html>
