<?php
require_once '../../persistance/requiredDialoguesDBS.php';
$requeteListe = new DialogueBDListe();
$id_ChaineYoutubeA_Modifier=htmlentities($_GET['idChaineYoutube'], ENT_QUOTES);
$listeChaineYoutube=$requeteListe->listerChainesYoutube();
foreach ($listeChaineYoutube as $indice => $ligne) {
    $id_ChaineYoutube = $ligne['IDCHAINEY'];
    if ($id_ChaineYoutube==$id_ChaineYoutubeA_Modifier){
        $nom_ChaineYoutube = $ligne['NOMCHAINEY'];
        $url = $ligne['URLCHAINEY'];
        $souscription = $ligne['SOUSCRIPTIONY'];
    }
}

echo "<label  class=\"font-weight-bold\" for=\"IdChaineYoutube\">Id ChaineYoutube : </label>";
echo "<input type=\"number\" id=\"IdChaineYoutube\"name=\"idChaineYoutube\" value=\"$id_ChaineYoutubeA_Modifier\" readonly/>";


echo "<br><label class=\"font-weight-bold\"  for=\"TitreChaineYoutube\">Titre ChaineYoutube: </label>";
echo "<input type=\"text\" id='TitreChaineYoutube' name=\"titreChaineYoutube\" value=\"$nom_ChaineYoutube\"  required/>";

echo "<br><label class=\"font-weight-bold\"  for=\"UrlChaineYoutube\">Url ChaineYoutube: </label>";
echo "<input type=\"text\" id='UrlChaineYoutube' name=\"urlChaineYoutube\" value=\"$url\"  required/>";

echo "<br><label class=\"font-weight-bold\"  for=\"Souscription\">Souscription ChaineYoutube: </label>";
echo "<input type=\"number\" id='Souscription' name=\"souscription\" value=\"$souscription\"  required/>";
?><script>
    $.ajax({
        type: "GET",
        url: "RequetteChaineY.php",
        data: $("#IdChaineYoutube")+$("#TitreChaineYoutube")+$("#UrlChaineYoutube")+$("#Souscription"),
        cache: false,
        success: function() {
            alert("ok");
        }
    });
</script>
