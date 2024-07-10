<?php
namespace Motus\controller;
class Utilitaire {
    
    public static function cookiesOpt(){
        return array (
                'expires' => time() + 60*60*24*30, 
                'path' => '/', 
                'domain' => 'localhost', // leading dot for compatibility or use subdomain
                'secure' => true,     // or false
                'httponly' => false,    // or false
                'samesite' => 'None' // None || Lax  || Strict
            );
    }
    public static function  retourneErreur($codeErr ,$message ){

            if ($codeErr=='23000'){
                if (strpos($message,'Integrity') && (strpos($message,'v_ema')) ){
                    return 'cet email existe déjà!';}
            } elseif ($codeErr=='3819') {
                if (strpos($message,'TMIN')){
                    return 'La chambre doit avoir une taille de 9m minimum!';}
            } elseif ($codeErr=='1049') {
                if (strpos($message,'inconnue')){
                    return 'Impossible de trouver la base de données!';}
            } elseif ($codeErr=='1045') {
                if (strpos($message,'Accès refusé')){
                    return 'Utilistateur ou mot de passe inconnu';}
            } elseif ($codeErr=='2002') {
                if (strpos($message,'inconnu')){
                    return 'Impossible de contacter l URL de la base de données! Veuillez vérifier votre connexion';}
            }
            else {
                return $message;
            }
    }

}
