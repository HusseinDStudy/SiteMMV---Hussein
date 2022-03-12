<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suppression de Musique</title>
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

            echo "<h1 class='text-center'>Suppression de Musique</h1>";
            echo "<form method=\"post\" action=\"SupprimeMusic.php\">";
            echo "<fieldset  class=\" text-center \">";
            if(!isset($_POST['music']) && !isset($_POST['suppressionMusic'])) {
                echo "<label  class=\"font-weight-bold\" for=\"Music\">Music a supprimer: </label>";

                echo "<select id=\"Music\" name=\"music\" class=\"w-25\">";
                try {
                    $mesMusicMMV = $requeteListe->listerMusics();
                    foreach ($mesMusicMMV as $Music) {
                        $codeMusic = $Music['IDMUSIC'];
                        $titreMusic = $Music['TITREMUSIC'];
                        $alb_Music = $Music['IDALBGRP'];/////////////////////////////
                        echo "<option value=$codeMusic>$titreMusic</option>";
                    }
                } catch (Exception $e) {
                    $erreur = $e->getMessage();
                    echo $erreur;
                }
                echo "</select><br>";


                echo "<br><br><input id=\"SuppressionMusic\" name=\"suppressionMusic\" type=\"submit\" value=\"Soumetre\"><br>";
            }else if(!isset($id_Music)) {
                $id_Music=htmlentities($_POST["music"], ENT_QUOTES);
                try {
                    $requeteSupprimer->SupprimerMusic($id_Music);
                    echo "<h3>Requete de Suppression Fini et Reussit</h3>";
                }catch (exception $e){
                    echo $e->getMessage();
                }

            }

            echo "</fieldset>";
            echo"</form>";
            ?>


        </div>
    </section>
</div>
</html>

