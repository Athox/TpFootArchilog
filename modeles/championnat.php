<?php

require_once 'modeles/modele.php';

class Championnat extends Modele {

    // Renvoie la liste des pays
    public function getPays() {
        $sql = 'SELECT DISTINCT pays_championnat FROM Championnat
              ORDER BY pays_championnat ASC';
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
      
    // Renvoie un championnat par l'id
    public function getChampionnat($id_championnat){
    	$sql = 'SELECT * FROM Championnat WHERE id_championnat=?';
    			$championnat = $this->executerRequete($sql, array($id_championnat));
    			return $championnat->fetch();
    }
      
      // Renvoie le classement des equipes d'un championnat
      public function getClassement($id_championnat) {
      	$sql = 'SELECT Championnat.nom_championnat, Equipe.* 
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
      
      // Renvoie les resultats d'une journée
      public function getJournee($date){
      	
      }
      
      // Modifier un championnat dans la BDD
      public function modifierChampionnat ($championnat){
      	$sql = 'UPDATE Championnat SET nom_championnat=?, pays_championnat=?, annee_championnat=?,
      			nb_equipe_championnat=?, pts_gagne=?, pts_perdu=?, pts_nul=?, type_exaequo=?
      			WHERE id_championnat=?';
   		$this->ajouterRequete($sql, array($championnat[1], $championnat[2], $championnat[3], $championnat[4], $championnat[5], $championnat[6], $championnat[7], $championnat[8], $championnat[0]));
      }
      
}

?>