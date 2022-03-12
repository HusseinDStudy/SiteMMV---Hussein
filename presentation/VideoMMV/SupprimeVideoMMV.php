<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suppression d'une Video MMV</title>
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

            echo "<h1 class='text-center'>Suppression d'une Video MMV</h1>";
            echo "<form method=\"post\" action=\"SupprimeVideoMMV.php\">";
            echo "<fieldset  class=\" text-center \">";
            if(!isset($_POST['videoMMV']) && !isset($_POST['suppressionVideoMMV'])) {
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


                echo "<br><br><input id=\"SuppressionVideoMMV\" name=\"suppressionVideoMMV\" type=\"submit\" value=\"Soumetre\"><br>";
            }else if(!isset($id_videoMMV)) {

                $id_videoMMV=htmlentities($_POST["videoMMV"], ENT_QUOTES);
                try {
                    $requeteSupprimer->SupprimerVideoMMV($id_videoMMV);
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
