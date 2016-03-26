<?php

session_start();

require_once 'controllers/controllerAccueil.php';
require_once 'controllers/controllerChampionnat.php';
require_once 'controllers/controllerEquipe.php';
require_once 'controllers/controllerConnexion.php';
require_once 'controllers/controllerAdmin.php';
require_once 'vues/Vue.php';

class Router {

  private $ctrlAccueil;
  private $ctrlChampionnat;
  private $ctrlEquipe;
  private $ctrlConnexion;
  private $ctrlAdmin;

  public function __construct() {
    $this->ctrlAccueil = new ControllerAccueil();
    $this->ctrlChampionnat = new ControllerChampionnat();
    $this->ctrlEquipe = new ControllerEquipe();
    $this->ctrlConnexion = new ControllerConnexion();
    $this->ctrlAdmin = new ControllerAdmin();
  }

  // Traite une requête entrante
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
        elseif ($_GET['action'] == 'classement'){ //Affichage du classement d'un championnat
        	if (isset($_GET['id'])) {
        		$id_championnat = $_GET['id'];
        		if ($id_championnat != null) {
        			$this->ctrlChampionnat->classement($id_championnat);
        		}
        	}
        		else
        			throw new Exception("Erreur");
        }
        elseif ($_GET['action'] == 'equipe'){ // Affichage des informations sur une équipe
        	if (isset($_GET['id'])) {
        		$id_equipe = $_GET['id'];
        		if ($id_equipe != null) {
        			$this->ctrlEquipe->equipes($id_equipe);
        		}
        	}
        	else
        		throw new Exception("Erreur");
        }
        elseif ($_GET['action'] == 'connexion'){ // Affiche la page de connexion
        	if (isset($_SESSION['Admin'])){ // Si la session Admin est déjà ouverte 
        			$this->ctrlAdmin->pageAdmin();
        	}
        	elseif (isset($_POST['login']) && isset($_POST['password'])){ //Si le formulaire a été rempli teste login et password pour ouvrir une session
        		$login = $_POST['login'];
        		$password = $_POST['password'];
        		$this->ctrlConnexion->connexion($login, $password);
        	}
        	else{ // Si formulaire non rempli, affiche le formulaire
        		$this->ctrlConnexion->formulaire();
        	}
        }
        elseif ($_GET['action'] == 'admin'){ // Ajouter des vérifications sur ce que l'on écrit ex: equipes existent...
        	if ($_SESSION['Admin']==true){
        		if($_GET['type'] == 'championnat') { // Ajouter championnat
        			foreach ($_POST as $element){
        				$champ[] = $element;
        			}
        			$this->ctrlAdmin->ajouterChampionnat($champ);
        		}
        		if($_GET['type'] == 'equipe'){ // Ajouter équipe
        			foreach ($_POST as $element){
        				$equipe[] = $element;
        			}
        			$this->ctrlAdmin->ajouterEquipe($equipe);
        		}
        		if($_GET['type'] == 'match'){ // Ajouter match 
        			foreach ($_POST as $element){
        				$match[] = $element;
        			}
        			$this->ctrlAdmin->ajouterMatch($match);
        		}
        	}
        	else
        		throw new Exception("Erreur");
        }
        else
          throw new Exception("Action non valide");
      }
      else {  // aucune action définie : affichage de l'accueil
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