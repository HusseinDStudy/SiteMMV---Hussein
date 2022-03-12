<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste Des Musics D'un Album Responsive</title>
</head>
<?php require_once '../../../../navigation.php';
require_once '../../../../persistance/requiredDialoguesDBS.php';?>
<?php $requeteListe = new DialogueBDListe();?>
<body onload="chargerAlbum()">
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <h1>Liste Des Musics D'un Album Responsive</h1>
            <div id="divAlbum"></div>
            <div id="divMusic"></div>
            <h3>Responsive(AJAX)</h3>
        </div>
    </section>
</div>
<script>

    function chargerMusic(idAlbum){
        $.get("MusicsParAlbum.php",{ idAlbum: idAlbum}, function (reponse)//?idAlbum=\"+idAlbum
        {
            $("#divMusic").html(reponse);
        });
    }
    function chargerAlbum(){
        $.get('LesAlbums.php',function (reponse){
            $("#divAlbum").html(reponse);
            $("#IDAlbum").click(function (){//id de select
                chargerMusic($(this).val());
            });
        });
    }
    $(document).ready(function(){
        chargerAlbum();
    });
</script>
</body>
</html>