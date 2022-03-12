<?php
require_once '../../../../persistance/requiredDialoguesDBS.php';
?>
<?php $requeteListe = new DialogueBDListe();?>
<?php
$id_VMMV=htmlentities($_GET['idAlbum'], ENT_QUOTES);
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