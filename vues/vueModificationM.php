<?php $this->titre = "Mon Blog"; ?>

<div class="container">
	<div class="page-header">
		<h1>Modification du match <?= $match['equipe_dom']?> - <?= $match['equipe_ext']?></h1>
	</div>

<form method="post" action="index.php?action=admin&type=modifM&etat=ok">
	<div class="form-group">
		<input type="hidden" name="id" value="<?= $match['id_match']?>"/>
		<label for="equip_dom">Equipe � domicile:</label> 
		<select class="form-control" id="equipe_dom" name="equipe_dom">
			<?php foreach ($equipes as $elem):?>
				<option value="<?= $elem['nom_equipe']?>" <?php if($elem['nom_equipe']==$match['equipe_dom']){echo 'selected="selected"';}?>><?= $elem['nom_equipe']?></option>
			<?php endforeach;?>
		</select>
	</div>	
	<div class="form-group">
		<label for="equip_ext">Equipe en d�placement:</label> 
		<select class="form-control" id="equipe_ext" name="equipe_ext">
			<?php foreach ($equipes as $elem):?>
				<option value="<?= $elem['nom_equipe']?>" <?php if($elem['nom_equipe']==$match['equipe_ext']){echo 'selected="selected"';}?>><?= $elem['nom_equipe']?></option>
			<?php endforeach;?>
		</select>
	</div>
	<div class="form-group">
		<label for="date">Date (AAAA-MM-JJ):</label> 
		<input class="form-control" id="date" type="date" name="date" value="<?= $match['date_match']?>"/>
	</div>
	<input type="hidden" name="gagne" value="0"/>
	<div class="form-group"> 
		<label for="championnat">Championnat:</label> 
		<select class="form-control" id="championnat" name="championnat">
				<?php foreach ($championnats as $champ):?>
						<option value="<?= $champ['id_championnat']?>" <?php if($champ['id_championnat']==$match['id_championnat']){echo 'selected="selected"';}?>><?= $champ['nom_championnat']?></option>
				<?php endforeach;?>
					</select>
	</div>		
	<div class="form-group">
		<label for="but_dom">Nombre de buts de l'�quipe recevante:</label> 
		<select class="form-control" id="but_dom" name="but_dom">
													<?php for($i=0; $i<=20; $i++){?>
														<option value="<?= $i?>" <?php if($i==$match['nb_but_dom']){echo 'selected="selected"';}?>><?= $i?></option><?php }?>
												</select>
	</div>
	<div class="form-group">
		<label for="but_ext">Nombre de buts de l'�quipe en d�placement:</label> 
		<select class="form-control" id="but_ext" name="but_ext">
														<?php for($i=0; $i<=20; $i++){?>
															<option value="<?= $i?>" <?php if($i==$match['nb_but_ext']){echo 'selected="selected"';}?>><?= $i?></option><?php }?>
													</select>
	</div>
	<div class="form-group">
		<label for="journee">Journee du match:</label> 
		<input class="form-control" id="journee" type="number" name="journee" value="<?= $match['journee_match']?>"/>
	</div>
	<input type="hidden" name="ex_gagne" value="<?= $match['gagnant']?>"/>
	<input type="hidden" name="ex_but_dom" value="<?= $match['nb_but_dom']?>"/>
	<input type="hidden" name="ex_but_ext" value="<?= $match['nb_but_ext']?>"/>
		<button class="btn btn-default" type="submit">Valider</button>
</form>
</div>