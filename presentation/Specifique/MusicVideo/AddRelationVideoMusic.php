<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relie  Des Musics a une Videos MMV</title>
</head>
<?php require_once '../../../navigation.php';
require_once '../../../persistance/requiredDialoguesDBS.php';
?>
<?php $requeteListe = new DialogueBDListe();
$requeteAdd=new DialogueBDAddition();?>
<body>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <?php
if (!isset($_POST['idVideoMMV']) && !isset($_POST['aRelier'])){
    echo "<h1 class='text-center'>Relie  Des Musics a une Videos MMV</h1>";
    echo "<form method=\"post\" action=\"AddRelationVideoMusic.php\">";
    $listeVideo=$requeteListe->listerVideosMMV();
    echo "<label  class=\"font-weight-bold\" for=\"IDVideoMMV\">Videos a relier: </label><select id=\"IDVideoMMV\" name=\"idVideoMMV\" class=\"w-25\">";
    foreach ($listeVideo as $indice => $ligne) {
        $id_video = $ligne['IDVIDEOMMV'];
        $titre = $ligne['TITREVIDEOMMV'];
        $url = $ligne['URLVIDEOMMV'];
        $date_creation = $ligne['DATECREATIONVIDEOMMV'];
        echo "<option value=$id_video>$titre <->$url<-> $date_creation</option>";
    } echo "</select><br>";
    echo "<br><br><input id=\"ARelier\" name=\"aRelier\" type=\"submit\" value=\"a Relier\"><br>";
    echo"</form>";
}else if(!isset($id_videoMMV) && !isset($_POST['relier'])){
    $id_videoMMV=htmlentities($_POST['idVideoMMV'], ENT_QUOTES);

    $titre=$requeteListe->getVideoParID($id_videoMMV)->TITREVIDEOMMV;
    echo "<h1 class=\"text-center\">Relie  Des Musics a la Videos MMV: </h1><h2 class=\"text-center\">$titre</h2>";

    echo "<form method=\"post\" action=\"AddRelationVideoMusic.php\">";
    echo "<input type=\"text\" name=\"idVideoMMV\" value='$id_videoMMV' readonly>";
    $listeMusics=$requeteListe->listerMusics();
    echo "<h3>Choisies les Musics qui sont utiliser dans cette Videos MMV</h3>";
    $n=0;
    $test=new DialogueBDTest();
    foreach ($listeMusics as $Musics ){
        $n++;
        $id_music = $Musics['IDMUSIC'];
        $titre = $Musics['TITREMUSIC'];
        $Relationexistante=$test->testRelationMusicVideoMMV($id_music,$id_videoMMV);
        if(!$Relationexistante){//test si la relation existe deja
            echo "<br><label for='reponse$n'>$titre</brlabel>";
            echo "<input type=\"checkbox\" id='reponse$n' name=\"music[]\" value=\"$id_music\"/>";
        }
    }
    echo "<br><br><input id=\"Relier\" name=\"relier\" type=\"submit\" value=\"Relier\"><br>";
    echo"</form>";
}else if(isset($_POST['music']) && isset($_POST['relier'])){
    if(gettype($_POST["music"])!="array")$id_musics=htmlentities($_POST["music"], ENT_QUOTES);
    else $id_musics=$_POST['music'];

    $id_videoMMV=htmlentities($_POST['idVideoMMV'], ENT_QUOTES);

    foreach ($id_musics as $indice=>$id_music){
        $requeteAdd->AddRelationMusicsDe1VideoMMV($id_videoMMV,$id_music);
    }
    echo "Requette Finit";
}else{
    echo "<h1>Vous avez pas additionner des music a la video AUCUNE REQUETE ETAIT FAIT</h1>";
}
?>
        </div>
    </section>
</div>
</body>
</html>

<?php




/*
 $id_videoMMV=htmlentities($_POST['idVideoMMV'], ENT_QUOTES);
$listeMusics=$requeteListe->listerMusicsDe1VideoMMV($id_videoMMV);
echo "<h3>Choisies les Musics qui sont utiliser dans cette Videos MMV</h3>";
$n=0;
foreach ($listeMusics as $Musics ){
    $n++;
    $id_music = $Musics['IDMUSIC'];
    $titre = $Musics['TITREMUSIC'];
    echo "<label for='reponse$n'>$titre</label>";
    echo "<input type=\"radio\" id='reponse$n' name=\"music\" value=\"$id_music\" required/>";
}*/

/* try {
    $listeVideosMMV=$requeteListe->listerVideosMMV();
}catch (exception $e){
    echo $e->getMessage();
}
echo "<h3>Choisies les Chaines qui ont cette musique</h3>";
$n=0;
foreach ($listeVideosMMV as $VideoMMV ){
    $n++;
    $id_Video=$VideoMMV["IDVIDEOMMV"];
    $titre_Video=$VideoMMV["TITREVIDEOMMV"];
    echo "<label for='reponse$n'>$id_Video->   $titre_Video</label>";
    echo "<input type=\"radio\" id='reponse$n' name=\"videosMMV\" value=\"$id_Video\" required/>";
}

try {
    $requeteAjout->AddMusic($nom_music,$alb);
    echo "<h3>Requete Fini et Reussit</h3>";
}catch (exception $e){
    echo $e->getMessage()+"<h6>requette Erroner pas fini encore XD</h6>";
}*/