<?php

require_once 'modeles/equipe.php';
require_once 'vues/Vue.php';

class ControllerEquipe {

  private $equipe;

  public function __construct() {
    $this->equipe = new Equipe();
  }

  // Affiche les informations d'uns équipe
  public function equipes($id_equipe) {
    $equipe = $this->equipe->getEquipe($id_equipe);
    print_r($equipe);
    $vue = new Vue("Equipe");
    $vue->generer(array('equipe' => $equipe)); 
  }
}

?>