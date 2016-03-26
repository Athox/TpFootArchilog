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
	public function ajouterChampionnat($champ){
		$this->admin->ajoutChampionnat($champ);
		$this->pageAdmin();
	}
	
	// Ajouter une équipe à la BDD
	public function ajouterEquipe($equipe){
		$this->admin->ajoutEquipe($equipe);
		$this->pageAdmin();
	}
	
	// Ajouter un match à la BDD
	public function ajouterMatch($match){
		$this->admin->ajoutMatch($match);
		$this->pageAdmin();
	}
}