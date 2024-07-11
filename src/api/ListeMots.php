<?php
namespace Motus\api;

use Motus\dao\DaoAppli;

class ListeMots {
    private int $level;

function __construct(?int $level)
{
    $this->level = $level;
}

public function getListeMots($user){
    $dao = new DaoAppli();

    return $dao->ListerMots($this->level, $user);
    }
}
