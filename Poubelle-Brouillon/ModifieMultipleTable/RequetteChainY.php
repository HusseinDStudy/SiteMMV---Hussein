<script>

</script>
<?php
require_once '../../persistance/requiredDialoguesDBS.php';
$requeteModifie = new DialogueBDModifier();


$id_ChaineYoutube=htmlentities($_GET["idChaineYoutube"], ENT_QUOTES);
$titreChaineYoutube=htmlentities($_GET["titreChaineYoutube"], ENT_QUOTES);
$urlChaineYoutube=htmlentities($_GET["urlChaineYoutube"], ENT_QUOTES);
$souscriptionChaineYoutube=htmlentities($_GET["souscription"], ENT_QUOTES);

if($souscriptionChaineYoutube<0)$souscriptionChaineYoutube=$souscriptionChaineYoutube*-1;

try {
    $requeteModifie->ModifierChaineYoutube($id_ChaineYoutube,$titreChaineYoutube,$urlChaineYoutube,$souscriptionChaineYoutube);
    echo "<h3>Requete Fini et Reussit</h3>";
}catch (exception $e){
    echo $e->getMessage();
}
?>