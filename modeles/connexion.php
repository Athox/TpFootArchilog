<?php

require_once 'modeles/modele.php';

class Connexion extends Modele {
       
      // Renvoie le formulaire de connexion
      public function afficherFormulaire() {    	
      	$formulaire = '<form method="post" action="index.php?action=connexion">
					<p>
						Login: <input type="text" name="login" /></br>
						Password: <input type="password" name="password" /></br>
						<input type="submit" name="Valider" />
					</p>
				</form>';
      	
      	return $formulaire;
		}
		
		public function controllerFormulaire($login, $password){
			$connexion = getConnexion();
			if ($login == $connexion[0] && $password == $connexion[1]){
				$autorisation = true;
			}
			else{
				$autorisation = false;
			}
		}
}
?>