<?php
declare (strict_types = 1);
namespace Motus;

use Motus\controller\CntrlAppli;

require_once 'vendor/autoload.php';

/* router de l'application */

//ex: localhost:3000/ressource?niveau=2
$uri = $_SERVER['REQUEST_URI'];
$route = explode('?', $uri)[0];
$method = strtolower($_SERVER['REQUEST_METHOD']);
// echo $route . ' - ' . $method;

$cntrl = new CntrlAppli;
//-----------------------------------------------------------------------------------------------
if ($method == 'get' and $route == '/inscription') {
    $cntrl->affFormInscription();
} elseif ($method == 'post' and $route == '/inscription') {
    $cntrl->inscrire();
} elseif ($method == 'get' and $route == '/connexion') {
    $cntrl->affFormConnexion();
} elseif ($method == 'post' and $route == '/connexion') {
    $cntrl->connexion();
} elseif ($method == 'get' and $route == '/deconnexion') {
    $cntrl->deconnexion();
} elseif ($method == 'get' and $route == '/jouer') {
    $cntrl->affFormJouer();
} elseif ($method == 'get' and $route == '/classement') {
    $cntrl->affFormClassement();
} elseif ($method == 'get' and $route == '/reglement') {
    $cntrl->affFormReglement();
} elseif ($method == 'get' and $route == '/api/classement') {
    $cntrl->getClassement();
} elseif ($method == 'get' && $route == '/api/liste') {
    $level = $_GET['level'];
    $user = $_GET['user'];
    $cntrl->listerMots($level, $user);
} elseif ($method == 'get' && $route == '/api/enregistrer') {
    $word = $_GET['word'];
    $user = $_GET['user'];
    $cntrl->enregisterMot($word, $user);
} elseif ($method == 'get' && $route == '/api/score') {
     $user = $_GET['user'];
    $cntrl->scoreUser($user);
} else {
    $cntrl->getIndex();
}
