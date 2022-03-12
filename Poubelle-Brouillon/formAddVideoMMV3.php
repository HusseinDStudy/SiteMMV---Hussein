<!DOCTYPE html>
<html lang="fr">
<?php require_once 'headEtMenuAddVideoMMV.php';
require_once '../../persistance/DialogueBD.php';?>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
        <?php
                var_dump($_POST);
                echo ">";
                $url=$_POST['urlVideoMMV'];
                $titre=$_POST['titreVideoMMV'];
                $couverture=$_POST['couvertureVideoMMV'];
                $dateCreation=$_POST['dateCreationVideoMMV'];
                $sujet=$_POST['sujetVideoMMV'];
                if($_POST['likeVideoMMV']<0)$like=-1*$_POST['likeVideoMMV'];
                else $like=$_POST['likeVideoMMV'];
                if($_POST['dislikeVideoMMV']<0)$dislike=-1*$_POST['dislikeVideoMMV'];
                else $dislike=$_POST['dislikeVideoMMV'];
                if($_POST['vueVideoMMV']<0)$vue=-1*$_POST['vueVideoMMV'];
                else $vue=$_POST['vueVideoMMV'];
                $question1=$_POST['question1'];

                echo"<input type=\"text\" name=\"urlVideoMMV\" value=\"$url\" hidden/>";
                echo "<input type=\"text\" name=\"titreVideoMMV\" value=\"$titre\"  hidden/>";
                echo "<input type=\"text\" name=\"couvertureVideoMMV\" value=\"$couverture\" hidden/>";
                echo "<input type=\"date\" name=\"dateCreationVideoMMV\" value=\"$dateCreation\"  hidden/>";
                echo "<input type=\"text\" name=\"sujetVideoMMV\" value=\"$sujet\"  hidden/>";
                echo "<input type=\"number\" name=\"likeVideoMMV\" value=\"$like\"  hidden/>";
                echo "<input type=\"number\" name=\"dislikeVideoMMV\" value=\"$dislike\"  hidden/>";
                echo "<input type=\"number\" name=\"vueVideoMMV\" value=\"$vue\" hidden/>";
                echo "<input type=\"text\" name=\"question1\" value=\"$question1\" hidden/>";

                if($question1=="0"){
                    //NOMCHAINEY,URLCHAINEY,SOUSCRIPTIONY,IDCHAINEF,IDCHAINET,IDCHAINEI,IDSITEWEB
                    $NomChaineY=$_POST['nomChaineY'];
                    $UrlChaineY=$_POST['urlChaineY'];
                    $SouscriptionChaineY=$_POST['souscriptionChaineY'];
                    echo"<input type=\"text\" id='NomChaineY' name=\"nomChaineY\" value='$NomChaineY' hidden/>";
                    echo"<input type=\"text\" id='UrlChaineY' name=\"urlChaineY\" value='$UrlChaineY' hidden/>";
                    echo "<input type=\"number\" id='SouscriptionChaineY' name=\"souscriptionChaineY\" value=\"$SouscriptionChaineY\" hidden/>";
                }else if($question1=="1"){
                    $IdChaineY=$_POST['idChaineY'];
                    echo"<input type=\"text\" id='IdChaineY' name=\"idChaineY\" value='$IdChaineY' hidden/>";
                }
                echo "<br><br><input id=\"AdditionChaineIDMMV\" name=\"additionChaineIDMMV\" type=\"submit\" value=\"Soumetre\"><br>";
                echo"</form>";


        ?>
        </div>
    </section>
</div>
</html>
