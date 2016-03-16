<?php

require_once 'controllers/controllerAccueil.php';
require_once 'controllers/controllerChampionnat.php';
require_once 'vues/Vue.php';

class Router {

  private $ctrlAccueil;
  private $ctrlChampionnat;

  public function __construct() {
    $this->ctrlAccueil = new ControllerAccueil();
    $this->ctrlChampionnat = new ControllerChampionnat();
  }

  // Traite une requ�te entrante
  public function routerRequete() { 
    try {
      if (isset($_GET['action'])) {
        if ($_GET['action'] == 'championnat') { // Affichage des championnats si on clic sur un pays
          if (isset($_GET['id'])) {
            $pays_championnat = $_GET['id'];
            if ($pays_championnat != null) {
              $this->ctrlChampionnat->championnats($pays_championnat);
            }
            else
              throw new Exception("Erreur");
          }
          else
            throw new Exception("Erreur");
        }
        elseif ($_GET['action'] == 'classement'){ // A faire !!!!!!!!!!!
        	if (isset($_GET['id'])) {
        		$pays_championnat = $_GET['id'];
        		if ($pays_championnat != null) {
        			$this->ctrlChampionnat->championnats($pays_championnat);
        		}
        	}
        		else
        			throw new Exception("Erreur");
        }
        else
          throw new Exception("Action non valide");
      }
      else {  // aucune action d�finie : affichage de l'accueil
        $this->ctrlAccueil->pays();
      }
    }
    catch (Exception $e) {
      $this->erreur($e->getMessage());
    }
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
  
  // Recherche un param�tre dans un tableau
  private function getParametre($tableau, $nom) {
  if (isset($tableau[$nom])) {
    return $tableau[$nom];
  }
  else
    throw new Exception("Param�tre '$nom' absent");
  }
}

?>