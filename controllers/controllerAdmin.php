<?php

require_once 'modeles/admin.php';
require_once 'vues/Vue.php';

class ControllerAdmin {

  private $admin;

	public function __construct() {
	    $this->admin = new Admin();
	}
  
	// Afficher la page de tableau de bord Admin
	public function pageAdmin(){
		$tabrd = $this->admin->afficherTabBord();
		$vue = new Vue("Admin");
		$vue->generer(array('tabrd' => $tabrd));
	}
	
	// Ajouter un championnat à la BDD
	public function ajouterChampionnat($nom, $pays, $annee, $nbequipe, $ptsg, $ptsp, $ptsn, $exaequo){
		$this->admin->ajoutChampionnat($nom, $pays, $annee, $nbequipe, $ptsg, $ptsp, $ptsn, $exaequo);
		echo 'Le championnat a bien été ajouté';
	}
}