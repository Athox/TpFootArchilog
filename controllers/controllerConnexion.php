<?php

require_once 'modeles/connexion.php';
require_once 'vues/Vue.php';

class ControllerConnexion {

  private $connexion;

  public function __construct() {
    $this->connexion = new Connexion();
  }

  // Affiche la page de connexion
  public function connexion() {
    $vue = new Vue("Connexion");
    $vue->generer($donnees);
  }
}

?>