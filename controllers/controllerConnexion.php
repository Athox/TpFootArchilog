<?php

require_once 'modeles/connexion.php';
require_once 'controllers/controllerAdmin.php';
require_once 'vues/Vue.php';

class ControllerConnexion {

  private $connexion;
  private $ctrlAdmin;

  public function __construct() {
    $this->connexion = new Connexion();
    $this->ctrlAdmin = new ControllerAdmin();
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
  	if($autorisation == true){ //Si login et password sont ok, afficher la vue Admin
  	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
  		$_SESSION['Admin'] = true;
  		$this->ctrlAdmin->pageAdmin();
  	}
  	else{ //Sinon re afficher le formulaire
  		$this->formulaire();
  		echo "Espace réservé";
  	}
  }
  
  
}

?>