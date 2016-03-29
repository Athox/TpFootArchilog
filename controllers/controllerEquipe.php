<?php

require_once 'modeles/equipe.php';
require_once 'modeles/admin.php';
require_once 'vues/Vue.php';

class ControllerEquipe {

  private $equipe;
  private $admin;

  public function __construct() {
    $this->equipe = new Equipe();
    $this->admin = new Admin();
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
  	$championnats = $this->admin->championnatTabBord();
  	$vue = new Vue("ModificationE");
  	$vue->generer(array('equipe' => $equipe, 'championnats' => $championnats));
  }
  
  //Modifier une �quipe
  public function modifierEquipe($equipe) {
  	$this->equipe->modifierEquipe($equipe);
  }
  
  // Affiche les r�sultats d'une �quipe
  public function resultat($nom_equipe){
  	$resultats = $this->equipe->getResultats($nom_equipe);
  	$vue = new Vue("Resultats");
  	$vue->generer(array('resultats' => $resultats));
  }
}

?>