<?php
namespace Motus\controller;
// enum
class Message {
    public const INS_SUCCESS ="Inscription OK";
    public const ERR_MAIL ='Le mail doit être renseigné!';
    public const ERR_MDP ='Le mot de passe doit être renseigné!'; 
    public const ERR_NOM ='Le nom doit être renseigné!';
    public const ERR_PRENOM ='Le prénom doit être renseigné!';
    public const ERR_SURNOM ='Le surnom doit être renseigné!';
    public const ERR_TYPE_MAIL='Votre email est incorrect!';
    public const ERR_MAIL_MDP='Votre email ou votre mot de passe est incorrect!';
}   
?>
