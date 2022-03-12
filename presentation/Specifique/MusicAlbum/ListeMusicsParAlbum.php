<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste Des Musics D'un Album </title>
</head>
<?php require_once '../../../navigation.php';
require_once '../../../persistance/requiredDialoguesDBS.php';
?>
<?php $requeteListe = new DialogueBDListe();?>
<body>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <?php
            if(!isset($_POST['idAlbum'])){
                echo "<h1 class=\"text-center\">Liste Des Musics D'un Album </h1>";
                echo "<form method=\"post\" action=\"ListeMusicsParAlbum.php\">";
                $listeAlbum=$requeteListe->listerAlbums();
                echo "<label  class=\"font-weight-bold\" for=\"IDAlbum\">Albums : </label><select id=\"IDAlbum\" name=\"idAlbum\" class=\"w-25\">";
                foreach ($listeAlbum as $indice => $ligne) {
                    $id_Album = $ligne['IDALBGRP'];
                    $titre = $ligne['NOMALBGRP'];
                    $complet = $ligne['COMPLETALBGRP'];
                    echo "<option value=$id_Album>$titre <->$complet</option>";
                }echo "</select><br><br><input type=\"submit\" value=\"Afficher les Musics\"></form>";
            }else{
                $id_VMMV=htmlentities($_POST['idAlbum'], ENT_QUOTES);
                $titre=$requeteListe->getAlbumParID($id_VMMV)->NOMALBGRP;
                echo "<h1 class=\"text-center\">Liste de Des Musics De l'Album: </h1><h2 class=\"text-center\">$titre</h2>";

                echo "<table class=\"table table-bordered table-striped \">";
                $nbMusic = 0;
                echo "<tr><th>IDMUSIC</th> <th>TITRE MUSIC</th><th>ID ALB/GRP</th></tr>";
                $listeMusics=$requeteListe->listerMusicsDe1Album($id_VMMV);
                foreach ($listeMusics as $indice => $ligne) {
                    $id_music = $ligne['IDMUSIC'];
                    $titre = $ligne['TITREMUSIC'];
                    $id_alb = $ligne['IDALBGRP'];///////////////////////////////////////

                    echo "<tr><td>$id_music</td> <td>$titre</td><td>$id_alb</td></tr>";
                    $nbMusic++;
                }
                echo " </table><h3 class=\"text-left\">J'ai $nbMusic Musics dans l'Album</h3>";
            }
            ?>
        </div>
    </section>
</div>
</body>
</html>