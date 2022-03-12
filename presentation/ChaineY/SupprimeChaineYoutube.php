<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suppression de Chaine Youtube</title>
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

            echo "<h1 class='text-center'>Suppression de Chaine Youtube</h1>";
            echo "<form method=\"post\" action=\"SupprimeChaineYoutube.php\">";
            echo "<fieldset  class=\" text-center \">";
            if(!isset($_POST['chaineYoutube']) && !isset($_POST['suppressionChaineYoutube'])) {
                echo "<label  class=\"font-weight-bold\" for=\"ChaineYoutube\">ChaineYoutube a supprimer: </label>";

                echo "<select id=\"ChaineYoutube\" name=\"chaineYoutube\" class=\"w-25\">";
                try {
                    $mesChainesYoutube = $requeteListe->listerChainesYoutube();
                    foreach ($mesChainesYoutube as $indice => $ligne) {
                        $id_ChaineY = $ligne['IDCHAINEY'];
                        $nom_ChaineYoutube = $ligne['NOMCHAINEY'];
                        $url = $ligne['URLCHAINEY'];
                        $souscription = $ligne['SOUSCRIPTIONY'];
                        echo "<option value=$id_ChaineY>$nom_ChaineYoutube<-->$souscription</option>";
                    }
                } catch (Exception $e) {
                    $erreur = $e->getMessage();
                    echo $erreur;
                }
                echo "</select><br>";

                echo "<h1 class='bg-danger text-dark'>Attention la Chaine Youtube Mais aussi ses Videos  et bien sure leur lien avec les Musics seront Supprimer </h1>";
                echo "<h5 class='bg-secondary text-white'>Juste En cas d'utilisation de la Chaine Youtube par des Videos  [Voir liste Videos par Chaine]</h5>";
                echo "<br><br><input id=\"SuppressionChaineYoutube\" name=\"suppressionChaineYoutube\" type=\"submit\" value=\"Soumetre\"><br>";
            }else if(!isset($id_ChaineYoutube)) {
                $id_ChaineYoutube=htmlentities($_POST["chaineYoutube"], ENT_QUOTES);

                try {
                    $requeteSupprimer->SupprimerChaineYoutube($id_ChaineYoutube);
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



