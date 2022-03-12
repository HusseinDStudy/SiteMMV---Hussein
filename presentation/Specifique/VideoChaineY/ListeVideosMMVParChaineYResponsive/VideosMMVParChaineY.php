<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php
require_once '../../../../persistance/requiredDialoguesDBS.php';
$requeteListe= new DialogueBDListe();
$id_VMMV=$_GET['idChaineY'];
$titre=$requeteListe->getChaineYParID($id_VMMV)->NOMCHAINEY;
echo "<h1 class=\"text-center\">Liste Des Videos MMV De la Chaine Youtube: </h1><h2 class=\"text-center\">$titre</h2>";

echo "<table class=\"table table-bordered table-striped \">";
$nbVideos = 0;
echo "<tr><th>ID</th> <th>TITRE</th><th>URL</th><th>DATE CREATION</th><th>SUJET</th>
    <th ><p class=\"fa fa-thumbs-up\"></p></th><th><p class=\"fa fa-thumbs-down\"></p></th><th>VUES</th><th>COUVERTURE</th><th>IDCHAINEY</th></tr>";
$listeVideos=$requeteListe->listerVideosMMVDe1ChaineY($id_VMMV);
foreach ($listeVideos as $indice => $ligne) {
$id_video = $ligne['IDVIDEOMMV'];
$titre = $ligne['TITREVIDEOMMV'];
$url = $ligne['URLVIDEOMMV'];
$date_creation = $ligne['DATECREATIONVIDEOMMV'];
$sujet = $ligne['SUJETVIDEOMMV'];
$like=$ligne['LIKEVIDEOMMV'];
$dislike=$ligne['DISLIKEVIDEOMMV'];
$vue=$ligne['VUEVIDEOMMV'];
$couverture=$ligne['COUVERTUREVIDEOMMV'];
$id_chaine_youtube = $ligne['IDCHAINEY'];///////////////////////////////////////Requete dd Nom Chaine par ID

echo "<tr><td>$id_video</td> <td>$titre</td> <td><a href='$url'>$url</a></td><td>$date_creation</td><td>$sujet</td><td>$like</td><td>$dislike</td><td>$vue</td>
    <td>
        <p class='text-center'>$couverture</p>
        <a href='../../../../images/couvertures/$couverture'>
            <img   class='img-fluid ' src=\"../../../../images/couvertures/$couverture\">
        </a>
    </td>
    <td>$id_chaine_youtube</td></tr>";
$nbVideos++;
}
echo " </table><h3 class=\"text-left\">J'ai $nbVideos Videos dans la Chaine Youtube</h3>";
