<?php

require_once 'modeles/modele.php';

class Equipe extends Modele {
       
      // Renvoie les informations de l'équipe
      public function getEquipe($id_equipe) {
      	$sql = 'SELECT Equipe.*, Championnat.nom_championnat
      			FROM Equipe 
      			INNER JOIN Championnat
      			ON Equipe.id_championnat = Championnat.id_championnat
      			WHERE Equipe.id_equipe=?';
      	$classement = $this->executerRequete($sql, array($id_equipe));
      	if ($classement->rowCount() != 0)
      		return $classement->fetchAll();
      		else
      			throw new Exception("Equipe inconnue");
      }
      
      // Modifier une équipe dans la BDD
      public function modifierEquipe ($equipe){
      	$sql = 'UPDATE Equipe SET nom_equipe=?,  entraineur_equipe=?, president_equipe=?, id_championnat=?, 
      			annee_creation_equipe=?, nb_but_marques=?, nb_but_concedes=?, pts_saison_equipe=?, 
      			nb_match_equipe=?, nb_matchg_equipe=?, nb_matchp_equipe=?, nb_matchn_equipe=?, nom_stade=?, capacite_stade=?
      			WHERE id_equipe=?';
      	$this->ajouterRequete($sql, array($equipe[1], $equipe[2], $equipe[3], $equipe[4], $equipe[5], $equipe[8],$equipe[9],$equipe[10],$equipe[11],$equipe[12],$equipe[13],$equipe[14],$equipe[6], $equipe[7], $equipe[0]));
      }
      
      // Renvoie les matchs d'une équipe
      public function getResultats($nom_equipe) {
      	$sql = 'SELECT * FROM Matchs WHERE equipe_dom=? OR equipe_ext=?';
      	$resultats = $this->executerRequete($sql, array($nom_equipe, $nom_equipe));
      	if ($resultats->rowCount() != 0){
      		return $resultats->fetchAll();
      	}
      	else{
      			throw new Exception("Erreur");
      	}
      }
}

?>