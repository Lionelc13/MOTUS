<?php
namespace Motus\dao;

use Motus\controller\Utilitaire;
use \PDO as PDO;

class DaoAppli
{

    private PDO $db;
    public function __construct()
    {
        $this->db = $this->getConnection();
    }
    // On essai de se connecter à la base de données
    private function getConnection()
    {
        $config = require __DIR__ . '/config.php';

        $dbHost = $config['db_host'];
        $dbName = $config['db_name'];
        $dbUser = $config['db_user'];
        $dbPass = $config['db_pass'];
        if (!isset($this->db)) {
            try {
                $this->db = new PDO("mysql:host=" . $dbHost . ";charset=utf8;dbname=" . $dbName, $dbUser, $dbPass,);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                $monErreur = $this::retourneErreur($e->getCode(), $e->getMessage());
                die($monErreur);
            }
        }
        return $this->db;
    }

    public function connexion($email, $password): bool
    {
        $requete = Requete::IS_CONNECTED;
        $statement = $this->db->prepare($requete);
        $statement->bindValue(1, $email, PDO::PARAM_STR);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        // Si l'email existe, on vérifie que le password saisi correspond au password stocké en base.

        // TODO
        $connected = false;
        if ($data['find']>0) {
            if (password_verify($password, $data['mdp'])) {
                $connected = true;
                $_SESSION['email'] = $email;
                $_SESSION['id_user'] = $data['id_user'];
            }
            //     echo('Mot de passe ' & $data['mdp']);
        }
        return $connected;
    }

    public static function retourneErreur($codeErr, $message)
    {

        if ($codeErr == '23000') {
            if (strpos($message, 'Integrity') && (strpos($message, 'v_ema'))) {
                return 'cet email existe déjà!';
            }
        } elseif ($codeErr == '1049') {
            if (strpos($message, 'inconnue')) {
                return 'Impossible de trouver la base de données!';
            }
        } elseif ($codeErr == '1045') {
            if (strpos($message, 'Accès refusé')) {
                return 'Utilistateur ou mot de passe inconnu';
            }
        } elseif ($codeErr == '2002') {
            if (strpos($message, 'inconnu')) {
                return 'Impossible de contacter l URL de la base de données! Veuillez vérifier votre connexion';
            }
        } else {
            return $message;
        }
    }
    // On cré un nouvel utilisateur dans la base
    public function insertUser($user)
    {
        $requete = Requete::INS_USER;
        $statement = $this->db->prepare($requete);
        $statement->bindValue(1, $user->getNom(), PDO::PARAM_STR);
        $statement->bindValue(2, $user->getPrenom(), PDO::PARAM_STR);
        $statement->bindValue(3, $user->getSurnom(), PDO::PARAM_STR);
        $statement->bindValue(4, $user->getEmail(), PDO::PARAM_STR);
        $password = password_hash($user->getMdp(), PASSWORD_BCRYPT);
        $statement->bindValue(5, $password, PDO::PARAM_STR);

        //On essaie de créer un user
        try {
            $monId = $statement->execute();
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            $monErreur = Utilitaire::retourneErreur($e->getCode(), $e->getMessage());
            die($monErreur);
        }
    }

    public function listerMots($level, $user)
    {
        $requete = Requete::LIST_WORD_DISTINCT;
        $statement = $this->db->prepare($requete);
        $statement->bindValue(1, $level, PDO::PARAM_INT);
        $statement->bindValue(2, $user, PDO::PARAM_STR);
        $statement->execute();
        $datas = $statement->fetchAll();

        return $datas;
    }

    public function listerClassement()
    {
        $requete = Requete::LIST_CLASSEMENT;
        $statement = $this->db->query($requete);
    
        if ($statement) {
            $datas = $statement->fetchAll();
        } else {
            $datas = [];
        }
    
        return $datas;
    
    }

    public function InsertMot($mot, $user)
    {
        $requete = Requete::INS_WORD;
        $statement = $this->db->prepare($requete);
        $statement->bindValue(1, $user, PDO::PARAM_INT);
        $statement->bindValue(2, $mot, PDO::PARAM_STR);
        //On essaie d'insérer un mot trouvé par un utilisateur
        try {
            $resultat = $statement->execute();
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            print_r($resultat);
        } catch (\PDOException $e) {
            $monErreur = Utilitaire::retourneErreur($e->getCode(), $e->getMessage());
            die($monErreur);
        }
    }

    public function returnScoreUser($user)
    {
        $requete = Requete::SCORE_USER;
        $statement = $this->db->prepare($requete);
        $statement->bindValue(1, $user, PDO::PARAM_INT);
        // On recupère le nombre de point d'un user.
        try {
            $statement->execute();
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $statement->fetchAll();

        } catch (\PDOException $e) {
            $monErreur = Utilitaire::retourneErreur($e->getCode(), $e->getMessage());
            die($monErreur);
        }
    }

    public function wordsByUser()
    {
        $requete = Requete::LIST_CLASSEMENT;
        $statement = $this->db->prepare($requete);
        $statement->bindValue(1, $_SESSION['id_user'], PDO::PARAM_INT);
        // On recupère le nombre de point d'un user.
        try {
            $statement->execute();

            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            $monErreur = Utilitaire::retourneErreur($e->getCode(), $e->getMessage());
            die($monErreur);
        }
    }
}
