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
        elseif ($_GET['action'] == 'journee'){ // Afichage des r�sultats d'une journ�e
        	if(isset($_POST['journee']) && isset($_POST['id_championnat'])){
        		$journee=$_POST['journee'];
        		$id_championnat = $_POST['id_championnat'];
        		$this->ctrlChampionnat->journee($journee, $id_championnat);
        	}
        }
        elseif ($_GET['action'] == 'resultat'){ // Afichage des r�sultat d'une �quipe
        	if(isset($_POST['nom_equipe'])){
        		$nom_equipe=$_POST['nom_equipe'];
        		$this->ctrlEquipe->resultat($nom_equipe);
        	}
        }
        elseif ($_GET['action'] == 'match'){ // Afichage d'un match
        	if(isset($_GET['id'])){
        		$id_match=$_GET['id'];
        		$this->ctrlChampionnat->match($id_match);
        	}
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
        elseif ($_GET['action'] == 'equipe'){ // Affichage des informations sur une �quipe
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
        	if (isset($_SESSION['Admin'])){ // Si la session Admin est d�j� ouverte 
        			$this->ctrlAdmin->pageAdmin();
        	}
        	elseif (isset($_POST['login']) && isset($_POST['password'])){ //Si le formulaire a �t� rempli teste login et password pour ouvrir une session
        		$login = $_POST['login'];
        		$password = $_POST['password'];
        		$this->ctrlConnexion->connexion($login, $password);
        	}
        	else{ // Si formulaire non rempli, affiche le formulaire
        		$this->ctrlConnexion->formulaire();
        	}
        }
        elseif ($_GET['action'] == 'deconnexion'){
        	if(isset($_SESSION['Admin'])){
        		$_SESSION = array();
        		session_destroy();
        		$this->ctrlAccueil->pays();
        	}
        }
        elseif ($_GET['action'] == 'admin'){ // Ajouter des v�rifications sur ce que l'on �crit ex: equipes existent...
        	if (isset($_SESSION['Admin'])){
	        	if ($_SESSION['Admin']==true){
	        		if($_GET['type'] == 'championnat') { // Ajouter championnat
	        			foreach ($_POST as $element){
	        				$champ[] = $element;
	        			}
	        			$this->ctrlAdmin->ajouterChampionnat($champ);
	        		}
	        		if($_GET['type'] == 'equipe'){ // Ajouter �quipe
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
	        		if($_GET['type'] == 'modifC'){ // Modifier un championnat
	        			if(isset($_GET['etat'])){
		        			if ($_GET['etat']=='ok'){ // R�cup�re les modifications du formulaire
		        				foreach ($_POST as $element){
		        					$championnat[] = $element;
		        				}
		        				$this->ctrlChampionnat->modifierChampionnat($championnat);
		        				$this->ctrlAdmin->pageAdmin();
		        			}
	        			}
	        			else{// Sinon affiche le formulaire de modification du championnat
	        			$id_championnat = $_POST['button'];
	        			$this->ctrlChampionnat->recupererChampionnat($id_championnat);
	        			}
	        		}
	        		if($_GET['type'] == 'modifE'){ // Modifier une �quipe
	        			if(isset($_GET['etat'])){
	        				if ($_GET['etat']=='ok'){ // R�cup�re les modifications du formulaire
	        					foreach ($_POST as $element){
	        						$equipe[] = $element;
	        					}
	        					$this->ctrlEquipe->modifierEquipe($equipe);
	        					$this->ctrlAdmin->pageAdmin();
	        				}
	        			}
	        			else{// Sinon affiche le formulaire de modification de l'�quipe
	        				$id_equipe = $_POST['button'];
	        				$this->ctrlEquipe->recupererEquipe($id_equipe);
	        			}
	        		}
	        		if($_GET['type'] == 'modifM'){ // Modifier un match
	        			if(isset($_GET['etat'])){
	        				if ($_GET['etat']=='ok'){ // R�cup�re les modifications du formulaire
	        					foreach ($_POST as $element){
	        						$match[] = $element;
	        					}
	        					$this->ctrlChampionnat->modifierMatch($match);
	        					$this->ctrlAdmin->pageAdmin();
	        				}
	        			}
	        			else{// Sinon affiche le formulaire de modification du match
	        				$id_match = $_POST['button'];
	        				$this->ctrlChampionnat->recupererMatch($id_match);
	        			}
	        		}
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