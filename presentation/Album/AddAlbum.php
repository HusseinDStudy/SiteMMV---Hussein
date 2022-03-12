<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout Album</title>
</head>
<?php
require_once '../../navigation.php';
require_once '../../persistance/requiredDialoguesDBS.php';
$requeteAjout = new DialogueBDAddition(); ?>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <?php
            echo "<h1 class='text-center'>Ajout d'Album</h1>";
            echo "<form  method=\"post\" action=\"AddAlbum.php\">";
            if(!isset($_POST['nomAlbum']) && !isset($_POST['question1']) && !isset($_POST['additionAlbum'])){
                echo "<fieldset  class=\" text-center \">";
                echo"<label  class=\"font-weight-bold\" for=\"NomAlbum\">Nom Album: </label>";
                echo"<input class='w-25' type=\"text\" id=\"NomAlbum\" name=\"nomAlbum\" placeholder='' required/><br>";

                echo "<h3 class='text-center'>Votre Album est Complet ou pas ?</h3><h6 class='text-center'>(tous les musique de l'Album ou tous music d'interet sont dans la BDD)</h6>";
                echo "<br><label for='reponse1'>Non</label>";
                echo "<input type=\"radio\" id='reponse1' name=\"question1\" value=\"0\" required/>";
                echo "<br><label for='reponse2'>Oui </label>";
                echo "<input type=\"radio\" id='reponse2' name=\"question1\" value=\"1\"/>";
                echo "<br><input id=\"AdditionAlbum\" name=\"additionAlbum\" type=\"submit\" value=\"Soumetre\">";
                echo "</fieldset>";



            }
            else if(!isset($nom_alb) && !isset($complet)){
                $nom_alb=htmlentities($_POST["nomAlbum"], ENT_QUOTES);
                $complet=htmlentities($_POST["question1"], ENT_QUOTES);
                //if($complet=="N")$complet=0;
                //if($complet=="O")$complet=1;
                try {
                    $requeteAjout->AddAlbum($nom_alb,$complet);
                    echo "<h3>Requete Fini et Reussit</h3>";
                }catch (exception $e){
                    echo $e->getMessage();
                }
            }
            echo"</form>";
            ?>
        </div>
    </section>
</div>
</html>
