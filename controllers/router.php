<?php

require_once 'controllers/controllerAccueil.php';
require_once 'controllers/controllerArticle.php';
require_once 'vues/Vue.php';

class Router {

  private $ctrlAccueil;
  private $ctrlArticle;

  public function __construct() {
    $this->ctrlAccueil = new ControllerAccueil();
    $this->ctrlArticle = new ControllerArticle();
  }

  // Traite une requ�te entrante
  public function routerRequete() {
    try {
      if (isset($_GET['action'])) {
        if ($_GET['action'] == 'article') {
          if (isset($_GET['id'])) {
            $idArticle = intval($_GET['id']);
            if ($idArticle != 0) {
              $this->ctrlArticle->article($idArticle);
            }
            else
              throw new Exception("Identifiant de l'article non valide");
          }
          else
            throw new Exception("Identifiant de l'article non d�fini");
        }
        else
          throw new Exception("Action non valide");
      }
      else {  // aucune action d�finie : affichage de l'accueil
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