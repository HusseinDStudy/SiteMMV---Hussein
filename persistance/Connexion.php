<?php



/*def
$sthmt=statement
$requete = $sql
*/
class Connexion
{
    private $cnx = null;
    private $dbhost;
    private $dbbase;
    private $dbuser;
    private $dbpwd;

    public static function getConnexion() {
        try {
            //$dbhost = '127.0.0.1';$dbbase = 'mmv1';$dbuser = 'usersio';$dbpwd = 'sio';cnx = new PDO("mysql:host=$dbhost;dbname=$dbbase", $dbuser,$dbpwd);

            $dbhost = '127.0.0.1';
            $dbbase = 'mmv';
            $dbuser = 'hussein';
            $dbpwd = 'htdocs123';
            $cnx = new PDO("mysql:host=$dbhost;dbname=$dbbase", $dbuser, $dbpwd);
            $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $cnx->exec('SET CHARACTER SET utf8');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $cnx;
    }
    public static function deConnexion() {
        try {
            $cnx = null;
        } catch (PDOException $e) {
            $erreur = $e->getMessage(); echo $erreur;
        }
    }
}