<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste de mes Musics </title>
</head>
<?php require_once '../../navigation.php';
require_once '../../persistance/requiredDialoguesDBS.php';
?>
<?php $requeteListe = new DialogueBDListe();?>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Liste de mes Musics </h1>
            <table class="table table-bordered table-striped ">
                <?php
                $nbMusic = 0;
                echo "<tr><th>IDMUSIC</th> <th>TITRE MUSIC</th><th>ID ALB/GRP</th></tr>";

                $listeMusics=$requeteListe->listerMusics();
                foreach ($listeMusics as $indice => $ligne) {
                    $id_music = $ligne['IDMUSIC'];
                    $titre = $ligne['TITREMUSIC'];
                    $id_alb = $ligne['IDALBGRP'];///////////////////////////////////////

                    echo "<tr><td>$id_music</td> <td>$titre</td><td>$id_alb</td></tr>";
                    $nbMusic++;
                }
                ?>
            </table>
            <?php echo "<h3 class=\"text-left\">J'ai $nbMusic Musics dans ma BDD</h3>";?>
        </div>
    </section>
</div>
</html>
