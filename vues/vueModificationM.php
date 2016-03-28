<?php $this->titre = "Mon Blog"; ?>

<h1>Modification du match <?= $match['equipe_dom']?> - <?= $match['equipe_ext']?></h1>

<form method="post" action="index.php?action=admin&type=modifM&etat=ok">
	<input type="hidden" name="id" value="<?= $match['id_match']?>"/>
	Equipe à domicile: <input type="text" name="equipe_dom" value="<?= $match['equipe_dom']?>"/></br>
	Equipe en déplacement: <input type="text" name="equipe_ext" value="<?= $match['equipe_ext']?>"/></br>
	Date (AAAA-MM-JJ): <input type="date" name="date" value="<?= $match['date_match']?>"/></br>
	Gagnant: <select name="gagne">
					<option value="0">Match nul</option>
					<option value="1">Equipe recevante</option>
					<option value="2">Equipe en déplacement</option>
			</select></br> 
	Championnat: <select name="championnat">
					<option value="1">Ligue 1</option>
					<option value="2">Serie A</option>
					<option value="3">Liga</option>
					<option value="4">Liga Adelante</option>
				</select></br>
	Nombre de buts de l\'équipe recevante: <select name="but_dom">
												<?php for($i=0; $i<=20; $i++){?>
													<option value="<?= $i?>" <?php if($i==$match['nb_but_dom']){echo 'selected="selected"';}?>><?= $i?></option><?php }?>
											</select></br>
	Nombre de buts de l\'équipe en déplacement: <select name="but_ext">
													<?php for($i=0; $i<=20; $i++){?>
														<option value="<?= $i?>" <?php if($i==$match['nb_but_ext']){echo 'selected="selected"';}?>><?= $i?></option><?php }?>
												</select></br>
	Journee du match: <input type="number" name="journee" value="<?= $match['journee_match']?>"/></br>
	<input type="submit" value="Valider"/>
</form>