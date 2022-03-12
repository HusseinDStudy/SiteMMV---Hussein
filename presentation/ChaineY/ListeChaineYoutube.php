<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste de mes Chaines Youtube </title>
</head>
<?php require_once '../../navigation.php';
require_once '../../persistance/requiredDialoguesDBS.php';
?>
<?php $requeteListe = new DialogueBDListe();?>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Liste de mes Chaines Youtube </h1>
            <table class="table table-bordered table-striped ">
                <?php
                $nbChaineYoutube = 0;
                echo "<tr><th>ID CHAINEY</th> <th>NOM</th><th>URL</th><th>SOUSCRIPTIONY</th></tr>";

                $listeChainesYoutube=$requeteListe->listerChainesYoutube();
                foreach ($listeChainesYoutube as $indice => $ligne) {
                    $id_ChaineYoutube = $ligne['IDCHAINEY'];
                    $nom_ChaineYoutube = $ligne['NOMCHAINEY'];
                    $url = $ligne['URLCHAINEY'];
                    $souscription = $ligne['SOUSCRIPTIONY'];

                    echo "<tr><td>$id_ChaineYoutube</td> <td>$nom_ChaineYoutube</td><td><a href='$url'>$url</a></td><td>$souscription</td></tr>";
                    $nbChaineYoutube++;
                }
                ?>
            </table>
            <?php echo "<h3 class=\"text-left\">J'ai $nbChaineYoutube Chaines Youtube dans ma BDD</h3>";?>
        </div>
    </section>
</div>
</html>

