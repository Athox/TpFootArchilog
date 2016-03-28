<?php

require_once 'modeles/championnat.php';
require_once 'vues/Vue.php';

class ControllerChampionnat {

  private $championnat;

  public function __construct() {
    $this->championnat = new Championnat();
  }

  // Affiche les championnats d'un pays
  public function championnats($pays_championnat) {
    $championnats = $this->championnat->getChampionnats($pays_championnat);
    $vue = new Vue("Championnat");
    $vue->generer(array('championnats' => $championnats)); 
  }
  
  // Affiche le classement d'un championnat
  public function classement($id_championnat) {
  	$classement = $this->championnat->getClassement($id_championnat);
  	$vue = new Vue("Classement");
  	$vue->generer(array('classement' => $classement));
  }
  
  // Affiche les matchs d'une journée
  public function journee($journee, $id_championnat) {
  	$matchs = $this->championnat->getJournee($journee, $id_championnat);
  	$vue = new Vue("Journee");
  	$vue->generer(array('matchs' => $matchs));
  }
  
  // Affiche le formulaire de modification de match
  public function recupererMatch($id_match) {
  	$match = $this->championnat->getMatch($id_match);
  	$vue = new Vue("ModificationM");
  	$vue->generer(array('match' => $match));
  }
  
  // Modifier un match dans la BDD
  public function modifierMatch($match) {
  	$this->championnat->modifierMatch($match);
  }
  
  //Affiche le formulaire de modification de championnat
  public function recupererChampionnat($id_championnat) {
  	$championnat = $this->championnat->getChampionnat($id_championnat);
  	$vue = new Vue("ModificationC");
  	$vue->generer(array('championnat' => $championnat));
  }
  
  //Modifier un championnat dans la BDD
public function modifierChampionnat($championnat) {
  	$this->championnat->modifierChampionnat($championnat);
  }
}

?>