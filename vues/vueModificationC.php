<?php $this->titre = "Mon Blog"; ?>

<div class="container">
<div class="page-header">
	<h1>Modification: <?= $championnat['nom_championnat']?></h1>
</div>

<form for="form" method="post" action="index.php?action=admin&type=modifC&etat=ok">
							<div class="form-group">
								<input type="hidden" name="id" value="<?= $championnat['id_championnat']?>">
								<label for="nom_championnat">Nom du championnat:</label>
								<input class="form-control" id="nom_championnat" type="text" name="nom" value="<?= $championnat['nom_championnat']?>"/>
							</div>
							<div class="form-group">
								<label for="pays_championnat">Pays:</label>
								<input class="form-control" id="pays_championnat" type="text" name="pays" value="<?= $championnat['pays_championnat']?>"/>
							</div>	
							<div class="form-group">
								<label for="annee_championnat">Année:</label>
								<input class="form-control" id="annee_championnat" type="text" name="annee" value="<?= $championnat['annee_championnat']?>"/>
							</div>
							<div class="form-group">
								<label for="nbequipe">Nombre d'équipes:</label>
								<select class="form-control" id="nbequipe" name="nbequipe">
													<?php for($i=1; $i<=25; $i++){?>
															<option value="<?=$i?>" <?php if($i==$championnat['nb_equipe_championnat']){echo 'selected="selected"';}?>><?=$i?></option>
															<?php }?>
														</select>
							</div>
							<div class="form-group">
								<label for="ptsg">Points par match gagné:</label>
								<select class="form-control" id="ptsg" name="ptsg">
													<?php for($i=0; $i<=10; $i++){?>
															<option value="<?=$i?>" <?php if($i==$championnat['pts_gagne']){echo 'selected="selected"';}?>><?=$i?></option>
															<?php }?>
														</select>
							</div>
							<div class="form-group">
								<label for="ptsp">Points par match perdu:</label>
								<select class="form-control" id="ptsp" name="ptsp">
															<?php for($i=0; $i<=10; $i++){?>
															<option value="<?=$i?>" <?php if($i==$championnat['pts_perdu']){echo 'selected="selected"';}?>><?=$i?></option>
															<?php }?>
														</select>
							</div>
							<div class="form-group">
								<label for="ptsn">Points par match nul:</label>
								<select class="form-control" id="ptsn" name="ptsn">
															<?php for($i=0; $i<=10; $i++){?>
															<option value="<?=$i?>" <?php if($i==$championnat['pts_nul']){echo 'selected="selected"';}?>><?=$i?></option>
															<?php }?>
														</select>
							</div>
							<div class="form-group">
								<label for="exaequo">Gestion des exaequos:</label>
								<select class="form-control" id="exaequo" name="exaequo">
															<option value="difference" selected="selected">Différence</option>
														</select>
							</div>
								<button class="btn btn-default" type="submit">Modifier Championnat</button>
						</form>
						</div>