<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification d'une Relation Music / Video</title>
</head>
<?php require_once '../../../../navigation.php';
require_once '../../../../persistance/requiredDialoguesDBS.php';
?>
<?php $requeteListe = new DialogueBDListe();
$requeteModifie=new DialogueBDModifier();?>
<body>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <?php
            if (!isset($_POST['idVideoMMV']) ){
                echo "<h1 class='text-center'>Modification d'une Relation Music / Video</h1>";
                echo "<form method=\"post\" action=\"ModifieRelationVideoMusic.php\">";
                $listeVideo=$requeteListe->listerVideosMMV();
                echo "<label  class=\"font-weight-bold\" for=\"IDVideoMMV\">Video a relier: </label><select id=\"IDVideoMMV\" name=\"idVideoMMV\" class=\"w-25\">";
                foreach ($listeVideo as $indice => $ligne) {
                    $id_video = $ligne['IDVIDEOMMV'];
                    $titre = $ligne['TITREVIDEOMMV'];
                    $url = $ligne['URLVIDEOMMV'];
                    $date_creation = $ligne['DATECREATIONVIDEOMMV'];
                    echo "<option value=$id_video>$titre <->$url<-> $date_creation</option>";
                } echo "</select><br>";
                echo "<br><br><input id=\"ARelier\" name=\"aRelier\" type=\"submit\" value=\"a Relier\"><br>";
                echo"</form>";
            }
            else if(isset($_POST['idVideoMMV']) && !isset($_POST['idMusic']) && !isset($id_videoMMV) ){
                $id_videoMMV=htmlentities($_POST['idVideoMMV'], ENT_QUOTES);

                $titre=$requeteListe->getVideoParID($id_videoMMV)->TITREVIDEOMMV;
                echo "<h1 class=\"text-center\">Modification d'une Relation Music / Video: </h1><h2 class=\"text-center\">$titre</h2>";
                echo "<form method=\"post\" action=\"ModifieRelationVideoMusic.php\">";
                echo "<input type=\"text\" name=\"idVideoMMV\" value='$id_videoMMV' readonly>";
                $listeMusics=$requeteListe->listerMusics();
                echo "<label  class=\"font-weight-bold\" for=\"IDMusic\">Music a relier: </label><select id=\"IDMusic\" name=\"idMusic\" class=\"w-25\">";
                try {
                    $mesMusics = $requeteListe->listerMusicsDe1VideoMMV($id_videoMMV);
                    foreach ($mesMusics as $Music) {
                        $code = $Music['IDMUSIC'];
                        $titre = $Music['TITREMUSIC'];
                        $alb = $Music['IDALBGRP'];
                        echo "<option value=$code>$titre <->Alb:$alb</option>";
                    }
                } catch (Exception $e) {
                    $erreur = $e->getMessage();
                    echo $erreur;
                }
                echo "</select><br><br><input id=\"Relier\" name=\"relier\" type=\"submit\" value=\"Relier\"><br>";
                echo"</form>";
            }
            else if( isset($_POST['idVideoMMV']) && isset($_POST['idMusic']) && !isset($_POST['idVideoMMVNew']) && !isset($_POST['idMusicNew']) ){
                $id_musics=htmlentities($_POST["idMusic"], ENT_QUOTES);
                $id_videoMMV=htmlentities($_POST['idVideoMMV'], ENT_QUOTES);
                echo "<form method=\"post\" action=\"ModifieRelationVideoMusic.php\">";
                echo "<br><label  class=\"font-weight-bold\" for=\"IDVideoMMV\">ID Video MMV: </label><input id=\"IDVideoMMV\" name=\"idVideoMMV\" type=\"text\" value=\"$id_videoMMV\" readonly>";
                echo "<br><label  class=\"font-weight-bold\" for=\"IDMusic\">ID Misic: </label><input id=\"IDMusic\" name=\"idMusic\" type=\"text\" value=\"$id_musics\" readonly>";
                $listeVideoNew=$requeteListe->listerVideosMMV();
                echo "<br><label  class=\"font-weight-bold\" for=\"IDVideoMMVNEW\">Videos Nouveu: </brlabel><select id=\"IDVideoMMVNEW\" name=\"idVideoMMVNew\" class=\"w-25\">";
                foreach ($listeVideoNew as $indice => $ligne) {
                    $id_video = $ligne['IDVIDEOMMV'];
                    $titre_video = $ligne['TITREVIDEOMMV'];
                    $url_video = $ligne['URLVIDEOMMV'];
                    $date_creation = $ligne['DATECREATIONVIDEOMMV'];
                    echo "<option value=$id_video>$titre_video <->$url_video<-> $date_creation</option>";
                } echo "</select><br>";

                $listeMusicNew=$requeteListe->listerMusics();
                echo "<label  class=\"font-weight-bold\" for=\"IDMusicNEW\"> Music Nouveu: </label><select id=\"IDMusicNEW\" name=\"idMusicNew\" class=\"w-25\">";
                foreach ($listeMusicNew as $indice => $ligne) {
                    $id_music = $ligne['IDMUSIC'];
                    $titre_music = $ligne['TITREMUSIC'];
                    $alb_music = $ligne['IDALBGRP'];
                    echo "<option value=$id_music>$titre_music <->Alb: $alb_music</option>";
                } echo "</select><br><input id=\"Relier1\" name=\"relier1\" type=\"submit\" value=\"Relier1\"><br></form>";
            }
            else if (isset($_POST['idVideoMMVNew']) && isset($_POST['idMusicNew'])){
                $id_video_new=htmlentities($_POST["idVideoMMVNew"], ENT_QUOTES);
                $id_music_new=htmlentities($_POST["idMusicNew"], ENT_QUOTES);
                $id_video_vieu=htmlentities($_POST["idVideoMMV"], ENT_QUOTES);
                $id_music_vieu=htmlentities($_POST["idMusic"], ENT_QUOTES);
                try {
                    $requeteModifie->ModifierRelationVideoMusic($id_video_vieu,$id_music_vieu,$id_video_new,$id_music_new);
                    echo "<h1>REQUETE MODIFICATION FAIT</h1>";
                }catch (exception $e){
                    echo $e->getMessage();
                    echo "<h1>Vous avez pas additionner des music a la video AUCUNE REQUETE ETAIT FAIT</h1>";
                }
            }
            ?>
        </div>
    </section>
</div>
</body>
</html>
