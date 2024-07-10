<?php
namespace Motus\dao;

// La classe requête énumère l'ensemble des requêtes utilisables dans l'application
class Requete
{

    public const DEL_USER = 'DELETE FROM user 
                             WHERE id_user = ?;';
    
    public const INS_USER = 'INSERT INTO User (firstname,lastname,nickname,email,password) 
                             VALUES (?,?,?,?,?)';
    
    public const INS_WORD = 'INSERT INTO chercher (id_user, id_word) 
                             VALUES (?, (SELECT id_word FROM word WHERE name_word = ?))';
    
    public const IS_CONNECTED = 'SELECT COUNT(*) as find , password as mdp, firstname, id_user 
                                 FROM User  
                                 WHERE email=?';

    public const SCORE_USER = 'SELECT COUNT(id_user) as score 
                               FROM chercher 
                               WHERE id_user=?';

    public const LIST_CLASSEMENT = 'SELECT C.id_user,nickname, COUNT(C.id_user) as total
                              FROM chercher C, user U
                              WHERE C.id_user = U.id_user 
                              GROUP BY c.id_user
                              ORDER BY total DESC';

    public const LIST_WORD = 'SELECT name_word 
                              FROM word 
                              WHERE id_level=?';

    public const UPD_CON_USER = 'UPDATE user
                                 SET password=?,
                                 email=?
                                 WHERE id_user=?;';

   
}
