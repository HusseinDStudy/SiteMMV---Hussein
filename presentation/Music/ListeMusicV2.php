<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste de mes Musics V2</title>
</head>
<?php require_once '../../navigation.php';
require_once '../../persistance/requiredDialoguesDBS.php';
?>
<?php $requeteListe = new DialogueBDListe();?>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Liste de mes Musics V2</h1>
            <table class="table table-bordered table-striped ">
                <?php
                $nbMusic = 0;
                echo "<tr><th>IDMUSIC</th> <th>TITRE MUSIC</th><th>NOM ALB/GRP</th><th>ALB/GRP COMPLET OU PAS</th></tr>";

                $listeMusics=$requeteListe->listerMusics2();
                foreach ($listeMusics as $indice => $ligne) {
                    $id_music = $ligne['IDMUSIC'];
                    $titre = $ligne['TITREMUSIC'];
                    $nom_alb = $ligne['NOMALBGRP'];
                    $complet = $ligne['COMPLETALBGRP'];

                    echo "<tr><td>$id_music</td> <td>$titre</td><td>$nom_alb</td><td>$complet</td></tr>";
                    $nbMusic++;
                }
                ?>
            </table>
            <?php echo "<h3 class=\"text-left\">J'ai $nbMusic Musics dans ma BDD</h3>";?>
        </div>
    </section>
</div>
</html>
