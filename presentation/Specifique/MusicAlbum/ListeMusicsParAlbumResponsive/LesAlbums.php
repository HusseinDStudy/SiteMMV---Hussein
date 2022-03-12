
<?php
require_once '../../../../persistance/requiredDialoguesDBS.php';
?>
<?php $requeteListe = new DialogueBDListe();?>
<?php
echo "<h1 class=\"text-center\">Liste Des Musics D'un Album </h1>";
echo "<form method=\"get\" action=\"MusicsParAlbum.php\">";
    $listeAlbum=$requeteListe->listerAlbums();
    echo "<label  class=\"font-weight-bold\" for=\"IDAlbum\">Albums : </label><select id=\"IDAlbum\" name=\"idAlbum\" class=\"w-25\">";
        foreach ($listeAlbum as $indice => $ligne) {
        $id_Album = $ligne['IDALBGRP'];
        $titre = $ligne['NOMALBGRP'];
        $complet = $ligne['COMPLETALBGRP'];
        echo "<option value=$id_Album>$titre <->$complet</option>";
        }echo "</select><br></form>";
