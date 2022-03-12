<?php
require_once 'Connexion.php';

class DialogueBDAddition
{
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
    }

    public function AddMusic($titre,$idAlbum){//pas besoin de code il est automatique si tu presice les champs
        try {
            $conn = Connexion::getConnexion();
            $requete = "INSERT INTO music(TITREMUSIC,IDALBGRP) VALUES (?,?);";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($titre,$idAlbum));
            $AjoutMusic = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $AjoutMusic;
        }catch (exception $e){
            echo $e->getMessage();
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

    public function AddChaineYoutube($nom,$url,$souscription){
        try {
            $conn = Connexion::getConnexion();
            $requete = "INSERT INTO chaine_youtube(NOMCHAINEY,URLCHAINEY,SOUSCRIPTIONY) VALUES (?,?,?);";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($nom,$url,$souscription));
            $AjoutChaineYoutube = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $AjoutChaineYoutube;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

    //Relation Specifique

    public function AddRelationMusicsDe1VideoMMV($idV,$idM){

            $conn = Connexion::getConnexion();

                try {
                    $requete = "INSERT INTO listemusicparvideo(IDVIDEOMMV,IDMUSIC) VALUES (?,?);";
                    $sthmt = $conn->prepare($requete);
                    $sthmt->execute(array($idV,$idM));
                    $AjoutChaineYoutube = $sthmt->fetchAll(PDO::FETCH_ASSOC);
                    return $AjoutChaineYoutube;
                }catch (exception $e){
                    echo $e->getMessage();
                }
    }

}
class DialogueBDID{

    public function IDChaineYoutube(){
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT MAX(IDCHAINEY) FROM chaine_youtube;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute();
            $SelectIDChaineYoutube = $sthmt->fetchObject();
            return $SelectIDChaineYoutube;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

}
class DialogueBDTest{
    //Spe pour AddRelationMusicsDe1VideoMMV()
    public function testRelationMusicVideoMMV($idM,$idV){
        $ok=false;
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM listemusicparvideo Where IDMUSIC=? AND IDVIDEOMMV=?;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($idM,$idV));
            $SelectRelationVM = $sthmt->fetchAll();
            if(!empty($SelectRelationVM)) $ok=true;
            else $ok=false;

        }catch (exception $e){
            $ok=false;
        }
        return $ok;

    }
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
    //V2
    public function listerMusics2()
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM music join album_groupe ag on music.IDALBGRP = ag.IDALBGRP";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute();
            $listeMusics = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $listeMusics;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }
    public function listerVideosMMV2()
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM video_mmv join chaine_youtube cy on video_mmv.IDCHAINEY = cy.IDCHAINEY";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute();
            $listeVideos = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $listeVideos;
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
            $sthmt->execute(array($codeAlbum));
            $listeMusicsDeAlbum = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $listeMusicsDeAlbum;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }
    //travail sur table intermediaire
    public function listerMusicsDe1VideoMMV($codeVideoMMV)
    {
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
    public function listerVideosMMVDe1ChaineY($codeVideoMMV)
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM video_mmv WHERE IDCHAINEY=?";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($codeVideoMMV));
            $listeVideosMMVDeChaineY = $sthmt->fetchAll(PDO::FETCH_ASSOC);
            return $listeVideosMMVDeChaineY;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }
    //get unique
    public function getVideoParID($id){
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM video_mmv Where IDVIDEOMMV=?;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($id));
            $SelectIDVideo = $sthmt->fetchObject();
            return $SelectIDVideo;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }
    public function getAlbumParID($id){
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM album_groupe Where IDALBGRP=?;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($id));
            $SelectIDAlbum = $sthmt->fetchObject();
            return $SelectIDAlbum;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }
    public function getChaineYParID($id){
        try {
            $conn = Connexion::getConnexion();
            $requete = "SELECT * FROM chaine_youtube Where IDCHAINEY=?;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($id));
            $SelectIDCHAINEY = $sthmt->fetchObject();
            return $SelectIDCHAINEY;
        }catch (exception $e){
            echo $e->getMessage();
        }
    }
}
class DialogueBDModifier{
    /*Modifier*/
    //Relation Avec les Videos
    public function ModifierVideoMMV($idchain0,$url,$titre,$couverture,$datecreation,$sujet,$like,$dislike,$vue,$idChaineY)
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "UPDATE video_mmv SET URLVIDEOMMV = ?,TITREVIDEOMMV = ?,COUVERTUREVIDEOMMV = ?,DATECREATIONVIDEOMMV = ?,
                     SUJETVIDEOMMV = ?,LIKEVIDEOMMV = ?,DISLIKEVIDEOMMV = ?,VUEVIDEOMMV = ?,IDCHAINEY = ?
                     WHERE IDVIDEOMMV =?;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($url,$titre,$couverture,$datecreation,$sujet,$like,$dislike,$vue,$idChaineY,$idchain0));
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

    public function ModifierMusic($idchain0,$titre,$idAlbum)
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "UPDATE music SET TITREMUSIC = ?,IDALBGRP = ?
                     WHERE IDMUSIC =?;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($titre,$idAlbum,$idchain0));
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

    public function ModifierAlbum($idchain0,$titre,$complet)
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "UPDATE album_groupe SET NOMALBGRP = ?,COMPLETALBGRP = ?
                     WHERE IDALBGRP =?;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($titre,$complet,$idchain0));
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

    //Relation Avec les Chaines
    public function ModifierChaineYoutube($idchain0,$nom,$url,$souscription)
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "UPDATE chaine_youtube SET NOMCHAINEY = ?,URLCHAINEY = ?,SOUSCRIPTIONY=?
                     WHERE IDCHAINEY =?;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($nom,$url,$souscription,$idchain0));
        }catch (exception $e){
            echo $e->getMessage();
        }
    }
    //Relation Specifique
    public function ModifierRelationVideoMusic($idV,$idM,$newIdV,$newIdM)
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "UPDATE listemusicparvideo SET IDVIDEOMMV = ?,IDMUSIC = ? WHERE IDVIDEOMMV =? AND IDMUSIC =?;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($newIdV,$newIdM,$idV,$idM));
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

}
class DialogueBDSupprimer
{
    /*Supprimer*/
    //Relation Avec les Videos
    public function SupprimerVideoMMV($id)
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "DELETE FROM video_mmv WHERE IDVIDEOMMV =?;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($id));
        }catch (exception $e){
            $erreur1= $e->getMessage();
            try {
                $conn = Connexion::getConnexion();
                $requete = "DELETE FROM listemusicparvideo WHERE listemusicparvideo.IDVIDEOMMV =?;DELETE FROM video_mmv WHERE IDVIDEOMMV =?;";
                $sthmt = $conn->prepare($requete);
                $sthmt->execute(array($id,$id));
            }catch (exception $e){
                echo ",\nERREUR1: ".$erreur1.",\nERREUR2: ".$e->getMessage();
            }
        }
    }

    public function SupprimerMusic($id)
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "DELETE FROM music WHERE IDMUSIC =?;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($id));
        }catch (exception $e){
            $erreur1= $e->getMessage();
            try {
                $conn = Connexion::getConnexion();
                $requete = "DELETE FROM listemusicparvideo WHERE listemusicparvideo.IDMUSIC =?;DELETE FROM music WHERE IDMUSIC =?;";
                $sthmt = $conn->prepare($requete);
                $sthmt->execute(array($id,$id));
            }catch (exception $e){
                echo ",\nERREUR1: ".$erreur1.",\nERREUR2: ".$e->getMessage();
            }
        }
    }

    public function SupprimerAlbum($id)
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "DELETE FROM album_groupe WHERE IDALBGRP =?;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($id));
        }catch (exception $e){
            $erreur1= $e->getMessage();
            try {
                $conn = Connexion::getConnexion();
                $requete1 = "DELETE FROM music WHERE IDALBGRP=?;DELETE FROM album_groupe WHERE IDALBGRP =?;";
                $sthmt = $conn->prepare($requete1);
                $sthmt->execute(array($id,$id));
            }catch (exception $e){
                $erreur2=$e->getMessage();
                try {
                    $conn = Connexion::getConnexion();
                    $requete2 = "
DELETE listemusicparvideo FROM listemusicparvideo JOIN music ON listemusicparvideo.IDMUSIC = music.IDMUSIC WHERE music.IDALBGRP =?;
DELETE FROM music WHERE IDALBGRP=?;
DELETE FROM album_groupe WHERE IDALBGRP =?;";
                    $sthmt = $conn->prepare($requete2);
                    $sthmt->execute(array($id,$id,$id));
                }catch (exception $e){
                    echo ",\nERREUR1: ".$erreur1.",\nERREUR2: ".$erreur2.",<br>ERREUR3: ".$e->getMessage();
                }

            }
        }
    }

    //Relation Avec les Chaines
    public function SupprimerChaineYoutube($id)
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "DELETE FROM chaine_youtube WHERE IDCHAINEY =?;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($id));
        }catch (exception $e) {
            $erreur1 = $e->getMessage();
            try {
                $conn = Connexion::getConnexion();
                $requete1 = "DELETE FROM video_mmv WHERE IDCHAINEY=?;DELETE FROM chaine_youtube WHERE IDCHAINEY =?;";
                $sthmt = $conn->prepare($requete1);
                $sthmt->execute(array($id, $id));
            } catch (exception $e) {
                $erreur2 = $e->getMessage();
                try {
                    $conn = Connexion::getConnexion();
                    $requete2 = "
DELETE listemusicparvideo FROM listemusicparvideo JOIN video_mmv ON listemusicparvideo.IDVIDEOMMV = video_mmv.IDVIDEOMMV WHERE video_mmv.IDCHAINEY =?;
DELETE FROM video_mmv WHERE IDCHAINEY=?;
DELETE FROM chaine_youtube WHERE IDCHAINEY =?";
                    $sthmt = $conn->prepare($requete2);
                    $sthmt->execute(array($id, $id, $id));
                } catch (exception $e) {
                    echo ",\nERREUR1: " . $erreur1 . ",\nERREUR2: " . $erreur2 . ",<br>ERREUR3: " . $e->getMessage();
                }
            }
        }
    }

    //Relation Specifique

    public function SupprimerMusicsDe1VideoMMV($codeVideoMMV)
    {//travail sur table intermediaire
        try {
            $conn = Connexion::getConnexion();
            $requete = "DELETE FROM listemusicparvideo WHERE IDVIDEOMMV =?;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($codeVideoMMV));
        }catch (exception $e){
            echo $e->getMessage();
        }
    }
    public function SupprimeRelationMusicVideo($idV,$idM)
    {
        try {
            $conn = Connexion::getConnexion();
            $requete = "DELETE FROM listemusicparvideo WHERE IDVIDEOMMV =? AND IDMUSIC =?;";
            $sthmt = $conn->prepare($requete);
            $sthmt->execute(array($idV,$idM));
        }catch (exception $e){
            echo $e->getMessage();
        }
    }

}

//Code Originaire de:   https://www.codexworld.com/download-youtube-video-using-php/

/**
 * CodexWorld
 *
 * This Downloader class helps to download youtube video.
 *
 * @class       YouTubeDownloader
 * @author      CodexWorld
 * @link        http://www.codexworld.com
 * @license     http://www.codexworld.com/license
 */

class YouTubeDownloader
{
    /*
     * Video Id for the given url
     */
    private $video_id;

    /*
     * Video title for the given video
     */
    private $video_title;

    /*
     * Full URL of the video
     */
    private $video_url;

    /*
     * store the url pattern and corresponding downloader object
     * @var array
     */
    private $link_pattern;

    public function __construct()
    {
        $this->link_pattern = "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed)\/))([^\?&\"'>]+)/";
    }

    /*
     * Set the url
     * @param string
     */
    public function setUrl($url)
    {
        $this->video_url = $url;
    }

    /*
     * Get the video information
     * return string
     */
    private function getVideoInfo()
    {
        return file_get_contents("https://www.youtube.com/get_video_info?video_id=" . $this->extractVideoId($this->video_url) . "&cpn=CouQulsSRICzWn5E&eurl&el=adunit");
    }

    /*
     * Get video Id
     * @param string
     * return string
     */
    private function extractVideoId($video_url)
    {
        //parse the url
        $parsed_url = parse_url($video_url);
        if ($parsed_url["path"] == "youtube.com/watch") {
            $this->video_url = "https://www." . $video_url;
        } elseif ($parsed_url["path"] == "www.youtube.com/watch") {
            $this->video_url = "https://" . $video_url;
        }

        if (isset($parsed_url["query"])) {
            $query_string = $parsed_url["query"];
            //parse the string separated by '&' to array
            parse_str($query_string, $query_arr);
            if (isset($query_arr["v"])) {
                return $query_arr["v"];
            }
        }
    }

    /*
     * Get the downloader object if pattern matches else return false
     * @param string
     * return object or bool
     *
     */
    public function getDownloader($url)
    {
        /*
         * check the pattern match with the given video url
         */
        if (preg_match($this->link_pattern, $url)) {
            return $this;
        }
        return false;
    }

    /*
     * Get the video download link
     * return array
     */
    public function getVideoDownloadLink()
    {
        //parse the string separated by '&' to array
        parse_str($this->getVideoInfo(), $data);
        $videoData = json_decode($data['player_response'], true);
        $videoDetails = $videoData['videoDetails'];
        $streamingData = $videoData['streamingData'];
        $streamingDataFormats = $streamingData['formats'];

        //set video title
        $this->video_title = $videoDetails["title"];

        //Get the youtube root link that contains video information
        $final_stream_map_arr = array();

        //Create array containing the detail of video
        foreach ($streamingDataFormats as $stream) {
            $stream_data = $stream;
            $stream_data["title"] = $this->video_title;
            $stream_data["mime"] = $stream_data["mimeType"];
            $mime_type = explode(";", $stream_data["mime"]);
            $stream_data["mime"] = $mime_type[0];
            $start = stripos($mime_type[0], "/");
            $format = ltrim(substr($mime_type[0], $start), "/");
            $stream_data["format"] = $format;
            unset($stream_data["mimeType"]);
            $final_stream_map_arr [] = $stream_data;
        }
        return $final_stream_map_arr;
    }

    /*
     * Validate the given video url
     * return bool
     */
    public function hasVideo()
    {
        $valid = true;
        parse_str($this->getVideoInfo(), $data);
        if ($data["status"] == "fail") {
            $valid = false;
        }
        return $valid;
    }
}
