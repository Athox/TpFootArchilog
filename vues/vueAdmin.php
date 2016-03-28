<?php $this->titre = "Mon Blog"; ?>

<div class="container">
	<div class="page-header">
		<h1>Espace Administrateur</h1>
	</div>
</div>

<div class="container">
	<h2>Ajouter un match</h2>
	<form role="form" method="post" action="index.php?action=admin&type=match">
		<fieldset class="form-group">
			<label for="championnat">Championnat:</label>
			<select name="championnat" class="form-control">
							<?php foreach ($tabrd as $elem):?>
							<option value="<?= $elem['id_championnat']?>"><?= $elem['nom_championnat'] ?></option>
							<?php endforeach;?>
						</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="equipe_dom">Equipe recevante:</label>
			<select name="equipe_dom" class="form-control" id="equipe_dom">
									<?php foreach ($equipe as $elem):?>
									<option value="<?= $elem['nom_equipe']?>"><?= $elem['nom_equipe'] ?></option>
									<?php endforeach;?>
								</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="equipe_ext">Equipe en déplacement:</label>
			<select name="equipe_ext" id="equipe_ext" class="form-control">
									<?php foreach ($equipe as $elem):?>
									<option value="<?= $elem['nom_equipe']?>"><?= $elem['nom_equipe'] ?></option>
									<?php endforeach;?>
								</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="date">Date:</label>
			<input class="form-control" id="date" type="date" name="date" placeholder="<?= date('Y-m-d')?>"/></br>
		</fieldset>
		<fieldset class="form-group">
			<label for="gagne">Gagnant:</label>
			<select class="form-control" id="gagne" name="gagne">
						<option value="0">Match nul</option>
						<option value="1">Equipe recevante</option>
						<option value="2">Equipe en déplacement</option>
					</select>
		</fieldset>	
		<fieldset class="form-group">
			<label for="but_dom">Nombre de buts de l'équipe recevante:</label>
			<select class="form-control" id="but_dom" name="but_dom">
					<?php for($i=0; $i<=20; $i++){?>
						<option value="<?= $i?>"><?= $i?></option><?php }?>
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="but_ext">Nombre de buts de l'équipe en déplacement:</label>
			<select class="form-control" id="but_ext" name="but_ext">
				<?php for($i=0; $i<=20; $i++){?>
					<option value="<?= $i?>"><?= $i?></option><?php }?>
			</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="journee">Journee du match:</label> 
			<input class="form-control" id="journee" type="number" name="journee" />
		</fieldset>
		<button type="submit" class="btn btn-primary">Ajouter Match</button>
	</form>
</div>

<div class="container">
	<h2>Ajouter une équipe</h2>
	<form role="form" method="post" action="index.php?action=admin&type=equipe">
		<fieldset class="form-group">
			<label for="nom">Nom:</label>
			<input class="form-control" id="nom" type="text" name="nom" />
		</fieldset>	
		<fieldset class="form-group">
			<label for="entraineur">Entraineur:</label>
			<input class="form-control" id="entraineur" type="text" name="entraineur" />
		</fieldset>	
		<fieldset class="form-group">
			<label for="president">Président:</label> 
			<input class="form-control" id="president" type="text" name="president" />
		</fieldset>	
		<fieldset class="form-group">
			<label for="championnat">Championnat:</label> 
			<select class="form-control" id="championnat" name="championnat">
							<?php foreach ($tabrd as $elem):?>
							<option value="<?= $elem['id_championnat']?>"><?= $elem['nom_championnat'] ?></option>
							<?php endforeach;?>
						</select></br>
		</fieldset>				
		<fieldset class="form-group">
			<label for="annee_creation">Annees de création:</label>
			<input class="form-control" id="annee_creation" type="text" name="annee_creation" />
		</fieldset>	
		<fieldset class="form-group">
			<label for="nom_stade">Nom du stade:</label>
			<input class="form-control" id="nom_stade" type="text" name="nom_stade" />
		</fieldset>	
		<fieldset class="form-group">
			<label for="capacite_stade">Capacité du stade:</label>
			<input class="form-control" id="capacite_stade" type="number" name="capacite_stade" />
		</fieldset>	
		<fieldset class="form-group">
			<label for="nb_but_m">Nombre de buts marqués dans la saison:</label>
			<input class="form-control" id="nb_but_m" type="number" name="nb_but_m" />
		</fieldset>	
		<fieldset class="form-group">
			<label for="nb_but_c">Nombre de buts concédés:</label>
			<input class="form-control" id="nb_but_c" type="number" name="nb_but_c" />
		</fieldset>	
		<fieldset class="form-group">
			<label for="pts">Points durant la saison actuelle:</label>
			<input class="form-control" id="pts" type="number" name="pts" />
		</fieldset>	
		<fieldset class="form-group">
			<label for="nb_match">Nombre de matchs joués:</label>
			<input class="form-control" id="nb_match" type="number" name="nb_match" />
		</fieldset>	
		<fieldset class="form-group">
			<label for="nb_matchg">Nombre de matchs gagnés:</label>
			<input class="form-control" id="nb_matchg" type="number" name="nb_matchg" />
		</fieldset>	
		<fieldset class="form-group">
			<label for="nb_matchp">Nombre de matchs perdus:</label>
			<input class="form-control" id="nb_matchp" type="number" name="nb_matchp" />
		</fieldset>	
		<fieldset class="form-group">
			<label for="nb_matchn">Nombre de matchs nuls:</label>
			<input class="form-control" id="nb_matchn" type="number" name="nb_matchn" />
		</fieldset>	
			<button type="submit" class="btn btn-primary">Ajouter Equipe</button>
	</form>
</div>

<div class="container">
	<h2>Ajouter un championnat</h2>
	<form role="form" method="post" action="index.php?action=admin&type=championnat">
		<fieldset class="form-group">
			<label for="nom">Nom du championnat:</label>
			<input class="form-control" id="nom" type="text" name="nom" />
		</fieldset>	
		<fieldset class="form-group">
			<label for="pays">Pays:</label>
			<input class="form-control" id="pays" type="text" name="pays" />
		</fieldset>
		<fieldset class="form-group">
			<label for="annee">Année:</label>
			<input class="form-control" id="annee" type="text" name="annee" />
		</fieldset>	
		<fieldset class="form-group">
			<label for="nbequipe">Nombre d\'équipes:</label>
			<select class="form-control" id="nbequipe" name="nbequipe">
									<?php for($i=0; $i<=40; $i++){?>
										<option value="<?= $i?>"><?= $i?></option><?php }?>
								</select>
		</fieldset>						
		<fieldset class="form-group">
			<label for="ptsg">Points par match gagné:</label>
			<select class="form-control" id="ptsg" name="ptsg">
										<?php for($i=0; $i<=5; $i++){?>
											<option value="<?= $i?>"><?= $i?></option><?php }?>
									</select>
		</fieldset>	
		<fieldset class="form-group">
			<label for="ptsp">Points par match perdu:</label>
			<select class="form-control" id="ptsp" name="ptsp">
										<?php for($i=0; $i<=5; $i++){?>
											<option value="<?= $i?>"><?= $i?></option><?php }?>
									</select>
		</fieldset>
		<fieldset class="form-group">						
			<label for="ptsn">Points par match nul:</label>
			<select class="form-control" id="ptsn" name="ptsn">
										<?php for($i=0; $i<=5; $i++){?>
											<option value="<?= $i?>"><?= $i?></option><?php }?>
									</select>
		</fieldset>
		<fieldset class="form-group">
			<label for="exaequo">Gestion des exaequos:</label>
			<select class="form-control" id="exaequo" name="exaequo">
										<option value="difference">Différence</option>
									</select>
		</fieldset>
		<button type="submit" class="btn btn-primary">Ajouter Championnat</button>
	</form>
</div>
