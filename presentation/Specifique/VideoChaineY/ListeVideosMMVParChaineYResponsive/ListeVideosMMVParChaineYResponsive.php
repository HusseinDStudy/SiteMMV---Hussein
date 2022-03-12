<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Liste Des Videos MMV D'une Chaine Youtube Responsive</title>
</head>
<?php require_once '../../../../navigation.php';
require_once '../../../../persistance/requiredDialoguesDBS.php';?>
<?php $requeteListe = new DialogueBDListe();?>
<body onload="chargerChaineY()">
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <h1>Liste Des Videos MMV D'une Chaine Youtube Responsive</h1>
            <div id="divChainY"></div>
            <div id="divVideo"></div>
            <h3>Responsive(AJAX)</h3>
        </div>
    </section>
</div>
<script>
    function chargerVideo(idChaineY){
        $.get("VideosMMVParChaineY.php",{ idChaineY: idChaineY}, function (reponse)//?idChaineY=\"+idChaineY
        {
            $("#divVideo").html(reponse);
        });
    }
    function chargerChaineY(){
        $.get('LesChainesY.php',function (reponse){
            $("#divChainY").html(reponse);
            $("#IDChaineY").click(function (){//id de select
                chargerVideo($(this).val());
            });
        });
    }
    $(document).ready(function(){
        chargerChaineY();
    });
</script>
</body>
</html>