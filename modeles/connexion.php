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
}
?>