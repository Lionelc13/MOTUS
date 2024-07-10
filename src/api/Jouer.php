<?php
namespace Motus\api;

use Motus\dao\DaoAppli;

class Jouer
{
    private ?string $word;

public function __construct(?string $word =null)
    {
        $this->word =$word;
    }

    public function setWord($word)
    {
        $this->word = $word;
        $dao = new DaoAppli();
        $dao->listerMots($this->word);
        $user = $_SESSION['id_user'];
        return $this->countWords($user);
    }

    public function countWords($user)
    {
        $dao = new DaoAppli();
        return $dao -> returnScoreUser($user);
    }
}
