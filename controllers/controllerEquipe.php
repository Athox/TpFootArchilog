<?php

require_once 'modeles/equipe.php';
require_once 'vues/Vue.php';

class ControllerEquipe {

  private $equipe;

  public function __construct() {
    $this->equipe = new Equipe();
  }

  // Affiche les informations d'uns �quipe
  public function equipes($id_equipe) {
    $equipe = $this->equipe->getEquipe($id_equipe);
    $vue = new Vue("Equipe");
    $vue->generer(array('equipe' => $equipe)); 
  }
  
  //Affiche le formulaire de modification d'�quipe
  public function recupererEquipe($id_equipe){
  	$equipe = $this->equipe->getEquipe($id_equipe);
  	$vue = new Vue("ModificationE");
  	$vue->generer(array('equipe' => $equipe));
  }
  
  //Modifier une �quipe
  public function modifierEquipe($equipe) {
  	$this->equipe->modifierEquipe($equipe);
  }
}

?>