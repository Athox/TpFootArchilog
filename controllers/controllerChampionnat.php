<?php

require_once 'modeles/championnat.php';
require_once 'vues/Vue.php';

class ControllerChampionnat {

  private $championnat;

  public function __construct() {
    $this->championnat = new Championnat();
  }

  // Affiche les championnats d'un pays
  public function championnats($pays_championnat) {
    $championnat = $this->championnat->getChampionnat($pays_championnat);
    $vue = new Vue("championnat");
    $vue->generer(array('championnat' => $championnat));
  }
}

?>