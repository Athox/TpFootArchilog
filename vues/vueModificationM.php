<?php $this->titre = "Mon Blog"; ?>

<div class="container">
	<div class="page-header">
		<h1>Modification du match <?= $match['equipe_dom']?> - <?= $match['equipe_ext']?></h1>
	</div>

<form method="post" action="index.php?action=admin&type=modifM&etat=ok">
	<div class="form-group">
		<input type="hidden" name="id" value="<?= $match['id_match']?>"/>
		<label for="equip_dom">Equipe à domicile:</label> 
		<input class="form-control" id="equipe_dom" type="text" name="equipe_dom" value="<?= $match['equipe_dom']?>"/>
	</div>	
	<div class="form-group">
		<label for="equip_ext">Equipe en déplacement:</label> 
		<input class="form-control" id="equipe_ext" type="text" name="equipe_ext" value="<?= $match['equipe_ext']?>"/>
	</div>
	<div class="form-group">
		<label for="date">Date (AAAA-MM-JJ):</label> 
		<input class="form-control" id="date" type="date" name="date" value="<?= $match['date_match']?>"/>
	</div>
	<div class="form-group">
		<label for="gagne">Gagnant:</label> 
		<select class="form-control" id="gagne" name="gagne">
						<option value="0">Match nul</option>
						<option value="1">Equipe recevante</option>
						<option value="2">Equipe en déplacement</option>
				</select>
	</div>
	<div class="form-group"> 
		<label for="championnat">Championnat:</label> 
		<select class="form-control" id="championnat" name="championnat">
				<?php foreach ($championnats as $champ):?>
						<option value="<?= $champ['id_championnat']?>" <?php if($champ['id_championnat']==$match['id_championnat']){echo 'selected="selected"';}?>><?= $champ['nom_championnat']?></option>
				<?php endforeach;?>
					</select>
	</div>		
	<div class="form-group">
		<label for="but_dom">Nombre de buts de l'équipe recevante:</label> 
		<select class="form-control" id="but_dom" name="but_dom">
													<?php for($i=0; $i<=20; $i++){?>
														<option value="<?= $i?>" <?php if($i==$match['nb_but_dom']){echo 'selected="selected"';}?>><?= $i?></option><?php }?>
												</select>
	</div>
	<div class="form-group">
		<label for="but_ext">Nombre de buts de l'équipe en déplacement:</label> 
		<select class="form-control" id="but_ext" name="but_ext">
														<?php for($i=0; $i<=20; $i++){?>
															<option value="<?= $i?>" <?php if($i==$match['nb_but_ext']){echo 'selected="selected"';}?>><?= $i?></option><?php }?>
													</select>
	</div>
	<div class="form-group">
		<label for="journee">Journee du match:</label> 
		<input class="form-control" id="journee" type="number" name="journee" value="<?= $match['journee_match']?>"/>
	</div>
		<button class="btn btn-default" type="submit">Valider</button>
</form>
</div>