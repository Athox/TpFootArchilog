<?php

require_once 'modeles/championnat.php';
require_once 'vues/Vue.php';

class ControllerChampionnat {

  private $championnat;

  public function __construct() {
    $this->championnat = new Championnat();
  }

  // Affiche les pays
  public function afficherPays() {
    $pays = $this->championnat->getPays();
    $vue = new Vue("championnat");
    $vue->generer(array('championnat' => $pays));
  }
}

?>