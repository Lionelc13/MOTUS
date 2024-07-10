<?php
    namespace Motus\controller;

use Motus\controller\Message;
use Motus\dao\DaoAppli;

    use Exception;
    use Motus\api\Jouer;
    use Motus\api\ListeMots;
    use Motus\metier\User;

class CntrlAppli{
    public function getIndex(){
        session_start();
        //pas de traitement avant affichage
        require 'src/view/index.php';
    }

    public function affFormReglement(){
        session_start();
        //pas de traitement avant affichage
        require 'src/view/reglement.php';
    }

    public function affFormConnexion(){
        //pas de traitement avant affichage
        require 'src/view/connexion.php';
    }

    public function deconnexion(){
        $_SESSION = array();
        require 'src/view/connexion.php';
    }

    public function connexion(){
        $email      = htmlspecialchars($_POST['email']);
        $password   = htmlspecialchars($_POST['password']);
        $messageErr = [];
        $i=0;
        if (empty($email)){
            $messageErr[$i++] = Message::ERR_MAIL;
        }
        if (empty($password)){
            $messageErr[$i++] = Message::ERR_MDP;
        }
        if ($i==0){
            // S'il n'y a pas d'erreur dans le formulaire, on vérifie les identifiants
            try{
                $dao = new DaoAppli();
                if ($dao->connexion($email,$password)) {
                    require 'src/view/jouer.php';
                } else {
                    $messageErr[$i++] = Message::ERR_MAIL_MDP;
                    require 'src/view/connexion.php';
                }
            }
            catch (PersoException $e){
               // $messageErr= $e->getMessages();
                require 'src/view/connexion.php';    
            }
         } else { 
            require 'src/view/connexion.php';
        }
    }
    public function affFormInscription() {
        session_start();
        require 'src/view/inscription.php';
    }
    public function inscrire() {
        $lastname      = htmlspecialchars($_POST['lastname']);
        $firstname   = htmlspecialchars($_POST['firstname']);
        $nickname   = htmlspecialchars($_POST['nickname']);
        $email      = htmlspecialchars($_POST['email']);
        $password   = htmlspecialchars($_POST['password']);
        // -----------------Controler les données----------------------
        $messageErr=[];
        $i=-1;
        // On verifie le nom
        if (empty($lastname)){
                $messageErr[$i++] = Message::ERR_NOM;
        }
        // On verifie le prenom
        if (empty($firstname)){
                $messageErr[$i++] = Message::ERR_PRENOM;
        }
        // On verifie le nomsur
        if (empty($nickname)){
            $messageErr[$i++] = Message::ERR_SURNOM;
        }
        if (empty($email)){
            $messageErr[$i++] = Message::ERR_MAIL;
        }
        if (filter_var($email,FILTER_VALIDATE_EMAIL)==false) {
            $messageErr [$i++]= Message::ERR_TYPE_MAIL;
        }
        if (empty($password)){
            $messageErr[$i++] = Message::ERR_MDP;
        }
        if ($messageErr==[]){
            $dao = new DaoAppli();
            $user = new User("1",$lastname, $firstname, $nickname, $email, $password);
            try {
                $dao->insertUser($user);
                $isOk = true;
                require 'src/view/connexion.php';
            }
            catch (PersoException $e){
                $messageErr= $e->getMessages();
                echo("erreur lors de l'inscription");
                require 'src/view/inscription.php';    
            } 
        } else
        {
            require 'src/view/inscription.php';
        }
    }

    public function affFormJouer() {
        session_start();
        require 'src/view/jouer.php';
    }

    public function listerMots($level) {
        $liste = new ListeMots($level);
        $json = json_encode($liste->getListeMots());
        echo $json;
        return $json;
    }

    public function scoreUser($user) {
        $jouer = new Jouer();
        $score = json_encode($jouer->countWords($user));
        print_r($score);
        if ($score==null) {
            $score=0;
        }
        return $score;
    }

    public function affFormClassement() {
        session_start();
        require 'src/view/classement.php';
    }

    public function enregisterMot($word, $user) {
        $dao = new DaoAppli();
        $dao->InsertMot($word, $user);
    }

    public function getClassement() {
        $dao = new DaoAppli();
        $json = json_encode($dao->listerClassement());
        print_r($json);
        return $json;
    }
}

