<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste de Des Musics D'une Videos MMV</title>
</head>
<?php require_once '../../../../navigation.php';
require_once '../../../../persistance/requiredDialoguesDBS.php';
?>
<?php $requeteListe = new DialogueBDListe();?>
<body>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
<?php
if(!isset($_POST['idVideoMMV'])){
    echo "<h1 class=\"text-center\">Liste de Des Musics De la Video MMV</h1>";
    echo "<form method=\"post\" action=\"ListeMusicsParVideo.php\">";
    $listeVideo=$requeteListe->listerVideosMMV();
    echo "<label  class=\"font-weight-bold\" for=\"IDVideoMMV\">Videos : </label><select id=\"IDVideoMMV\" name=\"idVideoMMV\" class=\"w-25\">";
    foreach ($listeVideo as $indice => $ligne) {
        $id_video = $ligne['IDVIDEOMMV'];
        $titre = $ligne['TITREVIDEOMMV'];
        $url = $ligne['URLVIDEOMMV'];
        $date_creation = $ligne['DATECREATIONVIDEOMMV'];
        echo "<option value=$id_video>$titre <->$url<-> $date_creation</option>";
    }echo "</select><br><br><input type=\"submit\" value=\"Afficher les Musics\"></form>";
}else{
    $id_VMMV=htmlentities($_POST['idVideoMMV'], ENT_QUOTES);
    $titre=$requeteListe->getVideoParID($id_VMMV)->TITREVIDEOMMV;
    echo "<h1 class=\"text-center\">Liste de Des Musics De la Video MMV: </h1><h2 class=\"text-center\">$titre</h2>";

    echo "<table class=\"table table-bordered table-striped \">";
    $nbMusic = 0;
    echo "<tr><th>IDMUSIC</th> <th>TITRE MUSIC</th><th>ID ALB/GRP</th></tr>";
    $listeMusics=$requeteListe->listerMusicsDe1VideoMMV($id_VMMV);
    foreach ($listeMusics as $indice => $ligne) {
        $id_music = $ligne['IDMUSIC'];
        $titre = $ligne['TITREMUSIC'];
        $id_alb = $ligne['IDALBGRP'];///////////////////////////////////////

        echo "<tr><td>$id_music</td> <td>$titre</td><td>$id_alb</td></tr>";
        $nbMusic++;
    }
    echo " </table><h3 class=\"text-left\">J'ai $nbMusic Musics pour ma Video</h3>";
}
?>
        </div>
    </section>
</div>
</body>
</html>