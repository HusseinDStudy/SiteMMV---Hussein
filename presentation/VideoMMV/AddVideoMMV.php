<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout d'une Video MMV</title>
</head>
<?php
require_once '../../navigation.php';
require_once '../../persistance/requiredDialoguesDBS.php';
$requeteAjout = new DialogueBDAddition();
$requeteListe = new DialogueBDListe(); ?>
?>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
<?php

    echo "<h1 class='text-center'>Ajout d'une Video MMV</h1>";
    echo "<form method=\"post\" action=\"AddVideoMMV.php\">";//<form method="post" action=".php">
    if(!isset($_POST['urlVideoMMV']) && !isset($_POST['titreVideoMMV']) && !isset($_POST['couvertureVideoMMV'])
        && !isset($_POST['dateCreationVideoMMV']) && !isset($_POST['sujetVideoMMV']) && !isset($_POST['likeVideoMMV'])
        && !isset($_POST['dislikeVideoMMV']) && !isset($_POST['vueVideoMMV']) && !isset($_POST['idChaineY']) && !isset($_POST['additionVideoMMV'])) {
        echo "<label  class=\"font-weight-bold\" for=\"UrlVideoMMV\">Url Videos MMV: </label>";
        //<label class="font-weight-bold"  for="UrlVideoMMV">Url Videos MMV: </label>
        echo "<input class='w-25' type=\"text\" id=\"UrlVideoMMV\" name=\"urlVideoMMV\" placeholder='' required/><br>";
        //<input class='w-25' type="text" id="UrlVideoMMV" name="urlVideoMMV" placeholder="" size="11" required/><br>

        echo "<label class=\"font-weight-bold\"  for=\"TitreVideoMMV\">Titre Videos MMV: </label>";
        //<label class="font-weight-bold"  for="TitreVideoMMV">Titre Videos MMV: </label>
        echo "<input class='w-25' type=\"text\" id=\"TitreVideoMMV\" name=\"titreVideoMMV\"  required/><br>";
        //<input class='w-25' type="text" id="TitreVideoMMV" name="titreVideoMMV"  size="11" required/><br>

        echo "<label class=\"font-weight-bold\" for=\"CouvertureVideoMMV\">Couverture: </label>";
        //<label class="font-weight-bold" for="CouvertureVideoMMV">Couverture: </label>
        echo "<input id=\"CouvertureVideoMMV\" name=\"couvertureVideoMMV\" type=\"file\" required><br>";
        //<input id="CouvertureVideoMMV" name="couvertureVideoMMV" type="file" required><br>

        echo "<label class=\"font-weight-bold\" for=\"DateCreationVideoMMV\">Date Creation Video MMV: </label>";
        //<label class="font-weight-bold" for="DateCreationVideoMMV">Date Creation Video MMV: </label>
        echo "<input id=\"DateCreationVideoMMV\" name=\"dateCreationVideoMMV\" type=\"date\" placeholder=\"2018-07-22\" required><br>";
        //<input id="SujetVideoMMV" name="dateCreationVideoMMV" type="date" placeholder="2018-07-22" required><br>

        echo "<label class=\"font-weight-bold\" for=\"SujetVideoMMV\">Sujet Video MMV: </label><br>";
        //<label class="font-weight-bold" for="SujetVideoMMV">Sujet Video MMV: </label><br>
        echo "<textarea id=\"SujetVideoMMV\" name=\"sujetVideoMMV\" rows=\"4\" cols=\"50\"></textarea><br>";
        //<textarea id="SujetVideoMMV" name="sujetVideoMMV" rows="4" cols="50"></textarea><br>

        echo "<label class=\"font-weight-bold\" for=\"LikeVideoMMV\">Aimabilite de la Video MMV: </label>";
        //<label class="font-weight-bold" for="LikeVideoMMV">Aimabilite de la Video MMV: </label>
        echo "<input id=\"LikeVideoMMV\" name=\"likeVideoMMV\" type=\"number\" placeholder=\"+ou-=+\" required><br>";
        //<input id="LikeVideoMMV" name="likeVideoMMV" type="number" placeholder="+ou-=+" required><br>

        echo "<label class=\"font-weight-bold\" for=\"DislikeVideoMMV\">Détestabilité de la Video MMV: </label>";
        //<label class="font-weight-bold" for="DislikeVideoMMV">Détestabilité de la Video MMV: </label>
        echo "<input id=\"DislikeVideoMMV\" name=\"dislikeVideoMMV\" type=\"number\" placeholder=\"+ou-=+\" required><br>";
        //<input id="DislikeVideoMMV" name="dislikeVideoMMV" type="number" placeholder="+ou-=+" required><br>

        //if else + - LikeVideoMMV=0 DisLikeVideoMMV=.... ou ...
        echo "<label class=\"font-weight-bold\" for=\"VueVideoMMV\">Nombre de Vue de la Video MMV: </label>";
        //<label class="font-weight-bold" for="VueVideoMMV">Nombre de Vue de la Video MMV: </label>
        echo "<input class='w-auto' id=\"VueVideoMMV\" name=\"vueVideoMMV\" type=\"number\" placeholder=\"+ou-=+\" required><br>";
        //<input class='w-auto' id="VueVideoMMV" name="vueVideoMMV" type="number" placeholder="+ou-=+" required><br>

        echo "<select id=\"IdChaineY\" name=\"idChaineY\" class=\"w-25\">";
        try {
            $mesChainesYoutube = $requeteListe->listerChainesYoutube();
            foreach ($mesChainesYoutube as $ChaineYoutube) {
                $codeChaineYoutube = $ChaineYoutube['IDCHAINEY'];
                $nomChaineYoutube = $ChaineYoutube['NOMCHAINEY'];
                $urlChaineY = $ChaineYoutube['URLCHAINEY'];
                $souscriptionChaineYoutube = $ChaineYoutube['SOUSCRIPTIONY'];
                echo "<option value=$codeChaineYoutube>$nomChaineYoutube <->$urlChaineY<-> $souscriptionChaineYoutube</option>";
            }
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            echo $erreur;
        }
        echo "</select><br>";
        //<select id="IdChaineY" name="idChaineY" class="w-25"></select><br>


        echo "<br><br><input id=\"AdditionVideoMMV\" name=\"additionVideoMMV\" type=\"submit\" value=\"Soumetre\"><br>";
        //<br><br><input id="AdditionVideoMMV" name="additionVideoMMV" type="submit" value="Soumetre"><br>
    }else if(!isset($url) && !isset($titre) && !isset($couverture) && !isset($dateCreation)
        && !isset($sujet) && !isset($like) && !isset($dislike)
        && !isset($vue) && !isset($id_chaine_youtube)) {

        $url=htmlentities($_POST["urlVideoMMV"], ENT_QUOTES);
        $titre=htmlentities($_POST["titreVideoMMV"], ENT_QUOTES);
        $couverture=htmlentities($_POST["couvertureVideoMMV"], ENT_QUOTES);
        $dateCreation=htmlentities($_POST["dateCreationVideoMMV"], ENT_QUOTES);
        $sujet=htmlentities($_POST["sujetVideoMMV"], ENT_QUOTES);
        $like=htmlentities($_POST["likeVideoMMV"], ENT_QUOTES);
        $dislike=htmlentities($_POST["dislikeVideoMMV"], ENT_QUOTES);
        $vue=htmlentities($_POST["vueVideoMMV"], ENT_QUOTES);
        $id_chaine_youtube=htmlentities($_POST["idChaineY"], ENT_QUOTES);

        if($like<0)$like=$like*-1;
        if($dislike<0)$dislike=$dislike*-1;
        if($vue<0)$vue=$vue*-1;


        try {
            $requeteAjout->AddVideosMMV($url,$titre,$couverture,$dateCreation,$sujet,$like,$dislike,$vue,$id_chaine_youtube);
            echo "<h3>Requete Fini et Reussit</h3>";
        }catch (exception $e){
            echo $e->getMessage()+"<h6>requette Erroner pas fini encore XD</h6>";
        }

    }
    echo"</form>";
?>


        </div>
    </section>
</div>
</html>
