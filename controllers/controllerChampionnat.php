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
    $championnats = $this->championnat->getChampionnats($pays_championnat);
    print_r($championnats);
    $vue = new Vue("Championnat");
    $vue->generer(array('championnats' => $championnats));
    
  }
}

?>