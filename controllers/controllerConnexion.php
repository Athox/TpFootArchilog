<?php

require_once 'modeles/connexion.php';
require_once 'vues/Vue.php';

class ControllerConnexion {

  private $connexion;

  public function __construct() {
    $this->connexion = new Connexion();
  }

  // Affiche la page de connexion
  public function formulaire() {
    $formulaire = $this->connexion->afficherFormulaire();
    $vue = new Vue("Connexion");
    $vue->generer(array('formulaire' => $formulaire)); 
  }
  
  // Etablir la connexion
  public function connexion($login, $password){
  	$autorisation = $this->connexion->controllerFormulaire($login, $password);
  	if($autorisation == true){
  		session_start();
  		$_SESSION['Admin'] = true;
  	}
  	else{
  		// A FAIRE !!!!!!!!!!!!!
  	}
  }
}

?>