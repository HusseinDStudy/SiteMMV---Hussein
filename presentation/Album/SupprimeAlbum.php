<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suppression d'Album</title>
</head>
<?php
require_once '../../navigation.php';
require_once '../../persistance/requiredDialoguesDBS.php';
$requeteSupprimer = new DialogueBDSupprimer();
$requeteListe = new DialogueBDListe(); ?>

<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <?php

            echo "<h1 class='text-center'>Suppression d'Album</h1>";

            echo "<form method=\"post\" action=\"SupprimeAlbum.php\">";
            echo "<fieldset  class=\" text-center \">";
            if(!isset($_POST['album']) && !isset($_POST['suppressionAlbum'])) {
                echo "<label  class=\"font-weight-bold\" for=\"Album\">Album a supprimer: </label>";

                echo "<select id=\"Album\" name=\"album\" class=\"w-25\">";
                try {
                    $mesAlbums = $requeteListe->listerAlbums();
                    foreach ($mesAlbums as $Album) {
                        $codeAlbum = $Album['IDALBGRP'];
                        $titreAlbum = $Album['NOMALBGRP'];
                        $complet = $Album['COMPLETALBGRP'];
                        echo "<option value=$codeAlbum>$titreAlbum<-->Album Complet ou pas?(O/N): $complet</option>";
                    }
                } catch (Exception $e) {
                    $erreur = $e->getMessage();
                    echo $erreur;
                }
                echo "</select><br>";
                echo "<h1 class='bg-danger text-dark'>Attention l'Album Mais aussi ses Musics  et bien sure leur lien avec les Videos seront Supprimer </h1>";
                echo "<h5 class='bg-secondary text-white'>Juste En cas d'utilisation d'un l'Album avec des musics utiliser dans des Videos  [Voir liste Musics par Album]</h5>";
                echo "<br><br><input id=\"SuppressionAlbum\" name=\"suppressionAlbum\" type=\"submit\" value=\"Soumetre\"><br>";
            }else if(!isset($id_Album)) {
                $id_Album=htmlentities($_POST["album"], ENT_QUOTES);

                try {
                    $requeteSupprimer->SupprimerAlbum($id_Album);
                    echo "<h3>Requete de Suppression Fini et Reussit</h3>";
                }catch (exception $e){
                    echo $e->getMessage();
                }
            }

            echo"</form>";
            ?>


        </div>
    </section>
</div>
</html>


