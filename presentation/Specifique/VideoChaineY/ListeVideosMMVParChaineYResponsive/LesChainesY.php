<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php
require_once '../../../../persistance/requiredDialoguesDBS.php';
$requeteListe = new DialogueBDListe();

    echo "<h1 class=\"text-center\">Chaine Youtube </h1>";
    echo "<form method=\"get\" action='VideosMMVParChaineY.php'>";
    echo "<label  class=\"font-weight-bold\" for=\"IDChaineY\">ChaineYs : </label><select id=\"IDChaineY\" name=\"idChaineY\" class=\"w-25\">";
    $listeChainesYoutube = $requeteListe->listerChainesYoutube();
    foreach ($listeChainesYoutube as $indice => $ligne) {
        $id_ChaineYoutube = $ligne['IDCHAINEY'];
        $nom_ChaineYoutube = $ligne['NOMCHAINEY'];
        $url = $ligne['URLCHAINEY'];
        $souscription = $ligne['SOUSCRIPTIONY'];
        echo "<option value=$id_ChaineYoutube>$nom_ChaineYoutube<-> $url <->$souscription</option>";
    }
    echo "</select></form>";
