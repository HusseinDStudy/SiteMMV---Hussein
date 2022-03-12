<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Telecharge une Video</title>
</head>
<?php require_once '../../navigation.php';
require_once '../../persistance/requiredDialoguesDBS.php';
?>
<?php $requeteListe = new DialogueBDListe();
$requeteModifie=new DialogueBDModifier();?>
<body>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
<?php
echo "<h1 class='text-center'>Telecharge une Video</h1>";
echo "<form method=\"post\" action=\"../../videos/telechargementVideosYoutube.php\">";
$listeVideo=$requeteListe->listerVideosMMV();
echo "<br><label  class=\"font-weight-bold\" for=\"UrlATelecharger\">Videos A Telecharger: </brlabel><select id=\"UrlATelecharger\" name=\"urlATelecharger\" class=\"w-25\">";
foreach ($listeVideo as $indice => $ligne) {
    $id_video = $ligne['IDVIDEOMMV'];
    $titre_video = $ligne['TITREVIDEOMMV'];
    $url_video = $ligne['URLVIDEOMMV'];
    $date_creation = $ligne['DATECREATIONVIDEOMMV'];
    echo "<option value=$url_video>$titre_video <->$url_video<-> $date_creation</option>";
} echo "</select><br><br><input id=\"Telecharhe\" name=\"telecharhe\" type=\"submit\" value=\"Telecharhe\"><br></form>";


