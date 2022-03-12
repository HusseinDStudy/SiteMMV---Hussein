<?php
require_once '../../persistance/requiredDialoguesDBS.php';
$requeteListe = new DialogueBDListe();
echo "<form method=\"get\">";
echo "<label  class=\"font-weight-bold\" for=\"ChaineYoutube\">ChaineYoutube: </label>";
echo "<select id=\"ChaineYoutube\" name=\"chaineYoutube\" class=\"w-25\">";
try {
    $mesChainesYoutube = $requeteListe->listerChainesYoutube();
    foreach ($mesChainesYoutube as $indice => $ligne) {
        $id_ChaineY = $ligne['IDCHAINEY'];
        $nom_ChaineYoutube = $ligne['NOMCHAINEY'];
        $url = $ligne['URLCHAINEY'];
        $souscription = $ligne['SOUSCRIPTIONY'];
        echo "<option value=$id_ChaineY>$nom_ChaineYoutube<-->$souscription</option>";
    }
} catch (Exception $e) {
    $erreur = $e->getMessage();
    echo $erreur;
}
echo "</select><br>";