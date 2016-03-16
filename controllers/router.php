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

  // Traite une requête entrante
  public function routerRequete() { //MODIFIER LES IF POUR FAIRE APPARAITRE PAYS PUIS CHAMPIONNATS AU CLIC
    try {
      if (isset($_GET['action'])) {
        if ($_GET['action'] == 'article') {
          if (isset($_GET['id'])) {
            $idArticle = intval($_GET['id']);
            if ($idArticle != 0) {
              $this->ctrlChampionnat->article($idArticle);
            }
            else
              throw new Exception("Identifiant de l'article non valide");
          }
          else
            throw new Exception("Identifiant de l'article non défini");
        }
        else
          throw new Exception("Action non valide");
      }
      else {  // aucune action définie : affichage de l'accueil
        $this->ctrlAccueil->accueil();
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
  
  // Recherche un paramètre dans un tableau
  private function getParametre($tableau, $nom) {
  if (isset($tableau[$nom])) {
    return $tableau[$nom];
  }
  else
    throw new Exception("Paramètre '$nom' absent");
  }
}

?>