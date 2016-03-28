<?php

require_once 'modeles/modele.php';

class Admin extends Modele {
       
		// Renvoie les informations des championnats
		public function championnatTabBord(){ 
			$sql = 'SELECT * FROM Championnat';
			$championnat = $this->executerRequete($sql);
			return $championnat->fetchAll();
		}
		
		// Renvoie les noms des équipes
		public function equipeTabBord(){ 
			$sql = 'SELECT nom_equipe FROM Equipe';
			$equipe = $this->executerRequete($sql);
			return $equipe->fetchAll();
		}
		
		//Ajouter un championnat dans la BDD
		public function ajoutChampionnat($champ){ 
			$sql = 'INSERT INTO Championnat 
					(nom_championnat, pays_championnat, annee_championnat, nb_equipe_championnat, pts_gagne, pts_perdu, pts_nul,type_exaequo) 
					VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
			$this->ajouterRequete($sql, array($champ[0], $champ[1], $champ[2], $champ[3], $champ[4], $champ[5], $champ[6], $champ[7]));
		}
		
		//Ajouter une équipe dans la BDD
		public function ajoutEquipe($equipe){	
			$sql = 'INSERT INTO Equipe
					(nom_equipe,  entraineur_equipe, president_equipe, id_championnat, annee_creation_equipe, 
					nb_but_marques, nb_but_concedes, pts_saison_equipe, nb_match_equipe, nb_matchg_equipe, 
					nb_matchp_equipe, nb_matchn_equipe, nom_stade, capacite_stade)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
			$this->ajouterRequete($sql, array($equipe[0], $equipe[1], $equipe[2], $equipe[3], $equipe[4], $equipe[7], $equipe[8], $equipe[9], $equipe[10], $equipe[11], $equipe[12], $equipe[13], $equipe[5], $equipe[6]));
		}
		
		//Ajouter un match dans la BDD
		public function ajoutMatch($match){
			$sql = 'INSERT INTO Matchs
					(equipe_dom, equipe_ext, date_match, gagnant, nb_but_dom, nb_but_ext, journee_match, id_championnat)
					VALUES (?, ?, ?, ?, ?, ?, ?)';
			$this->ajouterRequete($sql, array($match[1], $match[2], $match[3], $match[4], $match[5], $match[6], $match[7], $match[0]));
			
			// Update des données des équipes (nb_match, pts, etc...)
			if ($match[4]==0){ // Si match nul
				$sqlDom = 'UPDATE Equipe SET nb_but_marques=nb_but_marques+?, nb_but_concedes=nb_but_concedes+?, 
						pts_saison_equipe=pts_saison_equipe+1, nb_match_equipe=nb_match_equipe+1, 
						nb_matchn_equipe=nb_matchn_equipe+1
						WHERE nom_equipe=?';
				$this->ajouterRequete($sqlDom, array($match[5], $match[6], $match[1]));
				$sqlExt = 'UPDATE Equipe SET nb_but_marques=nb_but_marques+?, nb_but_concedes=nb_but_concedes+?, 
						pts_saison_equipe=pts_saison_equipe+1, nb_match_equipe=nb_match_equipe+1, 
						nb_matchn_equipe=nb_matchn_equipe+1
						WHERE nom_equipe=?';
				$this->ajouterRequete($sqlExt, array($match[6], $match[5], $match[2]));
			}
			elseif ($match[4]==1){ // Si équipe à domicile gagne
				$sqlDom = 'UPDATE Equipe SET nb_but_marques=nb_but_marques+?, nb_but_concedes=nb_but_concedes+?,
					pts_saison_equipe=pts_saison_equipe+3, nb_match_equipe=nb_match_equipe+1,
					nb_matchg_equipe=nb_matchg_equipe+1
					WHERE nom_equipe=?';
				$this->ajouterRequete($sqlDom, array($match[5], $match[6], $match[1]));
				$sqlExt = 'UPDATE Equipe SET nb_but_marques=nb_but_marques+?, nb_but_concedes=nb_but_concedes+?,
						nb_match_equipe=nb_match_equipe+1, nb_matchp_equipe=nb_matchp_equipe+1
						WHERE nom_equipe=?';
				$this->ajouterRequete($sqlExt, array($match[6], $match[5], $match[2]));
			}
			elseif ($match[4]==2){ // Si équipe en déplacement gagne
				$sqlDom = 'UPDATE Equipe SET nb_but_marques=nb_but_marques+?, nb_but_concedes=nb_but_concedes+?,
					nb_match_equipe=nb_match_equipe+1, nb_matchp_equipe=nb_matchp_equipe+1
					WHERE nom_equipe=?';
				$this->ajouterRequete($sqlDom, array($match[5], $match[6], $match[1]));
				$sqlExt = 'UPDATE Equipe SET nb_but_marques=nb_but_marques+?, nb_but_concedes=nb_but_concedes+?,
						pts_saison_equipe=pts_saison_equipe+3, nb_match_equipe=nb_match_equipe+1, 
						nb_matchg_equipe=nb_matchg_equipe+1
						WHERE nom_equipe=?';
				$this->ajouterRequete($sqlExt, array($match[6], $match[5], $match[2]));
			}
		}
}

?>