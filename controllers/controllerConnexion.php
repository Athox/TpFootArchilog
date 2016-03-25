<?php

require_once 'modeles/connexion.php';
require_once 'modeles/admin.php';
require_once 'vues/Vue.php';

class ControllerConnexion {

  private $connexion;
  private $admin;

  public function __construct() {
    $this->connexion = new Connexion();
    $this->admin = new Admin();
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
  		session_start();
  		$_SESSION['Admin'] = true;
  		$this->pageAdmin();
  	}
  	else{ //Sinon re afficher le formulaire
  		$this->formulaire();
  		echo "Espace r�serv�";
  	}
  }
  
  // Afficher la page de tableau de bord Admin
  public function pageAdmin(){
  	$tabrd = $this->admin->afficherTabBord();
  	$vue = new Vue("Admin");
  	$vue->generer(array('tabrd' => $tabrd));
  }
}

?>