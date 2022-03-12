
<!DOCTYPE html>
<html lang="fr">
<?php require_once 'headEtMenuAddVideoMMV.php'; ?>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
<?php
    var_dump($_POST);
    echo "<form method=\"post\" action=\"formAddVideoMMV2.php\">";
    //<form method="post" action=".php">

    echo"<label  class=\"font-weight-bold\" for=\"UrlVideoMMV\">Url Videos MMV: </label>";
    //<label class="font-weight-bold"  for="UrlVideoMMV">Url Videos MMV: </label>
    echo"<input class='w-25' type=\"text\" id=\"UrlVideoMMV\" name=\"urlVideoMMV\" placeholder='' required/><br>";
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

    echo "<h1 class='text-center'>Voulez vous utilisez une chaine existant </h1>";
    //<h1 class='text-center'>Voulez vous utilisez une chaine existant </h1>
    echo "<br><label for='reponse1'>Non je veut crée une nouvelle chaine</label>";
    //<br><label for='reponse1'>Non je veut crée une nouvelle chaine</label>
    echo "<input type=\"radio\" id='reponse1' name=\"question1\" value=\"0\" required/>";
    //<br/><input type="radio" id='reponse1' name="question1" value="O" required/>false

    echo "<br><label for='reponse2'>Oui je veut utiliser une chaine déja déféni</label>";
    //<br><label for='reponse2'>Oui je veut utiliser une chaine déja déféni</label>
    echo "<input type=\"radio\" id='reponse2' name=\"question1\" value=\"1\"/>";
    //<input type="radio" id='reponse2' name="question1" value="1"/>true


    echo "<br><br><input id=\"AdditionVideoMMV\" name=\"additionVideoMMV\" type=\"submit\" value=\"Soumetre\"><br>";
    //<br><br><input id="AdditionVideoMMV" name="additionVideoMMV" type="submit" value="Soumetre"><br>
    echo"</form>";
?>


        </div>
    </section>
</div>
</html>
