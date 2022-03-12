<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Liste Des Videos MMV D'une Chaine Youtube</title>
</head>
<?php require_once '../../../navigation.php';
require_once '../../../persistance/requiredDialoguesDBS.php';
?>
<?php $requeteListe = new DialogueBDListe();?>
<body>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <?php
            if(!isset($_POST['idChaineY'])){
                echo "<h1 class=\"text-center\">Liste Des Videos MMV D'une Chaine Youtube </h1>";
                echo "<form method=\"post\" action=\"ListeVideosMMVParChaineY.php\">";
                echo "<label  class=\"font-weight-bold\" for=\"IDChaineY\">ChaineYs : </label><select id=\"IDChaineY\" name=\"idChaineY\" class=\"w-25\">";
                $listeChainesYoutube=$requeteListe->listerChainesYoutube();
                foreach ($listeChainesYoutube as $indice => $ligne) {
                    $id_ChaineYoutube = $ligne['IDCHAINEY'];
                    $nom_ChaineYoutube = $ligne['NOMCHAINEY'];
                    $url = $ligne['URLCHAINEY'];
                    $souscription = $ligne['SOUSCRIPTIONY'];
                    echo "<option value=$id_ChaineYoutube>$nom_ChaineYoutube<-> $url <->$souscription</option>";
                }echo "</select><br><br><input type=\"submit\" value=\"Afficher les Videos\"></form>";
            }else{
                $id_VMMV=htmlentities($_POST['idChaineY'], ENT_QUOTES);
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
                    <a href='../../images/couvertures/$couverture'>
                    <img   class='img-fluid ' src=\"../../../images/couvertures/$couverture\">
                    </a>
                    </td>
                    <td>$id_chaine_youtube</td></tr>";
                    $nbVideos++;
                }
                echo " </table><h3 class=\"text-left\">J'ai $nbVideos Videos dans la Chaine Youtube</h3>";
            }
            ?>
        </div>
    </section>
</div>
</body>
</html>