<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste de mes Albums </title>
</head>
<?php require_once '../../navigation.php';
require_once '../../persistance/requiredDialoguesDBS.php';
?>
<?php $requeteListe = new DialogueBDListe();?>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Liste de mes Albums </h1>
            <table class="table table-bordered table-striped ">
                <?php
                $nbAlbum = 0;
                echo "<tr><th>id Album/Groupe</th> <th>Titre</th><th>COMPLET OU PAS</th></tr>";

                $listeAlbums=$requeteListe->listerAlbums();
                //var_dump($listeAlbums[0]);
                foreach ($listeAlbums as $indice => $ligne) {
                    $id_Album = $ligne['IDALBGRP'];
                    $titre = $ligne['NOMALBGRP'];
                    $complet = $ligne['COMPLETALBGRP'];///////////////////////////////////////

                    echo "<tr><td>$id_Album</td> <td>$titre</td><td> $complet</td></tr>";
                    $nbAlbum++;
                }
                ?>
            </table>
            <?php echo "<h3 class=\"text-left\">J'ai $nbAlbum Albums dans ma BDD</h3>";?>
        </div>
    </section>
</div>
</html>
