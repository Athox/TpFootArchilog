<?php

require_once 'modeles/modele.php';

class Championnat extends Modele {

    // Renvoie la liste des pays
    public function getPays() {
        $sql = 'SELECT DISTINCT pays_championnat FROM Championnat
              ORDER BY pays_championnat ASC';
        $pays = $this->executerRequete($sql);   
        return $pays->fetchAll();
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
      	$sql = 'SELECT Championnat.nom_championnat, Championnat.nb_equipe_championnat, Equipe.* 
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
      public function getJournee($journee, $id_championnat){
      	$sql = 'SELECT * FROM Matchs WHERE journee_match=? AND id_championnat=? ORDER BY date_match';
      	$matchs = $this->executerRequete($sql, array($journee, $id_championnat));
      	if ($matchs->rowCount() != 0)
      		return $matchs->fetchAll();
      		else
      			throw new Exception("Aucun match pour cette journée");
      }
      
      // Renvoie un match par l'id
      public function getMatch($id_match){
      	$sql = 'SELECT * FROM Matchs WHERE id_match=?';
      	$match = $this->executerRequete($sql, array($id_match));
      	if ($match->rowCount() != 0)
      		return $match->fetch();
      		else
      			throw new Exception("Aucun match trouvé");
      }
      
      // Modifier un match dans la BDD
      public function modifierMatch($match){
      	if ($match[6]>$match[7]){
      		$match[4]=1;
      	}
      	elseif ($match[6]<$match[7]){
      		$match[4]=2;
      	}
      	else{
      		$match[4]=0;
      	}
      	$sql = 'UPDATE Matchs SET equipe_dom=?, equipe_ext=?, date_match=?,
      			gagnant=?, id_championnat=?, nb_but_dom=?, nb_but_ext=?, journee_match=?
      			WHERE id_match=?';
      	$this->ajouterRequete($sql, array($match[1], $match[2], $match[3], $match[4], $match[5], $match[6], $match[7], $match[8], $match[0]));
      	
      	// Calcul de la différence de buts entre l'ancien match et la modification
      	$match[6]=$match[6]-$match[10];
      	$match[7]=$match[7]-$match[11];
      	
      	// Update des compteurs de buts
      	$sqlButDom = 'UPDATE Equipe SET nb_but_marques=nb_but_marques+?, nb_but_concedes=nb_but_concedes+?
      					WHERE nom_equipe=?';
      	$this->ajouterRequete($sqlButDom, array($match[6], $match[7], $match[1]));
      	$sqlButDom = 'UPDATE Equipe SET nb_but_marques=nb_but_marques+?, nb_but_concedes=nb_but_concedes+?
      					WHERE nom_equipe=?';
      	$this->ajouterRequete($sqlButDom, array($match[7], $match[6], $match[2]));
      	
      	// Update des compteurs de match
      	if ($match[4]==0){ // Si match nul
      		if ($match[9]==1){ // Anciennement gagné à domicile
      			$sqlDom = 'UPDATE Equipe SET pts_saison_equipe=pts_saison_equipe-2, nb_matchn_equipe=nb_matchn_equipe+1,
						nb_matchg_equipe=nb_matchg_equipe-1
      					WHERE nom_equipe=?';
      			$this->ajouterRequete($sqlDom, array($match[1]));
      			$sqlExt = 'UPDATE Equipe SET pts_saison_equipe=pts_saison_equipe+1,	nb_matchn_equipe=nb_matchn_equipe+1,
      					nb_matchp_equipe=nb_matchp_equipe-1
						WHERE nom_equipe=?';
      			$this->ajouterRequete($sqlExt, array($match[2]));
      		}
      		elseif ($match[9]==2){ // Anciennement gagné à l'extérieur
      			$sqlDom = 'UPDATE Equipe SET pts_saison_equipe=pts_saison_equipe+1, nb_matchn_equipe=nb_matchn_equipe+1,
						nb_matchp_equipe=nb_matchp_equipe-1
      					WHERE nom_equipe=?';
      			$this->ajouterRequete($sqlDom, array($match[1]));
      			$sqlExt = 'UPDATE Equipe SET pts_saison_equipe=pts_saison_equipe-2,	nb_matchn_equipe=nb_matchn_equipe+1,
      					nb_matchg_equipe=nb_matchg_equipe-1
						WHERE nom_equipe=?';
      			$this->ajouterRequete($sqlExt, array($match[2]));
      		}
      	}
      	elseif ($match[4]==1){ // Si gagné à domicile
      		if ($match[9]==0){ // Anciennement nul
      			$sqlDom = 'UPDATE Equipe SET pts_saison_equipe=pts_saison_equipe+2, nb_matchn_equipe=nb_matchn_equipe-1,
						nb_matchg_equipe=nb_matchg_equipe+1
      					WHERE nom_equipe=?';
      			$this->ajouterRequete($sqlDom, array($match[1]));
      			$sqlExt = 'UPDATE Equipe SET pts_saison_equipe=pts_saison_equipe-1,	nb_matchn_equipe=nb_matchn_equipe-1,
      					nb_matchp_equipe=nb_matchp_equipe+1
						WHERE nom_equipe=?';
      			$this->ajouterRequete($sqlExt, array($match[2]));
      		}
      		elseif ($match[9]==2){ // Anciennement gagné à l'extérieur
      			$sqlDom = 'UPDATE Equipe SET pts_saison_equipe=pts_saison_equipe+3, nb_matchg_equipe=nb_matchg_equipe+1,
						nb_matchp_equipe=nb_matchp_equipe-1
      					WHERE nom_equipe=?';
      			$this->ajouterRequete($sqlDom, array($match[1]));
      			$sqlExt = 'UPDATE Equipe SET pts_saison_equipe=pts_saison_equipe-3,	nb_matchp_equipe=nb_matchp_equipe+1,
      					nb_matchg_equipe=nb_matchg_equipe-1
						WHERE nom_equipe=?';
      			$this->ajouterRequete($sqlExt, array($match[2]));
      		}
      	}
      	elseif ($match[4]==2){ // Si gagné à l'extérieur
      		if ($match[9]==0){ // Anciennement nul
      			$sqlDom = 'UPDATE Equipe SET pts_saison_equipe=pts_saison_equipe-1, nb_matchn_equipe=nb_matchn_equipe-1,
						nb_matchp_equipe=nb_matchp_equipe+1
      					WHERE nom_equipe=?';
      			$this->ajouterRequete($sqlDom, array($match[1]));
      			$sqlExt = 'UPDATE Equipe SET pts_saison_equipe=pts_saison_equipe+2,	nb_matchn_equipe=nb_matchn_equipe-1,
      					nb_matchg_equipe=nb_matchg_equipe+1
						WHERE nom_equipe=?';
      			$this->ajouterRequete($sqlExt, array($match[2]));
      		}
      		elseif ($match[9]==1){ // Anciennement gagné à domicile
      			$sqlDom = 'UPDATE Equipe SET pts_saison_equipe=pts_saison_equipe-3, nb_matchp_equipe=nb_matchp_equipe+1,
						nb_matchg_equipe=nb_matchg_equipe-1
      					WHERE nom_equipe=?';
      			$this->ajouterRequete($sqlDom, array($match[1]));
      			$sqlExt = 'UPDATE Equipe SET pts_saison_equipe=pts_saison_equipe+3,	nb_matchp_equipe=nb_matchp_equipe-1,
      					nb_matchg_equipe=nb_matchg_equipe+1
						WHERE nom_equipe=?';
      			$this->ajouterRequete($sqlExt, array($match[2]));
      		}
      	}
      }
      
      // Modifier un championnat dans la BDD
      public function modifierChampionnat($championnat){
      	$sql = 'UPDATE Championnat SET nom_championnat=?, pays_championnat=?, annee_championnat=?,
      			nb_equipe_championnat=?, pts_gagne=?, pts_perdu=?, pts_nul=?, type_exaequo=?
      			WHERE id_championnat=?';
   		$this->ajouterRequete($sql, array($championnat[1], $championnat[2], $championnat[3], $championnat[4], $championnat[5], $championnat[6], $championnat[7], $championnat[8], $championnat[0]));
      }
      
}

?>