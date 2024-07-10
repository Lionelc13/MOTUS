<?php
namespace Motus\controller;
class PersoException extends \Exception  {
  private array $messages;
  function __construct($messages) {
      parent::__construct();
      $this->messages = $messages;
  }

  public function getMessages(): array {
    return $this->messages;
  }

}
