<?php

require_once 'modeles/modele.php';

class Connexion extends Modele {
       
      // Renvoie le formulaire de connexion
      public function afficherFormulaire() {    	
      	$formulaire = '<form method="post" action="index.php?action=connexion">
							<p>
								Login: <input type="text" name="login" /></br>
								Password: <input type="password" name="password" /></br>
								<input type="submit" value="Valider" />
							</p>
						</form>';
      	return $formulaire;
		}
		
	// Controlle le login et password Admin
		public function controllerFormulaire($login, $password){
			$connexion = $this->getConnexion();
			if ($login == $connexion[0] && $password == $connexion[1]){
				return true;
			}
			else{
				return false;
			}
		}
		
		// Renvoie le tableau de bord Admin
		public function afficherTabBord(){
			$tabrd = '<form action="index.php?action=admin">
							<input type="submit" value="Ajouter Championnat" id="championnat"/>
							<input type="submit" value="Ajouter Equipe" id="equipe"/>
							<input type="submit" value="Ajouter Match" id="match"/>
						</form>';
			return $tabrd;
		}	
}
?>