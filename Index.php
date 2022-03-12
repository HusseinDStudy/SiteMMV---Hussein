<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
</head>
<?php require_once 'navigation.php';?>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Bonjour Voici mon site de Gestion des Videos MMV</h1>
            <div class="row">
                <h2 class="col-sm-12 text-center">Le Sujet</h2>
                <h5 class="col-sm-12 text-center">Voici une explication General de Ce site:</h5>
                <div class="col-sm-12 row">
                    <div class="col-sm-2  "></div>
                    <p class="col-sm-8 text-justify border p-4 ">
                        Mon site sert a gerer mes Videos <dfn ><a href="#def-MMV">MMV</a></dfn> [pas type MMV comme les mp4...etc]:
                        <br>Pour chaque Video MMV il y a une et une seule chaine Youtube a la quelle il appartient.
                        Chaque Video peut avoir d'une a plusieurs musics et chaque music peut etre utiliser dans 1 ou plusieurs Video MMV.
                        Chaque music appartient a un et un seul Album.
                        On veut utiliser se site pour enregistrer modifier et supprimer ses donnée ensuite automatiser une telechargement des musique des Albums Complet a travers youtube.dll [ajoute un url music au BBD].
                        Enfin Ajouter de la responsiviter et de la securite au site.
                        Si possible utiliser de l'Ajax, cree des utilisateur a modepasse crypter mdp5...etc  ,Faire un mapping de site qui fonctionnz mieu[automatique: utilise $_SERVER].
                        <br><br>
                            <span class="font-weight-bold">DEF:</span>
                            <span class="font-italic" id="def-MMV">
                                <span class="font-weight-bold">MMV</span> est un mélange de chansons avec des personnages d'anime ou de manga.
                                Mais la chanson et l'animation n'appartiennent pas au producteur des vidéos.
                                D'une certaine manière, c'est similaire à MUSIS (casque: / guitare) mais aussi très différent.
                            </span>
                    </p>
                    <div class="col-sm-2"></div>
                </div>
            </div>

            <div class="row">
                <h1 class="col-sm-12 text-center">La Base de donnée</h1>
            </div>
            <div class="row">
                <h2 class="col-sm-6 text-center">Voici mon MCD</h2>
                <h2 class="col-sm-6 text-center">Voici mon MLR ou MPD</h2>
            </div>
            <div class="row">
                <a  class="col-sm-5  img-responsive" href="images/MCDSiteVideosMMV.png"><img style="width:100%;" src="images/MCDSiteVideosMMV.png"></a>
                <div class="col-sm-1 bg-dark w-100 "></div>
                <a  class="col-sm-5  img-responsive" href="images/MPDSiteVideosMMV.png"><img  style="width:100%;" src="images/MPDSiteVideosMMV.png"></a>
            </div>
        </div>
    </section>
</div>
<hr>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Bonjour Des choses a faire</h1><del></del>
            <table class="table table-bordered table-striped ">
                <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                </tr>
                <tr>
                    <th>Explique que c'est toi qui a choisit la desision de ne pas avoir des table avec des entite a variable null</th>
                    <td>Resout Probleme de restart page do a new clone request : soit modifie les condion soit trouve une solu0.</td>
                    <td>imperativement resout le probleme de nom des truc revoit fiche par fiche</td>
                </tr>
                <tr>
                    <td>array security pour checkbox ??? revoit </td>
                    <td>Securise site <a href="https://www.journaldunet.com/web-tech/developpeur/1007036-securiser-une-application-web-developpee-en-php">ICI</a>/</td>
                    <td>Heberge sites: portfolio + projet sur <a href="https://dash.cloudflare.com/login"> cloud flare</a></td>
                </tr>
                <tr>
                    <th>
                        <del>
                            <br>def MMV mette le de facon à def sur autre page ou footer pour les def voit wikipedia pour example
                            + aide toi de <a href="https://www.w3schools.com/tags/tag_dfn.asp">tag_dfn</a>
                        </del>
                        <del>
                            <br>//Demande Prof
                            <br>/- Avoir une page permettant l’insertion de données avec tous les champs?
                            <br>//- Avoir une page permettant la suppression d’un enregistrement contenant une clé primaire reliée à une autre table
                            <br>//- Avoir une page permettant la suppression d’un enregistrement contenant une clé étrangère reliée à une autre table
                        </del>
                    </th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Ajax</th>
                    <td>JS?</td>
                </tr>
                <tr>
                    <td>
                        A Utiliser
                        <br>
                        public function listerRelieMusicsETVideoMMV($codeVideoMMV)
                            {
                            try {
                            $conn = Connexion::getConnexion();
                            $requete = "SELECT * FROM music JOIN listemusicparvideo ON music.IDMUSIC=listemusicparvideo.IDMUSIC JOIN video_mmv ON listemusicparvideo.IDVIDEOMMV=video_mmv.IDVIDEOMMV WHERE listemusicparvideo.IDVIDEOMMV=?";
                            $sthmt = $conn->prepare($requete);
                            $sthmt->execute(array($codeVideoMMV));
                            $listeMusicsDeAlbum = $sthmt->fetchAll(PDO::FETCH_ASSOC);
                            return $listeMusicsDeAlbum;
                            }catch (exception $e){
                            echo $e->getMessage();
                            }
                            }
                        <br>
                        public function SupprimerMusicsDe1Album($codeAlbum)
                            {//tavail sur table music

                            }
                        <br>
                        public function SupprimerChainesLies()
                        {//travail sur une jointure entre les chaines Y T F I et  site web

                        }
                    </td>
                    <th>Change adress en nav avec un + pertinant avec l'utilisa0 de $_SERVER</th>
                </tr>
                <tr>
                    <th>Jquery datatable</th>
                    <th>Cree compte utiisateur pour acces au[voir session cookies ..etc] ite Web et securise mdp avecfx php crypter ex:md5</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </section>
</div>
</html>
