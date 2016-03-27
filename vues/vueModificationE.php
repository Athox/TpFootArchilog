<?php $this->titre = "Mon Blog"; ?>

<h1>Modification: <?= $equipe[0]['nom_equipe']?></h1>

<form method="post" action="index.php?action=admin&type=modifE&etat=ok">
							<p>
								<input type="hidden" name="id" value="<?= $equipe[0]['id_equipe']?>">
								Nom: <input type="text" name="nom" value="<?= $equipe[0]['nom_equipe']?>"/></br>
								Entraineur: <input type="text" name="entraineur" value="<?= $equipe[0]['entraineur_equipe']?>"/></br>
								Président: <input type="text" name="president" value="<?= $equipe[0]['president_equipe']?>"/></br>
								Championnat: <select name="championnat"> 
																		<option value="1">Ligue 1</option>
																		<option value="2">Serie A</option>
																		<option value="3">Liga</option>
																		<option value="4">Liga Adelante</option>
														</select></br>
								Annees de création: <input type="text" name="annee_creation" value="<?= $equipe[0]['annee_creation_equipe']?>"/></br>
								Nom du stade: <input type="text" name="nom_stade" value="<?= $equipe[0]['nom_stade']?>"/></br>
								Capacité du stade: <input type="number" name="capacite_stade" value="<?= $equipe[0]['capacite_stade']?>"/></br>
								Nombre de buts marqués dans la saison: <input type="number" name="nb_but_m" value="<?= $equipe[0]['nb_but_marques']?>"/></br>
								Nombre de buts concédés: <input type="number" name="nb_but_c" value="<?= $equipe[0]['nb_but_concedes']?>"/></br>
								Points durant la saison actuelle: <input type="number" name="pts" value="<?= $equipe[0]['pts_saison_equipe']?>"/></br>
								Nombre de matchs joués: <input type="number" name="nb_match" value="<?= $equipe[0]['nb_match_equipe']?>"/></br>
								Nombre de matchs gagnés: <input type="number" name="nb_matchg" value="<?= $equipe[0]['nb_matchg_equipe']?>"/></br>
								Nombre de matchs perdus: <input type="number" name="nb_matchp" value="<?= $equipe[0]['nb_matchp_equipe']?>"/></br>
								Nombre de matchs nuls: <input type="number" name="nb_matchn" value="<?= $equipe[0]['nb_matchn_equipe']?>"/></br>
								<input type="submit" value="Modifier Equipe"/>
							</p>
						</form>