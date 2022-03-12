<!DOCTYPE html>
<html lang="fr">
<?php require_once 'headEtMenuAddVideoMMV.php';

require_once '../../persistance/DialogueBD.php';?>
<?php $requeteListe = new DialogueBDListe();?>

<div class="container">
    <section class="row">
        <div class="col-sm-12">

<?php
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

    //pour la chaineY
    echo "<br><br><input id=\"AdditionChaineIDMMV\" name=\"additionChaineIDMMV\" type=\"submit\" value=\"Soumetre\"><br>";
    echo"</form>";

?>

        </div>
    </section>
</div>
</html>