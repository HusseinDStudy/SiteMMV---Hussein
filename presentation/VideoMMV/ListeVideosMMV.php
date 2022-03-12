<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Liste de mes Videos MMV</title>
</head>
<?php require_once '../../navigation.php';
require_once '../../persistance/requiredDialoguesDBS.php';
?>
<?php $requeteListe = new DialogueBDListe();?>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Liste de mes Videos MMV</h1>
            <table class="table table-bordered table-striped ">
                <?php
                $nbVideos = 0;
                echo "<tr><th>ID</th> <th>TITRE</th><th>URL</th><th>DATE CREATION</th><th>SUJET</th>
                <th ><p class=\"fa fa-thumbs-up\"></p></th><th><p class=\"fa fa-thumbs-down\"></p></th><th>VUES</th><th>COUVERTURE</th><th>IDCHAINEY</th></tr>";

                $listeVideo=$requeteListe->listerVideosMMV();
                foreach ($listeVideo as $indice => $ligne) {

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
                    <img   class='img-fluid ' src=\"../../images/couvertures/$couverture\">
                    </a>
                    </td>
                    <td>$id_chaine_youtube</td></tr>";
                    $nbVideos++;
                }
                ?>
            </table>
             <?php echo "<h3 class=\"text-left\">J'ai $nbVideos Videos dans ma BDD</h3>"
             ?>

            <!--$objetscenariste=null;
                    $objetscenariste=$requete->getScenariste($id_scenariste);
                    echo"<td>$objetscenariste->nom_scenariste</td>";
                    echo"<td>$prix</td>";
                    $nbmanga++;
                    echo"<td>
<input type='image' style='height: 30px;' class='img-fluid' src=\"../images/$couverture\"readonly>
<input type='text' name='imageCouverture'value='$couverture' hidden>
</td>";
                    echo"<td><form method=\"POST\" action=\"ModifieManga.php\">
<input type='image' id='imageModif$id_manga'    style='height: 30px;' class='img-fluid' src=\"../images/modification.jpg\"readonly>
<input type='text' name='manga'value='$id_manga' hidden></form>
</td>";
<!--<input type='submit'   readonly>
<a href='ModificationManga.php'><img   /></a>-->







        </div>
    </section>
</div>
</html>
