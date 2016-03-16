<?php

require_once 'modeles/championnat.php';
require_once 'vues/vue.php';

class ControllerAccueil {

  private $championnat;

  public function __construct() {
    $this->championnat = new Championnat();
  }

  // Affiche la liste de tous les pays
  public function accueil() {
    $pays = $this->championnat->getPays();
    $vue = new Vue("Accueil");
    $vue->generer(array('pays' => $pays));   
  }
  
}

?>