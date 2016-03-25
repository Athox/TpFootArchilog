<?php

require_once 'modeles/modele.php';

class Equipe extends Modele {
       
      // Renvoie les informations de l'équipe
      public function getEquipe($id_equipe) {
      	$sql = 'SELECT Equipe.*, Stade.*, Championnat.nom_championnat
      			FROM Equipe 
      			INNER JOIN Stade
      			ON Equipe.id_stade = Stade.id_stade
      			INNER JOIN Championnat
      			ON Equipe.id_championnat = Championnat.id_championnat
      			WHERE Equipe.id_equipe=?';
      	$classement = $this->executerRequete($sql, array($id_equipe));
      	if ($classement->rowCount() != 0)
      		return $classement->fetchAll();
      		else
      			throw new Exception("Equipe inconnue");
      }
}

?>