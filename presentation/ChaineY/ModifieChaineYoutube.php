<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification d'une Chaine Youtube</title>
</head>
<?php
require_once '../../navigation.php';
require_once '../../persistance/requiredDialoguesDBS.php';
$requeteModifie = new DialogueBDModifier();
$requeteListe = new DialogueBDListe(); ?>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <?php

            echo "<h1 class='text-center'>Modification d'une Chaine Youtube</h1>";
            echo "<form method=\"post\" action=\"ModifieChaineYoutube.php\">";
            echo "<fieldset  class=\" text-center \">";
            if (!isset($_POST['idChaineYoutube']) ){
                $listeChaineYoutube=$requeteListe->listerChainesYoutube();
                echo "<select id=\"IDChaineYoutube\" name=\"idChaineYoutube\" class=\"w-25\">";
                foreach ($listeChaineYoutube as $indice => $ligne) {
                    $id_ChaineY = $ligne['IDCHAINEY'];
                    $nom_ChaineYoutube = $ligne['NOMCHAINEY'];
                    $url = $ligne['URLCHAINEY'];
                    $souscription = $ligne['SOUSCRIPTIONY'];
                    echo "<option value=$id_ChaineY>$nom_ChaineYoutube<-->$souscription</option>";
                } echo "</select><br>";


                echo "<br><br><input id=\"AModifier\" name=\"aModifier\" type=\"submit\" value=\"a Modifier\"><br>";

            }else if(!isset($_POST['titreChaineYoutube'])&& !isset($_POST['urlChaineYoutub']) && !isset($_POST['souscription'])   && !isset($_POST['modifieChaineYoutube'])) {
                $id_ChaineYoutubeA_Modifier=htmlentities($_POST['idChaineYoutube'], ENT_QUOTES);
                $listeChaineYoutube=$requeteListe->listerChainesYoutube();
                foreach ($listeChaineYoutube as $indice => $ligne) {
                    $id_ChaineYoutube = $ligne['IDCHAINEY'];
                    if ($id_ChaineYoutube==$id_ChaineYoutubeA_Modifier){
                        $nom_ChaineYoutube = $ligne['NOMCHAINEY'];
                        $url = $ligne['URLCHAINEY'];
                        $souscription = $ligne['SOUSCRIPTIONY'];
                    }
                }
                echo "<h1>Voici les donné de l'ChaineYoutube selectionner</h1>";

                echo "<label  class=\"font-weight-bold\" for=\"IdChaineYoutube\">Id ChaineYoutube : </label>";
                echo "<input type=\"number\" id=\"IdChaineYoutube\"name=\"idChaineYoutube\" value=\"$id_ChaineYoutubeA_Modifier\" readonly/>";


                echo "<br><label class=\"font-weight-bold\"  for=\"TitreChaineYoutube\">Titre ChaineYoutube: </label>";
                echo "<input type=\"text\" id='TitreChaineYoutube' name=\"titreChaineYoutube\" value=\"$nom_ChaineYoutube\"  required/>";

                echo "<br><label class=\"font-weight-bold\"  for=\"UrlChaineYoutube\">Url ChaineYoutube: </label>";
                echo "<input type=\"text\" id='UrlChaineYoutube' name=\"urlChaineYoutube\" value=\"$url\"  required/>";

                echo "<br><label class=\"font-weight-bold\"  for=\"Souscription\">Souscription ChaineYoutube: </label>";
                echo "<input type=\"number\" id='Souscription' name=\"souscription\" value=\"$souscription\"  required/>";

                echo "<br><br><input id=\"ModifieChaineYoutube\" name=\"modifieChaineYoutube\" type=\"submit\" value=\"Modifier\"><br>";
            }else if(!isset($id_ChaineYoutube) && !isset($titreChaineYoutube) && !isset($souscriptionChaineYoutube)) {
                $id_ChaineYoutube=htmlentities($_POST["idChaineYoutube"], ENT_QUOTES);
                $titreChaineYoutube=htmlentities($_POST["titreChaineYoutube"], ENT_QUOTES);
                $urlChaineYoutube=htmlentities($_POST["urlChaineYoutube"], ENT_QUOTES);
                $souscriptionChaineYoutube=htmlentities($_POST["souscription"], ENT_QUOTES);

                if($souscriptionChaineYoutube<0)$souscriptionChaineYoutube=$souscriptionChaineYoutube*-1;

                try {
                    $requeteModifie->ModifierChaineYoutube($id_ChaineYoutube,$titreChaineYoutube,$urlChaineYoutube,$souscriptionChaineYoutube);
                    echo "<h3>Requete Fini et Reussit</h3>";
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




