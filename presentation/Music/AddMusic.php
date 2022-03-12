<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout Musique</title>
</head>
<?php
require_once '../../navigation.php';
require_once '../../persistance/requiredDialoguesDBS.php';
$requeteAjout = new DialogueBDAddition();
$requeteListe = new DialogueBDListe();
?>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <?php
            echo "<h1 class='text-center'>Ajout Musique</h1>";
            echo "<form method=\"post\" action=\"AddMusic.php\">";
            echo "<fieldset  class=\" text-center \">";
            if(!isset($_POST['titreMusic']) && !isset($_POST['album']) && !isset($_POST['additionMusic'])){

                echo"<label  class=\"font-weight-bold\" for=\"TitreMusic\">Titre Music: </label>";
                echo"<input class='w-25' type=\"text\" id=\"TitreMusic\" name=\"titreMusic\" placeholder='' required/><br>";


                try {
                    $listeAlbum=$requeteListe->listerAlbums();
                }catch (exception $e){
                    echo $e->getMessage();
                }

                echo "<h3>Choisies l'Album au quelle cette musique appartient</h3>";
                echo "<label for=\"champAlbum\">Album : - </label><select name=\"album\" id=\"champAlbum\">";
                foreach ($listeAlbum as $Album ){
                    $id_alb=htmlentities($Album["IDALBGRP"], ENT_QUOTES);
                    $nom_alb=htmlentities( $Album["NOMALBGRP"], ENT_QUOTES);
                    echo "<option value=$id_alb>$id_alb $nom_alb</option>";
                }
                echo"</select>";


                echo "<br><br><input id=\"AdditionMusic\" name=\"additionMusic\" type=\"submit\" value=\"Soumetre\"><br>";
            }
            else if(!isset($nom_music) && !isset($alb)){
                $nom_music=htmlentities($_POST["titreMusic"], ENT_QUOTES);
                $alb=htmlentities($_POST["album"], ENT_QUOTES);

                try {
                    $requeteAjout->AddMusic($nom_music,$alb);
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


<?php
