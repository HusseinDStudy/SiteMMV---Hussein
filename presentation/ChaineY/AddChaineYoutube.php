<?php
//NOMCHAINEY,URLCHAINEY,SOUSCRIPTIONY
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout de Chaine Youtube</title>
</head>
<?php
require_once '../../navigation.php';
require_once '../../persistance/requiredDialoguesDBS.php';
$requeteAjout = new DialogueBDAddition();
?>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <?php
            echo "<h1 class='text-center'>Ajout de Chaine Youtube</h1>";
            echo "<form method=\"post\" action=\"AddChaineYoutube.php\">";
            echo "<fieldset  class=\" text-center \">";
            if(!isset($_POST['nomChaineY']) && !isset($_POST['urlChaineY']) && !isset($_POST['souscriptionChaineY']) && !isset($_POST['additionChaineYoutube'])){

                echo"<label for='NomChaineY'>Nom Chaine Youtube</label><input type=\"text\" id='NomChaineY' name=\"nomChaineY\" placeholder=\"\" required/>";

                echo"<br><label for='UrlChaineY'>Url Chaine Youtube</label><input type=\"text\" id='UrlChaineY' name=\"urlChaineY\" placeholder=\"\" required/>";

                echo "<br><label for='SouscriptionChaineY'>Souscription Chaine Youtube</label><input type=\"number\" id='SouscriptionChaineY' name=\"souscriptionChaineY\" placeholder=\"+ou-=+\" required/>";

                echo "<br><br><input id=\"AdditionChaineYoutube\" name=\"additionChaineYoutube\" type=\"submit\" value=\"Soumetre\"><br>";
            }
            else{
                if(!isset($nom_alb) && !isset($complet)){


                    $nom_ChaineYoutube=htmlentities($_POST["nomChaineY"], ENT_QUOTES);
                    $url=htmlentities($_POST["urlChaineY"], ENT_QUOTES);
                    $souscription=htmlentities($_POST["souscriptionChaineY"], ENT_QUOTES);

                    if($souscription<0)$souscription=$souscription*-1;

                    try {
                        $requeteAjout->AddChaineYoutube($nom_ChaineYoutube,$url,$souscription);
                        echo "<h3>Requete Fini et Reussit</h3>";
                    }catch (exception $e){
                        echo $e->getMessage();
                    }
                }

            }
            echo "</fieldset>";
            echo"</form>";


            ?>
        </div>
    </section>
</div>
</html>
