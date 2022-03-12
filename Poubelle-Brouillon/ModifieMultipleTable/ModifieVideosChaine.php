<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifie  Videos / Chaine</title>
</head>
<?php require_once '../../navigation.php';
require_once '../../persistance/requiredDialoguesDBS.php';?>
<?php $requeteListe = new DialogueBDListe();?>
<body onload="charger()">
<div class="container">
    <section class="row">
        <h1 class="col-sm-12 text-center">Modifie  Videos / Chaine</h1>
        <div class="col-sm-6">
            <div class="row">
                <div id="divChainY"></div>
                <div id="divModifieChainY"></div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div id="divVideo"></div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row">
                <div id="divRequette"></div>
            </div>
        </div>
    </section>
</div>
<script>

    function ModifieVideo(idChainY){
        $.get("VideosParChainY.php",{ idChainY: idChaineYoutube}, function (reponse)
        {
            $("#divModifieVideo").html(reponse);
        });
    }
    function chargerVideo(){
        $.get("VideosParChainY.php",{ idChaineYoutube: idChainY}, function (reponse)
        {
            $("#divVideo").html(reponse);
        });
    }
    function RequetteModifieChainY(idChainY,Titre,Url,Sub){
        $.get("RequetteChaineY.php",{ idChaineYoutube: idChainY,titreChaineYoutube:Titre,urlChaineYoutube:Url,souscription:Sub}, function (reponse)
        {
            $("#divRequette").html(reponse);

        });
    }
    /*
    $("#IdChaineYoutube").change(function (){//id de select
        $A=$(this).val());
    });
    $("#TitreChaineYoutube").change(function (){//id de select
        $B=$(this).val());
    });
    $("#UrlChaineYoutube").change(function (){//id de select
        $C=$(this).val());
    });
    $("#Souscription").change(function (){//id de select
        $D=$(this).val());
    });
    RequetteModifieChainY($A,$B,$C,$D);
    $("#IdChaineYoutube","#IdChaineYoutube","#IdChaineYoutube","#IdChaineYoutube").change(function (){
        RequetteModifieChainY($(this).val(),$(this).val(),$(this).val(),$(this).val());
    });*/
    function ModifieChainY(idChainY){
        $.get("ModifieChaineY.php",{ idChaineYoutube: idChainY}, function (reponse)
        {
            $("#divModifieChainY").html(reponse);
            $.ajax({
                type: "POST",
                url: "updateDB.php",
                data: dataString,
                cache: false,
                success: function() {
                    alert("ok");
                }
            });

        });
    }
    function chargerChainY(){
        $.get('ChaineY.php',function (reponse){
            $("#divChainY").html(reponse);
            $("#ChaineYoutube").change(function (){//id de select
                ModifieChainY($(this).val());
            });
        });
    }
    $(document).ready(function(){
        chargerChainY();
    });
</script>ChainY/Video/Video/ChainY