<?php

require_once 'modeles/modele.php';

class Admin extends Modele {
       
		// Renvoie le tableau de bord Admin (formulaires d'ajout)
		public function afficherTabBord(){ //REQUETE POUR RECUP LES CHAMPIONNATS
			$tabrd[0] = '<form method="post" action="index.php?action=admin">
							<p>
								Nom: <input type="text" name="nom" /></br>
					Entraineur: <input type="text" name="entraineur" /></br>
					Président: <input type="text" name="president" /></br>
					Championnat: <select name="championnat"> 
															<option value="1">Ligue 1</option>
															<option value="2">Serie A</option>
															<option value="3">Liga</option>
															<option value="4">Liga Adelante</option>
											</select></br>
					Annees de création: <input type="text" name="annee_creation" /></br>
					Nom du stade: <input type="text" name="nom_stade" /></br>
					Capacité du stade: <input type="text" name="capacite_stade" /></br>
					Adresse du stade: <input type="text" name="adresse_stade" /></br>
					Nombre de buts marqués dans la saison: <input type="number" name="nb_but_m" /></br>
					Nombre de buts concédés: <input type="number" name="nb_but_c" /></br>
					Points durant la saison actuelle: <input type="number" name="pts" /></br>
					Nombre de matchs joués: <input type="number" name="nb_match" /></br>
					Nombre de matchs gagnés: <input type="number" name="nb_matchg" /></br>
					Nombre de matchs perdus: <input type="number" name="nb_matchp" /></br>
					Nombre de matchs nuls: <input type="number" name="nb_matchn" /></br>
								<input type="submit" value="Ajouter Equipe" id="equipe"/>
							</p>
						</form>';
			
			$tabrd[1] = '<form method="post" action="index.php?action=admin&type=championnat">
							<p>
								Nom du championnat: <input type="text" name="nom" /></br>
								Pays: <input type="text" name="pays" /></br>
								Année: <input type="text" name="annee" /></br>
								Nombre d\'équipes: <select name="nbequipe">
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
															<option value="21">21</option>
															<option value="22">22</option>
															<option value="23">23</option>
															<option value="24">24</option>
															<option value="25">25</option>
														</select></br>
								Points par match gagné: <select name="ptsg">
															<option value="0">0</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
														</select></br>
								Points par match perdu: <select name="ptsp">
															<option value="0">0</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
														</select></br>
								Points par match nul: <select name="ptsn">
															<option value="0">0</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
														</select></br>
								Gestion des exaequos: <select name="exaequo">
															<option value="difference">Différence</option>
														</select></br>
								<input type="submit" value="Ajouter Championnat"/>
							</p>
						</form>';
			
			$tabrd[2] = '<form method="post" action="index.php?action=admin">
							<p>
								Championnat: <select name="championnat">
															<option value="1">Ligue 1</option>
															<option value="2">Serie A</option>
															<option value="3">Liga</option>
															<option value="4">Liga Adelante</option>
											</select></br>
								Equipe recevante: <input type="text" name="equipe_dom" /></br>
								Equipe en déplacement: <input type="text" name="equipe_ext" /></br>
								Date: <input type="date" name="date" /></br>
								Gagnant: <select name="gagne">
															<option value="0">Match nul</option>
															<option value="1">Equipe recevante</option>
															<option value="2">Equipe en déplacement</option>
											</select></br>
								Nombre de buts de l\'équipe recevante: <select name="but_dom">
															<option value="0">0</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
														</select></br>
								Nombre de buts de l\'équipe en déplacement: <select name="but_ext">
															<option value="0">0</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
															<option value="7">7</option>
															<option value="8">8</option>
															<option value="9">9</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
															<option value="13">13</option>
															<option value="14">14</option>
															<option value="15">15</option>
															<option value="16">16</option>
															<option value="17">17</option>
															<option value="18">18</option>
															<option value="19">19</option>
															<option value="20">20</option>
														</select></br>
								<input type="submit" value="Ajouter Match" id="match"/>
							</p>
						</form>';
			return $tabrd;
		}	
		
		//Ajouter un championnat dans la BDD
		public function ajoutChampionnat($nom, $pays, $annee, $nbequipe, $ptsg, $ptsp, $ptsn, $exaequo){ 
			$sql = 'INSERT INTO Championnat 
					(nom_championnat, pays_championnat, annee_championnat, nb_equipe_championnat, pts_gagne, pts_perdu, pts_nul,type_exaequo) 
					VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
			$this->ajouterRequete($sql, array($nom, $pays, $annee, $nbequipe, $ptsg, $ptsp, $ptsn, $exaequo));
		}
}

?>