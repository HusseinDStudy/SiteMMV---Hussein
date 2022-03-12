<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification d'un Album</title>
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

            echo "<h1 class='text-center'>Modification d'un Album</h1>";
            echo "<form method=\"post\" action=\"ModifieAlbum.php\">";
            echo "<fieldset  class=\" text-center \">";
            if (!isset($_POST['idAlbum'])){
                $listeAlbum=$requeteListe->listerAlbums();
                echo "<select id=\"IDAlbum\" name=\"idAlbum\" class=\"w-25\">";
                foreach ($listeAlbum as $indice => $ligne) {
                    $id_Album = $ligne['IDALBGRP'];
                    $titre = $ligne['NOMALBGRP'];
                    $complet = $ligne['COMPLETALBGRP'];
                    echo "<option value=$id_Album>$id_Album->$titre<->Album Complet ou pas?(O/N): $complet</option>";
                } echo "</select><br>";


                echo "<br><br><input id=\"AModifier\" name=\"aModifier\" type=\"submit\" value=\"a Modifier\"><br>";echo "</fieldset>";

            }else if(!isset($_POST['titreAlbum']) && !isset($_POST['complet'])   && !isset($_POST['modifieAlbum'])) {

                $id_AlbumA_Modifier=htmlentities($_POST['idAlbum'], ENT_QUOTES);
                $listeAlbum=$requeteListe->listerAlbums();
                foreach ($listeAlbum as $indice => $ligne) {
                    $id_Album = $ligne['IDALBGRP'];
                    if ($id_Album==$id_AlbumA_Modifier){
                        $titre=$ligne['NOMALBGRP'];
                        $complet=$ligne['COMPLETALBGRP'];
                    }
                }
                echo "<h1>Voici les donné de l'Album selectionner</h1>";

                echo "<label  class=\"font-weight-bold\" for=\"IdAlbum\">Id Album : </label>";
                echo "<input type=\"number\" id=\"IdAlbum\"name=\"idAlbum\" value=\"$id_AlbumA_Modifier\" readonly/>";


                echo "<br><label class=\"font-weight-bold\"  for=\"TitreAlbum\">Titre Album: </label>";
                echo "<input type=\"text\" id='TitreAlbum' name=\"titreAlbum\" value=\"$titre\"  required/>";

                echo "<h3 class='text-center'>Votre Album est Complet ou pas ?</h3><h6 class='text-center'>(tous les musique de l'Album ou tous music d'interet sont dans la BDD)</h6>";

                echo "<br><label for='reponse1'>Non</label>";
                echo "<input type=\"radio\" id='reponse1' name=\"question1\" value=\"0\" required ";
                if($complet==0)echo " checked";
                echo "/>";

                echo "<br><label for='reponse2'>Oui </label>";
                echo "<input type=\"radio\" id='reponse2' name=\"question1\" value=\"1\"";
                if($complet==1)echo " checked";
                echo "/>";

                echo "<br><br><input id=\"ModifieAlbum\" name=\"modifieAlbum\" type=\"submit\" value=\"Modifier\"><br>";
            }else if(!isset($id_Album) && !isset($titreAlbum) && !isset($albumComplet)) {
                $id_Album=htmlentities($_POST["idAlbum"], ENT_QUOTES);
                $titreAlbum=htmlentities($_POST["titreAlbum"], ENT_QUOTES);
                $albumComplet=htmlentities($_POST["question1"], ENT_QUOTES);

                try {
                    $requeteModifie->ModifierAlbum($id_Album,$titreAlbum,$albumComplet);
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



