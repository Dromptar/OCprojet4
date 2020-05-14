<?php


/*namespace Simon\Projet4\Model;*/

require_once("Manager.php");

class LogsManager extends Manager
{
    public function __construct() {
        parent::__construct();
    }

    
    public function logsCheck() {

        $db = $this->database;
        $req = $db->prepare('SELECT pseudo, email FROM members WHERE pseudo=? OR email=?');
        $req->execute(array($_POST['pseudo'], $_POST['email']));
        
        return $req;

    }


    public function addMember() {

       $pseudo = $_POST['pseudo'];
       $email = $_POST['email']; 
       $pass_hache = password_hash($_POST['pass1'], PASSWORD_DEFAULT); 
       $db = $this->database;
       $req = $db->prepare('INSERT INTO members(pseudo, pass, email, regist_date) 
                            VALUES(:pseudo, :pass, :email, CURDATE())');
       $req->execute(array(
                           'pseudo' => $pseudo,
                           'pass' => $pass_hache,
                           'email' => $email
                           ));           
       return $req;
       
    }

    public function connectMember() {

        $db = $this->database;
        $req = $bdd->prepare('SELECT id, pass FROM members WHERE pseudo = :pseudo');
        $req->execute(array(
                        'pseudo' => $pseudo));
        $resultat = $req -> fetch();

        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
    }


}