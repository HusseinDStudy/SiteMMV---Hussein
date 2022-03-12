<!DOCTYPE html>
<html lang="fr">
<?php require_once 'headEtMenuAddVideoMMV.php';
require_once '../../persistance/DialogueBD.php';?>
<div class="container">
    <section class="row">
        <div class="col-sm-12">
<?php
    var_dump($_POST);
    if(isset($_POST["urlVideoMMV"])&&isset( $_POST["titreVideoMMV"])&&isset($_POST["couvertureVideoMMV"])
        &&isset($_POST["dateCreationVideoMMV"]) &&isset( $_POST["sujetVideoMMV"])&&isset($_POST["likeVideoMMV"])
        &&isset($_POST["dislikeVideoMMV"])&&isset($_POST["vueVideoMMV"])){
        $requeteAjout = new DialogueBDAddition();
        $requeteSelectionID= new DialogueBDID();
        if (isset($_POST['nomChaineY'])&&isset($_POST['urlChaineY'])&&isset($_POST['souscriptionChaineY'])){
            $ajoutChaineY=$requeteAjout->AddChaineYoutube($_POST['nomChaineY'],$_POST['urlChaineY'],$_POST['souscriptionChaineY']);
            $idchaineY=$requeteSelectionID->IDChaineYoutube();
        }
        if (isset($_POST['idChaineY'])){
            $ajoutVideoMMV=$requeteAjout->AddVideosMMV($_POST["urlVideoMMV"],$_POST["titreVideoMMV"],$_POST["couvertureVideoMMV"],$_POST["dateCreationVideoMMV"], $_POST["sujetVideoMMV"],$_POST["likeVideoMMV"],$_POST["dislikeVideoMMV"],$_POST["vueVideoMMV"],$_POST['idChaineY']);
        }else{
            if (isset($idchaineY)){
                foreach ($idchaineY as $idi=>$argumenti)$idchaineY=$argumenti;
                $ajoutVideoMMV=$requeteAjout->AddVideosMMV($_POST["urlVideoMMV"],$_POST["titreVideoMMV"],$_POST["couvertureVideoMMV"],$_POST["dateCreationVideoMMV"], $_POST["sujetVideoMMV"],$_POST["likeVideoMMV"],$_POST["dislikeVideoMMV"],$_POST["vueVideoMMV"],$idchaineY);
            }else echo "<h1>1Probleme</h1>";
        }
    }else{
        echo "<h1>FINI</h1>";
    }
?>
            <script>
                //il faut retourner au page d'acceuil apres la fin de 10sec utilise des cookies ou des session
            </script>
        </div>
    </section>
</div>
</html>
