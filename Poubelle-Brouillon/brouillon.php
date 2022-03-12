<?php $test='
/*def
$sthmt=statement
$requete = $sql
*/
class DialogueBD{
    //essaye de faire un heritage
}
class DialogueBDListe
{
    /*lister*/
    //Relation Avec les Videos
    public function listerVideosMMV()
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM video_mmv";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute();
            $listeVideos = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $listeVideos;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

    public function listerMusics()
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM music";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute();
            $listeMusics = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $listeMusics;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

    public function listerAlbums()
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM album_groupe";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute();
            $listeAlbums = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $listeAlbums;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

    //Relation Avec les Chaines
    public function listerChainesYoutube()
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM chaine_youtube";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute();
            $listeChainesYoutube = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $listeChainesYoutube;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

    public function listerChainesInstagramme()
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM chaine_instagramme";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute();
            $listeChainesInstagramme = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $listeChainesInstagramme;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

    public function listerChainesFacebook()
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM chaine_facebook";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute();
            $listeChainesFacebook = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $listeChainesFacebook;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

    public function listerChainesTwitter()
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM chaine_twitter";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute();
            $listeChainesTwitter = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $listeChainesTwitter;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

    public function listerSitesWeb()
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM site_web";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute();
            $listeSitesWeb = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $listeSitesWeb;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

    //Relation Specifique
    public function listerMusicsDe1Album($codeAlbum)
    {//tavail sur table music
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM music WHERE IDALBGRP=?";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute();
            $listeMusicsDeAlbum = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $listeMusicsDeAlbum;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

    public function listerMusicsDe1VideoMMV($codeVideoMMV)
    {//travail sur table intermediaire
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM music JOIN listemusicparvideo ON music.IDMUSIC=listemusicparvideo.IDMUSIC WHERE listemusicparvideo.IDVIDEOMMV=?";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($codeVideoMMV));
            $listeMusicsDeAlbum = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $listeMusicsDeAlbum;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

    public function listerChainesLies($idChaineY)
    {//travail sur une jointure entre les chaines Y T F I et  site web
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM chaine_youtube JOIN chaine_twitter ON chaine_youtube.IDCHAINEY=chaine_twitter.IDCHAINEY
    JOIN chaine_instagramme ON chaine_youtube.IDCHAINEY=chaine_instagramme.IDCHAINEY
    JOIN chaine_facebook ON chaine_youtube.IDCHAINEY=chaine_facebook.IDCHAINEY
    JOIN site_web ON chaine_youtube.IDCHAINEY=site_web.IDCHAINEY WHERE chaine_youtube.IDCHAINEY=?";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($idChaineY));
            $listeChainesLies = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $listeChainesLies;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }
}
class DialogueBDAddition{
    /*Addition*/
    //Relation Avec les Videos
    public function AddVideosMMV($url,$titre,$couverture,$datecreation,$sujet,$like,$dislike,$vue,$idChaine){
        try {
            $conn = Connexion::getConnexion();
            $requete = "INSERT INTO video_mmv(URLVIDEOMMV,TITREVIDEOMMV,COUVERTUREVIDEOMMV,DATECREATIONVIDEOMMV,SUJETVIDEOMMV,LIKEVIDEOMMV,
                      DISLIKEVIDEOMMV,VUEVIDEOMMV,IDCHAINEY) VALUES (?,?,?,?,?,?,?,?,?);";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($url,$titre,$couverture,$datecreation,$sujet,$like,$dislike,$vue,$idChaine));
            $AjoutVideosMMV = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $AjoutVideosMMV;
        }catch (exception $e){
            echo $e->getMessage();
        }

    }';


    /*la surcharge  ou overloading n'est pas compatible avec le php ducoup on fait 2 propriéte differentes ou
    on fait un epropriete qui compte longeur de saisie*/
    echo'public function AddMusic1($titre){//pas besoin de code il est automatique si tu presice les champs
        try {
            $conn = Connexion::getConnexion();
            $requete = "INSERT INTO music(TITREMUSIC) VALUES (?);";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($titre));
            $AjoutMusic1 = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $AjoutMusic1;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }
    public function AddMusic2($titre,$idAlbum){//pas besoin de code il est automatique si tu presice les champs
        try {
            $conn = Connexion::getConnexion();
            $requete = "INSERT INTO music(TITREMUSIC,IDALBGRP) VALUES (?,?);";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($titre,$idAlbum));
            $AjoutMusic2 = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $AjoutMusic2;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }
    public function AddMusic(array $donnees){
        $nb = count($donnees);
        if($nb==1){
            $this->AddMusic1($donnees[0]);
        }else if($nb==2){
            $this->AddMusic2($donnees[0],$donnees[1]);
        }
    }

    public function AddAlbum($titre,$CompletPas){//pas besoin de code il est automatique si tu presice les champs
        try {
            $conn = Connexion::getConnexion();
            $requete = "INSERT INTO album_groupe(NOMALBGRP,COMPLETALBGRP) VALUES (?,?);";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($titre,$CompletPas));
            $AjoutAlbum = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $AjoutAlbum;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }
    //Relation Avec les Chaines

    /*Meme Methodo que Avec AddMusic*/
    public function AddChaineYoutube(array $donnees){
        $nb = count($donnees);
        if($nb==3){
            $this->AddChaineYoutube1($donnees[0],$donnees[1],$donnees[2]);
        }
        else if($nb==4){
            $this->AddChaineYoutube2($donnees[0],$donnees[1],$donnees[2],$donnees[3]);
        }
        else if($nb==5){
            $this->AddChaineYoutube3($donnees[0],$donnees[1],$donnees[2],$donnees[3],$donnees[4]);
        }
        else if($nb==6){
            $this->AddChaineYoutube4($donnees[0],$donnees[1],$donnees[2],$donnees[3],$donnees[4],$donnees[5]);
        }
        else if($nb==7){
            $this->AddChaineYoutube5($donnees[0],$donnees[1],$donnees[2],$donnees[3],$donnees[4],$donnees[5],$donnees[6]);
        }
    }
    public function AddChaineYoutube1($nom,$url,$souscription){
        try {
            $conn = Connexion::getConnexion();
            $requete = "INSERT INTO chaine_youtube(NOMCHAINEY,URLCHAINEY,SOUSCRIPTIONY) VALUES (?,?,?);";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($nom,$url,$souscription));
            $AjoutChaineYoutubeSolo = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $AjoutChaineYoutubeSolo;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }
    public function AddChaineYoutube2($nom,$url,$souscription,$idchain1){
        try {
            $conn = Connexion::getConnexion();
            $requete = "INSERT INTO chaine_youtube(NOMCHAINEY,URLCHAINEY,SOUSCRIPTIONY,) VALUES (?,?,?,?);";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($nom,$url,$souscription));
            $AjoutChaineYoutubeSolo = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $AjoutChaineYoutubeSolo;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }
    public function AddChaineYoutube3($nom,$url,$souscription,$idchain1,$idchaine2){

    }
    public function AddChaineYoutube4($nom,$url,$souscription,$idchain1,$idchaine2,$idchaine3){

    }
    public function AddChaineYoutube5($nom,$url,$souscription,$idchain1,$idchaine2,$idchaine3,$idSiteWeb){

    }

    public function AddChaineInstagramme($nom,$url,$souscription,$idChaineYoutube){

    }
    public function AddChaineFacebook($nom,$url,$souscription,$idChaineYoutube){

    }
    public function AddChaineTwitter($nom,$url,$souscription,$idChaineYoutube){

    }
    public function AddSiteWeb($url,$hebergeur,$idChaineYoutube){

    }
}
class DialogueBDSupprimer
{
    /*Supprimer*/
    //Relation Avec les Videos
    public function SupprimerVideoMMV($id)
    {

    }

    public function SupprimerMusic($id)
    {

    }

    public function SupprimerAlbum($id)
    {

    }

    //Relation Avec les Chaines
    public function SupprimerChaineYoutube($id)
    {

    }

    public function SupprimerChaineInstagramme($id)
    {

    }

    public function SupprimerChaineFacebook($id)
    {

    }

    public function SupprimerChaineTwitter($id)
    {

    }

    public function SupprimerSiteWeb($id)
    {

    }

    //Relation Specifique
    public function SupprimerMusicsDe1Album($codeAlbum)
    {//tavail sur table music

    }

    public function SupprimerMusicsDe1VideoMMV($codeVideoMMV)
    {//travail sur table intermediaire

    }

    public function SupprimerChainesLies()
    {//travail sur une jointure entre les chaines Y T F I et  site web

    }
}
class DialogueBDModifier{
    /*Modifier*/
    //Relation Avec les Videos
    public function ModifierVideoMMV($idchain0,$url,$titre,$couverture,$datecreation,$sujet,$like,$dislike,$vue,$idChaine)
    {

    }

    public function ModifierMusic($idchain0,$titre,$idAlbum)
    {

    }

    public function ModifierAlbum($idchain0,$titre)
    {

    }
    //Relation Avec les Chaines
    public function ModifierChaineYoutube($idchain0,$nom,$url,$souscription,$idchain1,$idchaine2,$idchaine3,$idSiteWeb)
    {

    }

    public function ModifierChaineInstagramme($idchain0,$nom,$url,$souscription,$idChaineYoutube)
    {

    }

    public function ModifierChaineFacebook($idchain0,$nom,$url,$souscription,$idChaineYoutube)
    {

    }

    public function ModifierChaineTwitter($idchain0,$nom,$url,$souscription,$idChaineYoutube)
    {

    }

    public function ModifierSiteWeb($idchain0,$nom,$url,$souscription,$idChaineYoutube)
    {

    }
}

';/*

    if ($('#ChaineF').is(':checked')) {
        alert($('#ChaineF').val() + ' is checked');
    }
    $("#ChaineF").live("click", function(){
        var id = parseInt($(this).val(), 10);
        if($(this).is(":checked")) {
            // checkbox is checked -> do something
        } else {
            // checkbox is not checked -> do something different
        }
    });
    $("#ChaineT").live("click", function(){
        var id = parseInt($(this).val(), 10);
        if($(this).is(":checked")) {
            // checkbox is checked -> do something
        } else {
            // checkbox is not checked -> do something different
        }
    });
    $("#ChaineI").live("click", function(){
        var id = parseInt($(this).val(), 10);
        if($(this).is(":checked")) {

            // checkbox is checked -> do something
        } else {
            // checkbox is not checked -> do something different
        }
    });
    $("#SiteWeb").live("click", function(){
        var id = parseInt($(this).val(), 10);
        if($(this).is(":checked")) {
            // checkbox is checked -> do something
        } else {
            // checkbox is not checked -> do something different
        }
    });
    //var dataI="";
    //document.getElementById('divChaineI').innerHTML =dataI;
    //var dataT="";
    //document.getElementById('divChaineT').innerHTML =dataT;
    //var dataF="";
    //document.getElementById('divChaineF').innerHTML =dataF;
    $.ajax({
        type: "POST",
        dataType: "xml",
        url: "",
        data: "function=loadContent&id=" + id,
        success: function(xml) {
            // success function is called when data came back
            // for example: get your content and display it on your site
        }
    });
    function check($id){
        if( $('#id').is(':checked') ) {

        }
        if( $('#id').is(':checked') ) {

        }
        if( $('#id').is(':checked') ) {

        }
        if( $('#id').is(':checked') ) {

        }
    }
     $("#ChaineF").change(function() {
        if(this.checked) {
            $.get('F.php',function (reponse){
                $("#divChaineF").html(reponse);
            });
        }
    });

     */
?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#ChaineF').on('click', function () {
            if (('#ChaineF').is(':checked')) {

                $('#divChaineF').innerHTML="<br><label for='NomChaineF'>Nom Chaine Facebook</label>" +
                    "<input type="checkbox" id="NomChaineF" name="nomChaineF" />" +
                "<br><label for='UrlChaineF'>Url Chaine Facebook</label><input type="checkbox" id="UrlChaineF" name="urlchaineF" /> " +
                "<br><label for='SouscriptionChaineF'>Souscription Chaine Facebook</label><input type="checkbox" id="SouscriptionChaineF" name="souscriptionchaineF" />";
            } else {
                $('#divChaineF').innerHTML="<h1>Facebook Not Checked</h1>";
            }
        });
        $('#ChaineT').on('click', function () {
            if (('#ChaineF').is(':checked')) {

                $('#divChaineT').innerHTML="<br><label for='NomChaineT'>Nom Chaine Twitter</label><input type="checkbox" id="NomChaineT" name="nomChaineT" /> " +
                "<br><label for='UrlChaineT'>Url Chaine Twitter</label><input type="checkbox" id="UrlChaineT" name="urlchaineT" /> " +
                "<br><label for='SouscriptionChaineT'>Souscription Chaine Twitter</label><input type="checkbox" id="SouscriptionChaineT" name="souscriptionchaineT" />";
            } else {
                $('#divChaineT').innerHTML="<h1>Twitter Not Checked</h1>";
            }
        });
        $('#ChaineI').on('click', function () {
            if (('#ChaineF').is(':checked')) {

                $('#divChaineI').innerHTML="<br><label for='NomChaineI'>Nom Chaine Instagramme</label><input type="checkbox" id="NomChaineI" name="nomChaineI" /> " +
                "<br><label for='UrlChaineI'>Url Chaine Instagramme</label><input type="checkbox" id="UrlChaineI" name="urlchaineI" /> " +
                "<br><label for='SouscriptionChaineI'>Souscription Chaine Instagramme</label><input type="checkbox" id="SouscriptionChaineI" name="souscriptionchaineI" />";
            } else {
                $('#divChaineI').innerHTML="<h1>Instagramme Not Checked</h1>";
            }
        });
        $('#SiteWeb').on('click', function () {
            if (('#ChaineF').is(':checked')) {

                $('#divSiteWeb').innerHTML="";
            } else {
                $('#divSiteWeb').innerHTML="<h1>Site Web Not Checked</h1>";
            }
        });
    })

</script>
<!--
maxlength	Le nombre de caractères maximal qui peut être écrit dans ce champ.
minlength	Le nombre de caractères minimal qui peut être écrit dans ce champ pour qu'il soit considéré comme valide.
pattern	Une expression rationnelle à laquelle doit correspondre le texte saisi pour être valide.
placeholder	Une valeur d'exemple qui sera affichée lorsqu'aucune valeur n'est saisie.
readonly	Un attribut booléen qui indique si le contenu du champ est en lecture seule.
size	Un nombre qui indique le nombre de caractères affichés par le champ.
spellcheck	Cet attribut contrôle l'activation de la vérification orthographique sur le champ ou si la vérification orthographique par défaut doit être appliquée.
-->
<?php
            function decodeEmoticons($src) {
            $replaced = preg_replace("/\\\\u([0-9A-F]{1,4})/i", "&#x$1;", $src);
            $result = mb_convert_encoding($replaced, "UTF-16", "HTML-ENTITIES");
            $result = mb_convert_encoding($result, 'utf - 8', 'utf - 16');
            return $result;
            }
            $src = "\u263a\ud83d\ude00\ud83d\ude01\ud83d\ude02\ud83d\ude03";
            echo decodeEmoticons($src);

            ?>
<?php
/*
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

if (isset($_POST['idChaineY'])){
            $ajoutVideoMMV=$requeteAjout->AddVideosMMV($_POST["urlVideoMMV"],$_POST["titreVideoMMV"],$_POST["couvertureVideoMMV"],$_POST["dateCreationVideoMMV"], $_POST["sujetVideoMMV"],$_POST["likeVideoMMV"],$_POST["dislikeVideoMMV"],$_POST["vueVideoMMV"],$_POST['idChaineY']);
        }else{
            if (isset($idchaineY)){
                foreach ($idchaineY as $idi=>$argumenti)$idchaineY=$argumenti;
                $ajoutVideoMMV=$requeteAjout->AddVideosMMV($_POST["urlVideoMMV"],$_POST["titreVideoMMV"],$_POST["couvertureVideoMMV"],$_POST["dateCreationVideoMMV"], $_POST["sujetVideoMMV"],$_POST["likeVideoMMV"],$_POST["dislikeVideoMMV"],$_POST["vueVideoMMV"],$idchaineY);
            }else echo "<h1>1Probleme</h1>";
        }


*/