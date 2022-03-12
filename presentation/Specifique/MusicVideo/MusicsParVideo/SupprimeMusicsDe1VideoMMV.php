<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suppression de musiques d'une Video MMV</title>
</head>
<?php
require_once '../../../../navigation.php';
require_once '../../../../persistance/requiredDialoguesDBS.php';
$requeteSupprimer = new DialogueBDSupprimer();
$requeteListe = new DialogueBDListe(); ?>

<body>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <?php

            echo "<h1 class='text-center'>Suppression de musiques d'une Video MMV</h1>";
            if(!isset($_POST['videoMMV']) && !isset($_POST['aSupprimerRelationVideoMusic'])) {
                echo "<form method=\"post\" action=\"SupprimeMusicsDe1VideoMMV.php\">";
                echo "<label  class=\"font-weight-bold\" for=\"VideoMMV\">Videos a supprimer: </label>";

                echo "<select id=\"VideoMMV\" name=\"videoMMV\" class=\"w-25\">";
                try {
                    $mesVideosMMV = $requeteListe->listerVideosMMV();
                    foreach ($mesVideosMMV as $VideoMMV) {
                        $codeVideoMMV = $VideoMMV['IDVIDEOMMV'];
                        $titreVideoMMV = $VideoMMV['TITREVIDEOMMV'];
                        $urlVideoMMV = $VideoMMV['URLVIDEOMMV'];
                        echo "<option value=$codeVideoMMV>$titreVideoMMV <->$urlVideoMMV</option>";
                    }
                } catch (Exception $e) {
                    $erreur = $e->getMessage();
                    echo $erreur;
                }
                echo "</select><br>";


                echo "<br><br><input id=\"ASupprimerRelationVideoMusic\" name=\"aSupprimerRelationVideoMusic\" type=\"submit\" value=\"Relation Video/Music a Supprimer\"><br>";
                echo"</form>";
            }else if(isset($_POST['videoMMV'])){
                if(isset($_POST['aSupprimerRelationVideoMusic'])){
                    echo "<form method=\"post\" action=\"SupprimeMusicsDe1VideoMMV.php\">";

                    $id_videoMMV=htmlentities($_POST['videoMMV'], ENT_QUOTES);
                    echo "<br><label  class=\"font-weight-bold\" for=\"VideoMMV\">ID Video MMV: </label><input id=\"VideoMMV\" name=\"videoMMV\" type=\"text\" value=\"$id_videoMMV\" readonly>";

                    echo "<br><label  class=\"font-weight-bold\" for=\"VideoMMV\">Musics a supprimer: </label>";
                    echo "<table  class=\"table table-bordered table-striped \" >";
                    echo "<tr><th>IDMUSIC</th> <th>TITRE MUSIC</th><th>ID ALB/GRP</th></tr>";
                    $StringMusic="";
                    try {
                        $mesMusics = $requeteListe->listerMusicsDe1VideoMMV($id_videoMMV);
                        foreach ($mesMusics as $Music) {
                            $code = $Music['IDMUSIC'];
                            $titre = $Music['TITREMUSIC'];
                            $alb = $Music['IDALBGRP'];
                            echo "<tr><td>$code</td><td>$titre</td><td>$alb</td></tr>";
                            $StringMusic .= $code.",";
                        }
                    } catch (Exception $e) {
                        $erreur = $e->getMessage();
                        echo $erreur;
                    }
                    echo "</table>><br>";

                    echo "<input id=\"Music\" name=\"music\" type=\"text\" value=\"$StringMusic\" readonly>";
                    echo "<br><br><input id=\"SupprimerRelationVideoMusic\" name=\"supprimerRelationVideoMusic\" type=\"submit\" value=\"supprimer Relation VideoMusic\"><br>";
                    echo"</form>";
                }else if(isset($_POST['supprimerRelationVideoMusic'])){
                    $mesMusics=htmlentities($_POST['music'], ENT_QUOTES);
                    $id_videoMMV=htmlentities($_POST['videoMMV'], ENT_QUOTES);
                    try {
                        $requeteSupprimer->SupprimerMusicsDe1VideoMMV($id_videoMMV);
                    }catch (exception $e){
                        echo $e->getMessage();
                    }
                }
            }else echo "<h3>Requete de Suppression Fini et Reussit</h3>";

            ?>


        </div>
    </section>
</div>
</body>
</html>