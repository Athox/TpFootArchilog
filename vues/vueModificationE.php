<?php $this->titre = "Mon Blog"; ?>

<div class="container">
<div class="page-header">
<h1>Modification: <?= $equipe[0]['nom_equipe']?></h1>
</div>

<form for="form" method="post" action="index.php?action=admin&type=modifE&etat=ok">
							<div class="form-group">
								<input type="hidden" name="id" value="<?= $equipe[0]['id_equipe']?>">
								<label for="nom_equipe">Nom:</label>
								<input class="form-control" id="nom_equipe" type="text" name="nom" value="<?= $equipe[0]['nom_equipe']?>"/></br>
							</div>	
							<div class="form-group">
								<label for="entraineur">Entraineur:</label> 
								<input class="form-control" id="entraineur" type="text" name="entraineur" value="<?= $equipe[0]['entraineur_equipe']?>"/></br>
							</div>		
							<div class="form-group">
								<label for="president">Président:</label> 
								<input class="form-control" id="president" type="text" name="president" value="<?= $equipe[0]['president_equipe']?>"/></br>
							</div>		
							<div class="form-group">
								<label for="championnat">Championnat:</label> 
								<select class="form-control" id="championnat" name="championnat"> 
									<?php foreach ($championnats as $champ):?>
											<option value="<?= $champ['id_championnat']?>"><?= $champ['nom_championnat']?></option>
									<?php endforeach;?>
								</select></br>
							</div>								
							<div class="form-group">
								<label for="annee_creation">Annees de création:</label> 
								<input class="form-control" id="annee_creation" type="text" name="annee_creation" value="<?= $equipe[0]['annee_creation_equipe']?>"/></br>
							</div>		
							<div class="form-group">
								<label for="nom_stade">Nom du stade:</label> 
								<input class="form-control" id="nom_stade" type="text" name="nom_stade" value="<?= $equipe[0]['nom_stade']?>"/></br>
							</div>		
							<div class="form-group">
								<label for="capacite_stade">Capacité du stade:</label> 
								<input class="form-control" id="capacite_stade" type="number" name="capacite_stade" value="<?= $equipe[0]['capacite_stade']?>"/></br>
							</div>		
							<div class="form-group">
								<label for="nb_but_m">Nombre de buts marqués dans la saison:</label> 
								<input class="form-control" id="nb_but_m" type="number" name="nb_but_m" value="<?= $equipe[0]['nb_but_marques']?>"/></br>
							</div>		
							<div class="form-group">
								<label for="nb_but_c">Nombre de buts concédés:</label> 
								<input class="form-control" id="nb_but_c" type="number" name="nb_but_c" value="<?= $equipe[0]['nb_but_concedes']?>"/></br>
							</div>		
							<div class="form-group">
								<label for="pts">Points durant la saison actuelle:</label> 
								<input class="form-control" id="pts" type="number" name="pts" value="<?= $equipe[0]['pts_saison_equipe']?>"/></br>
							</div>		
							<div class="form-group">
								<label for="nb_match">Nombre de matchs joués:</label> 
								<input class="form-control" id="nb_match" type="number" name="nb_match" value="<?= $equipe[0]['nb_match_equipe']?>"/></br>
							</div>		
							<div class="form-group">
								<label for="nb_matchg">Nombre de matchs gagnés:</label> 
								<input class="form-control" id="nb_matchg" type="number" name="nb_matchg" value="<?= $equipe[0]['nb_matchg_equipe']?>"/></br>
							</div>		
							<div class="form-group">
								<label for="nb_matchp">Nombre de matchs perdus:</label> 
								<input class="form-control" id="nb_matchp" type="number" name="nb_matchp" value="<?= $equipe[0]['nb_matchp_equipe']?>"/></br>
							</div>		
							<div class="form-group">
								<label for="nb_matchn">Nombre de matchs nuls:</label> 
								<input class="form-control" id="nb_matchn" type="number" name="nb_matchn" value="<?= $equipe[0]['nb_matchn_equipe']?>"/></br>
							</div>	
								<button class="btn btn-default" type="submit">Modifier Equipe</button>
						</form>
						</div>