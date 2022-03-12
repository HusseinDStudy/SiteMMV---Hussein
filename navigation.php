<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php //$dir=dirname(__FILE__);
$dir="http://localhost:".$_SERVER['SERVER_PORT']."/SiteMMV - Hussein";//'http://localhost:63342/SiteMMV - copy';
var_dump($dir);
//echo"<h1>$dir </h1>";?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Site Videos MMV HD</a>
    <div></div>
    <ul class="navbar-nav mr-auto mt-2 ">
        <li class="nav-item ">
            <a class="nav-link" href="<?php echo "$dir/Index.php";?>">Acceuil</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAlbum" data-toggle="dropdown">
                Album
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Album/AddAlbum.php";?>"> Ajout Album</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Album/SupprimeAlbum.php";?>"> Suppression d'Album</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Album/ModifieAlbum.php";?>"> Modification d'un Album</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Album/ListeAlbum.php";?>">Lister Les Albums</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownChaineYoutube" data-toggle="dropdown">
                Chaine Youtube
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo "$dir/presentation/ChaineY/AddChaineYoutube.php";?>"> Ajout de Chaine Youtube</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/ChaineY/SupprimeChaineYoutube.php";?>"> Suppression de Chaine Youtube</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/ChaineY/ModifieChaineYoutube.php";?>"> Modification d'une Chaine Youtube</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/ChaineY/ListeChaineYoutube.php";?>">Liste de mes Chaines Youtube</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownVideo" data-toggle="dropdown">
                Video MMV
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo "$dir/presentation/VideoMMV/AddVideoMMV.php";?>"> Ajout d'une Video MMV</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/VideoMMV/SupprimeVideoMMV.php";?>"> Suppression d'une Video MMV</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/VideoMMV/ModifieVideoMMV.php";?>"> Modification d'une Video MMV</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/VideoMMV/ListeVideosMMV.php";?>">Liste de mes Videos MMV</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/VideoMMV/ListeVideosMMVV2.php";?>">Liste de mes Videos MMV V2</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Specifique/VideoChaineY/ListeVideosMMVParChaineY.php";?>">Liste Des Videos MMV D'une Chaine Youtube</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Specifique/VideoChaineY/ListeVideosMMVParChaineYResponsive/ListeVideosMMVParChaineYResponsive.php";?>">Liste Des Videos MMV D'une Chaine Youtube Responsive</a>

            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMusic" data-toggle="dropdown">
                Music
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Music/AddMusic.php";?>"> Ajout Musique</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Music/SupprimeMusic.php";?>"> Suppression de Musique</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Music/ModifieMusic.php";?>"> Modification d'une Music</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Music/ListeMusic.php";?>">Liste de mes Musics</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Music/ListeMusicV2.php";?>">Liste de mes Musics V2</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Specifique/MusicAlbum/ListeMusicsParAlbum.php";?>">Liste Des Musics D'un Album </a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Specifique/MusicAlbum/ListeMusicsParAlbumResponsive/ListeMusicsParAlbumResponsive.php";?>">Liste Des Musics D'un Album Responsive</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownRelationMusicVideo" data-toggle="dropdown">
                Music/Videos
            </a>
            <div class="dropdown-menu">

                <div class="dropdown-divider"></div>
                <a class="dropdown-header dropdown-item disabled" href="#">Sur Plusieur ou 1 Music(s) par Video</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Specifique/MusicVideo/AddRelationVideoMusic.php";?>"> Ajout  d'une ou plusieurs Relation Music / Video</a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-header dropdown-item disabled" href="#">Sur Plusieur Musics par Video</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Specifique/MusicVideo/MusicsParVideo/ListeMusicsParVideo.php";?>">Liste de Des Musics D'une Videos MMV</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Specifique/MusicVideo/MusicsParVideo/SupprimeMusicsDe1VideoMMV.php";?>">Suppression de musiques d'une Video MMV</a>


                <div class="dropdown-divider"></div>
                <a class="dropdown-header dropdown-item disabled" href="#">Sur 1 Relation Music / Video</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Specifique/MusicVideo/MusicPourVideo/SupprimeRelationVideoMusic.php";?>"> Suppression  d'une Relation Music / Video</a>
                <a class="dropdown-item" href="<?php echo "$dir/presentation/Specifique/MusicVideo/MusicPourVideo/ModifieRelationVideoMusic.php";?>"> Modification d'une Relation Music / Video</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo "$dir/presentation/Specifique/TelechargeVideo.php";?>">Telecharge une Video</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">...............</a>
        </li>
    </ul>
</nav>


