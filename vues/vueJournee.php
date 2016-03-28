<?php $this->titre = "Mon Blog - " ?>

<h1>Résultats de la journée <?php echo $matchs[0]['journee_match']?></h1>

<form method="post" action="index.php?action=journee">
		<input type="hidden" name="id_championnat" value="<?= $matchs[0]['id_championnat']?>"/>
		Voir les résultats de la journee: <select name="journee">
												<?php for($i=1; $i<=38; $i++){?>
												<option value="<?=$i?>"><?=$i?></option>
												<?php }?></select>
		<input type="submit" value="Valider"/>
	</form>

<table>
	<?php foreach ($matchs as $match):?>
	<tr>
		<td><?php echo $match['date_match']?></td>
	</tr>
	<tr>
		<td><?php echo $match['equipe_dom']?></td>
		<td><?php echo $match['nb_but_dom']?> - <?php echo $match['nb_but_ext']?></td>
		<td><?php echo $match['equipe_ext']?></td>
		<?php if(isset($_SESSION['Admin']) && $_SESSION['Admin']==true){?>
		<td>
			<form method="post" action="index.php?action=admin&type=modifM">
	            <button name="button" value="<?= $match['id_match']?>">Modifier le match</button>
	        </form>
		</td>
		<?php }?>
	</tr>
	<?php endforeach;?>
</table>