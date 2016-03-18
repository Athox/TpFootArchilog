<?php

require_once 'modeles/modele.php';

class Championnat extends Modele {

    // Renvoie la liste des pays
    public function getPays() {
        $sql = 'SELECT id_championnat, pays_championnat FROM Championnat'
              . ' order by pays_championnat ASC';
        $pays = $this->executerRequete($sql);   
        return $pays;
    }
    
    // Renvoie les championnats d'un pays
    public function getChampionnats($pays_championnat) {
        $sql = 'SELECT id_championnat, nom_championnat, pays_championnat FROM Championnat'
          . ' WHERE pays_championnat=?';
        $championnats = $this->executerRequete($sql, array($pays_championnat));
        if ($championnats->rowCount() != 0)
          return $championnats->fetchAll();
        else
          throw new Exception("Aucun championnat ne correspond au pays '$pays_championnat'");
      }
      
      // Renvoie le classement des equipes d'un championnat
      public function getClassement($id_championnat) {
      	$sql = 'SELECT Equipe.nom_equipe, Championnat.nom_championnat
      			FROM Equipe INNER JOIN Championnat
      			ON Equipe.id_championnat = Championnat.id_championnat
      			WHERE Equipe.id_championnat=?
      			ORDER BY pts_saison_equipe DESC';
      	$classement = $this->executerRequete($sql, array($id_championnat));
      	if ($classement->rowCount() != 0)
      		return $classement->fetchAll();
      		else
      			throw new Exception("Aucune équipe dans ce championnat");
      }
      
      // Renvoie les resultats d'un journée
}

?>