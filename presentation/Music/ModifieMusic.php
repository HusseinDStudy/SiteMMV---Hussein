<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification d'une Music</title>
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

            echo "<h1 class='text-center'>Modification d'une Music</h1>";
            echo "<form method=\"post\" action=\"ModifieMusic.php\">";
            echo "<fieldset  class=\" text-center \">";
            if (!isset($_POST['idMusic'])){
                $listeMusic=$requeteListe->listerMusics();
                echo "<select id=\"IDMusic\" name=\"idMusic\" class=\"w-25\">";
                foreach ($listeMusic as $indice => $ligne) {
                    $id_music = $ligne['IDMUSIC'];
                    $titre = $ligne['TITREMUSIC'];
                    $id_alb = $ligne['IDALBGRP'];
                    echo "<option value=$id_music>->$titre<->ID ALB: $id_alb</option>";
                } echo "</select><br>";

                echo "<br><br><input id=\"AModifier\" name=\"aModifier\" type=\"submit\" value=\"a Modifier\"><br>";

            }else if(!isset($_POST['titreMusic']) && !isset($_POST['idAlbum'])   && !isset($_POST['modifieMusic'])) {
                $id_musicA_Modifier=htmlentities($_POST['idMusic'], ENT_QUOTES);
                $listeMusic=$requeteListe->listerMusics();
                foreach ($listeMusic as $indice => $ligne) {
                    $id_music = $ligne['IDMUSIC'];
                    if ($id_music==$id_musicA_Modifier){
                        $titre=$ligne['TITREMUSIC'];
                        $id_alb=$ligne['IDALBGRP'];
                    }
                }
                echo "<h1>Voici les donné de la music selectionner</h1>";

                echo "<label  class=\"font-weight-bold\" for=\"IdMusic\">Id Music MMV: </label>";
                echo "<input type=\"number\" id=\"IdMusic\" name=\"idMusic\" value=\"$id_musicA_Modifier\" readonly/>";


                echo "<br><label class=\"font-weight-bold\"  for=\"TitreMusic\">Titre Music: </label>";
                echo "<input type=\"text\" id='TitreMusic' name=\"titreMusic\" value=\"$titre\"  required/>";


                echo "<br><select id=\"IdAlbum\" name=\"idAlbum\" class=\"w-25\">";
                try{
                    $mesAlbums = $requeteListe->listerAlbums();
                    foreach ($mesAlbums as $Album) {
                        $codeAlbum = $Album['IDALBGRP'];
                        $nomAlbum = $Album['NOMALBGRP'];
                        $complet= $Album['COMPLETALBGRP'];
                        echo "<option value=$codeAlbum";
                        if($codeAlbum==$id_alb)echo "selected";
                        echo">$nomAlbum <->Album Complet ou pas?(O/N):$complet</option>";
                    }
                } catch (Exception $e) {
                    $erreur = $e->getMessage();
                    echo $erreur;
                }
                echo "</select><br>";

                echo "<br><br><input id=\"ModifieMusic\" name=\"modifieMusic\" type=\"submit\" value=\"Modifier\"><br>";
            }else if(!isset($id_Music) && !isset($titreMusic) && !isset($id_album_groupe)) {
                $id_Music=htmlentities($_POST["idMusic"], ENT_QUOTES);
                $titreMusic=htmlentities($_POST["titreMusic"], ENT_QUOTES);
                $id_album_groupe=htmlentities($_POST["idAlbum"], ENT_QUOTES);


                try {
                    $requeteModifie->ModifierMusic($id_Music,$titreMusic,$id_album_groupe);
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


