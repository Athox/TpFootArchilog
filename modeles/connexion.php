<?php

require_once 'modeles/modele.php';

class Connexion extends Modele {
       
      // Renvoie le formulaire de connexion
      public function afficherFormulaire() {    	
      	$formulaire = '<form role="form" method="post" action="index.php?action=connexion">
							<div class="form-group">
								<label for="login">Login:</label>
      							<input class="form-control" id="login" type="text" name="login" />
      						</div>
      						<div class="form-group">
								<label for="password">Password:</label>
      							<input class="form-control" id="password" type="password" name="password" />
      						</div>
								<button class="btn btn-default" type="submit">Valider</button>
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