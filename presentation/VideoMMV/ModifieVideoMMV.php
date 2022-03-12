<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification d'une Video MMV</title>
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

            echo "<h1 class='text-center'>Modification d'une Video MMV</h1>";
            echo "<form method=\"post\" action=\"ModifieVideoMMV.php\">";
            echo "<fieldset  class=\" text-center \">";
            if (!isset($_POST['idVideoMMV'])){
                $listeVideo=$requeteListe->listerVideosMMV();
                echo "<select id=\"IDVideoMMV\" name=\"idVideoMMV\" class=\"w-25\">";
                foreach ($listeVideo as $indice => $ligne) {
                    $id_video = $ligne['IDVIDEOMMV'];
                    $titre = $ligne['TITREVIDEOMMV'];
                    $url = $ligne['URLVIDEOMMV'];
                    $date_creation = $ligne['DATECREATIONVIDEOMMV'];
                    echo "<option value=$id_video>$titre <->$url<-> $date_creation</option>";
                } echo "</select><br>";


                echo "<br><br><input id=\"AModifier\" name=\"aModifier\" type=\"submit\" value=\"a Modifier\"><br>";

            }else if(!isset($_POST['urlVideoMMV']) && !isset($_POST['titreVideoMMV']) && !isset($_POST['couvertureVideoMMV'])
                && !isset($_POST['dateCreationVideoMMV']) && !isset($_POST['sujetVideoMMV']) && !isset($_POST['likeVideoMMV'])
                && !isset($_POST['dislikeVideoMMV']) && !isset($_POST['vueVideoMMV']) && !isset($_POST['idChaineY']) && !isset($_POST['modifieVideoMMV'])) {

                $id_videoA_Modifier=htmlentities($_POST['idVideoMMV'], ENT_QUOTES);
                $listeVideo=$requeteListe->listerVideosMMV();
                foreach ($listeVideo as $indice => $ligne) {
                    $id_video = $ligne['IDVIDEOMMV'];
                    if ($id_video==$id_videoA_Modifier){
                        $url=$ligne['URLVIDEOMMV'];
                        $titre=$ligne['TITREVIDEOMMV'];
                        $couverture=$ligne['COUVERTUREVIDEOMMV'];
                        $dateCreation=$ligne['DATECREATIONVIDEOMMV'];
                        $sujet=$ligne['SUJETVIDEOMMV'];
                        $like=$ligne['LIKEVIDEOMMV'];
                        $dislike=$ligne['DISLIKEVIDEOMMV'];
                        $vue=$ligne['VUEVIDEOMMV'];
                        $id_chaine_youtube=$ligne['IDCHAINEY'];
                    }
                }
                echo "<h1>Voici les donné de la video selectionner</h1>";

                echo "<label  class=\"font-weight-bold\" for=\"IdVideoMMV\">Id VideoMMV MMV: </label>";
                echo "<input type=\"text\" id=\"IdVideoMMV\"name=\"idVideoMMV\" value=\"$id_videoA_Modifier\" readonly/>";

                echo "<br><label  class=\"font-weight-bold\" for=\"UrlVideoMMV\">Url Video MMV: </label>";
                echo"<input type=\"text\" id='UrlVideoMMV' name=\"urlVideoMMV\" value=\"$url\" required/>";

                echo "<br><label class=\"font-weight-bold\"  for=\"TitreVideoMMV\">Titre Video MMV: </label>";
                echo "<input type=\"text\" id='TitreVideoMMV' name=\"titreVideoMMV\" value=\"$titre\"  required/>";

                echo "<br><label class=\"font-weight-bold\" for=\"LectureCouvertureVideoMMV\">Couverture Avant: </label>";
                echo "<input type=\"text\" id='LectureCouvertureVideoMMV' name=\"lectureCouvertureVideoMMV\" value=\"$couverture\" readonly/>";
                echo "<br><img   style=\"width: 320px; height: 200px;\" src=\"../../images/couvertures/$couverture\">";

                echo "<br><label class=\"font-weight-bold\" for=\"CouvertureVideoMMV\">Couverture Apres: </label>";
                echo "<input type=\"file\" id='CouvertureVideoMMV' name=\"couvertureVideoMMV\" value=\"$couverture\" required/>";

                /*<p class='text-center'>$couverture</p>
                <a href='../../images/couvertures/$couverture'>

                </a>*/

                echo "<br><label class=\"font-weight-bold\" for=\"DateCreationVideoMMV\">Date Creation Video MMV: </label>";
                echo "<input type=\"date\" id='DateCreationVideoMMV' name=\"dateCreationVideoMMV\" value=\"$dateCreation\"  required/>";

                echo "<br><label class=\"font-weight-bold\" for=\"SujetVideoMMV\">Sujet Video MMV: </label><br>";
                echo "<input type=\"text\" id='SujetVideoMMV' name=\"sujetVideoMMV\" value=\"$sujet\"  required/>";

                echo "<br><label class=\"font-weight-bold\" for=\"LikeVideoMMV\">Aimabilite de la Video MMV: </label>";
                echo "<input type=\"number\" id='LikeVideoMMV' name=\"likeVideoMMV\" value=\"$like\"  required/>";

                echo "<br><label class=\"font-weight-bold\" for=\"DislikeVideoMMV\">Détestabilité de la Video MMV: </label>";
                echo "<input type=\"number\" id='DislikeVideoMMV' name=\"dislikeVideoMMV\" value=\"$dislike\"  required/>";

                echo "<br><label class=\"font-weight-bold\" for=\"VueVideoMMV\">Nombre de Vue de la Video MMV: </label>";
                echo "<input type=\"number\" id='VueVideoMMV' name=\"vueVideoMMV\" value=\"$vue\" required/>";

                echo "<select id=\"IdChaineY\" name=\"idChaineY\" class=\"w-25\">";
                try{
                    $mesChainesYoutube = $requeteListe->listerChainesYoutube();
                    foreach ($mesChainesYoutube as $ChaineYoutube) {
                        $codeChaineYoutube = $ChaineYoutube['IDCHAINEY'];
                        $nomChaineYoutube = $ChaineYoutube['NOMCHAINEY'];
                        $urlChaineY = $ChaineYoutube['URLCHAINEY'];
                        $souscriptionChaineYoutube = $ChaineYoutube['SOUSCRIPTIONY'];
                        echo "<option value=$codeChaineYoutube";
                        if($codeChaineYoutube==$id_chaine_youtube)echo "selected";
                        echo">$nomChaineYoutube <->$urlChaineY<-> $souscriptionChaineYoutube</option>";
                    }
                } catch (Exception $e) {
                    $erreur = $e->getMessage();
                    echo $erreur;
                }
                echo "</select><br>";

                echo "<br><br><input id=\"ModifieVideoMMV\" name=\"modifieVideoMMV\" type=\"submit\" value=\"Modifier\"><br>";
            }else if(!isset($id_VMMV) && !isset($urlVMMV) && !isset($titreVMMV) && !isset($couvertureVMMV) && !isset($dateCreationVMMV)
                && !isset($sujetVMMV) && !isset($likeVMMV) && !isset($dislikeVMMV)
                && !isset($vueVMMV) && !isset($id_chaine_youtubeVMMV)) {
                $id_VMMV=htmlentities($_POST["idVideoMMV"], ENT_QUOTES);
                $urlVMMV=htmlentities($_POST["urlVideoMMV"], ENT_QUOTES);
                $titreVMMV=htmlentities($_POST["titreVideoMMV"], ENT_QUOTES);
                $couvertureVMMV=htmlentities($_POST["couvertureVideoMMV"], ENT_QUOTES);
                $dateCreationVMMV=htmlentities($_POST["dateCreationVideoMMV"], ENT_QUOTES);
                $sujetVMMV=htmlentities($_POST["sujetVideoMMV"], ENT_QUOTES);
                $likeVMMV=htmlentities($_POST["likeVideoMMV"], ENT_QUOTES);
                $dislikeVMMV=htmlentities($_POST["dislikeVideoMMV"], ENT_QUOTES);
                $vueVMMV=htmlentities($_POST["vueVideoMMV"], ENT_QUOTES);
                $id_chaine_youtubeVMMV=htmlentities($_POST["idChaineY"], ENT_QUOTES);

                if($likeVMMV<0)$likeVMMV=$likeVMMV*-1;
                if($dislikeVMMV<0)$dislikeVMMV=$dislikeVMMV*-1;
                if($vueVMMV<0)$vueVMMV=$vueVMMV*-1;


                try {
                    $requeteModifie->ModifierVideoMMV($id_VMMV,$urlVMMV,$titreVMMV,$couvertureVMMV,$dateCreationVMMV,$sujetVMMV,$likeVMMV,$dislikeVMMV,$vueVMMV,$id_chaine_youtubeVMMV);
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

