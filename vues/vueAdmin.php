<?php $this->titre = "Mon Blog"; ?>

<h1>Espace Administrateur</h1>
<h2>Ajouter un match</h2>

<form method="post" action="index.php?action=admin&type=match">
	<p>
		Championnat: <select name="championnat">
						<?php foreach ($tabrd as $elem):?>
						<option value="<?= $elem['id_championnat']?>"><?= $elem['nom_championnat'] ?></option>
						<?php endforeach;?>
					</select></br>
		Equipe recevante: <select name="equipe_dom">
								<?php foreach ($equipe as $elem):?>
								<option value="<?= $elem['nom_equipe']?>"><?= $elem['nom_equipe'] ?></option>
								<?php endforeach;?>
							</select></br>
		Equipe en déplacement: <select name="equipe_ext">
								<?php foreach ($equipe as $elem):?>
								<option value="<?= $elem['nom_equipe']?>"><?= $elem['nom_equipe'] ?></option>
								<?php endforeach;?>
							</select></br>
		Date: <input type="date" name="date" value="<?= date('Y-m-d')?>"/></br>
		Gagnant: <select name="gagne">
					<option value="0">Match nul</option>
					<option value="1">Equipe recevante</option>
					<option value="2">Equipe en déplacement</option>
				</select></br>
		Nombre de buts de l\'équipe recevante: <select name="but_dom">
													<?php for($i=0; $i<=20; $i++){?>
														<option value="<?= $i?>"><?= $i?></option><?php }?>
												</select></br>
		Nombre de buts de l\'équipe en déplacement: <select name="but_ext">
														<?php for($i=0; $i<=20; $i++){?>
															<option value="<?= $i?>"><?= $i?></option><?php }?>
													</select></br>
		Journee du match: <input type="number" name="journee" /></br>
		<input type="submit" value="Ajouter Match"/>
	</p>
</form>

<h2>Ajouter une équipe</h2>

<form method="post" action="index.php?action=admin&type=equipe">
	<p>
		Nom: <input type="text" name="nom" /></br>
		Entraineur: <input type="text" name="entraineur" /></br>
		Président: <input type="text" name="president" /></br>
		Championnat: <select name="championnat">
						<?php foreach ($tabrd as $elem):?>
						<option value="<?= $elem['id_championnat']?>"><?= $elem['nom_championnat'] ?></option>
						<?php endforeach;?>
					</select></br>
		Annees de création: <input type="text" name="annee_creation" /></br>
		Nom du stade: <input type="text" name="nom_stade" /></br>
		Capacité du stade: <input type="number" name="capacite_stade" /></br>
		Nombre de buts marqués dans la saison: <input type="number" name="nb_but_m" /></br>
		Nombre de buts concédés: <input type="number" name="nb_but_c" /></br>
		Points durant la saison actuelle: <input type="number" name="pts" /></br>
		Nombre de matchs joués: <input type="number" name="nb_match" /></br>
		Nombre de matchs gagnés: <input type="number" name="nb_matchg" /></br>
		Nombre de matchs perdus: <input type="number" name="nb_matchp" /></br>
		Nombre de matchs nuls: <input type="number" name="nb_matchn" /></br>
		<input type="submit" value="Ajouter Equipe"/>
	</p>
</form>

<h2>Ajouter un championnat</h2>

<form method="post" action="index.php?action=admin&type=championnat">
	<p>
		Nom du championnat: <input type="text" name="nom" /></br>
		Pays: <input type="text" name="pays" /></br>
		Année: <input type="text" name="annee" /></br>
		Nombre d\'équipes: <select name="nbequipe">
								<?php for($i=0; $i<=40; $i++){?>
									<option value="<?= $i?>"><?= $i?></option><?php }?>
							</select></br>
		Points par match gagné: <select name="ptsg">
									<?php for($i=0; $i<=5; $i++){?>
										<option value="<?= $i?>"><?= $i?></option><?php }?>
								</select></br>
		Points par match perdu: <select name="ptsp">
									<?php for($i=0; $i<=5; $i++){?>
										<option value="<?= $i?>"><?= $i?></option><?php }?>
								</select></br>						
		Points par match nul: <select name="ptsn">
									<?php for($i=0; $i<=5; $i++){?>
										<option value="<?= $i?>"><?= $i?></option><?php }?>
								</select></br>
		Gestion des exaequos: <select name="exaequo">
									<option value="difference">Différence</option>
								</select></br>
		<input type="submit" value="Ajouter Championnat"/>
	</p>
</form>
