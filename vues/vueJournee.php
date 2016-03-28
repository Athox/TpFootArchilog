<?php $this->titre = "Mon Blog - " ?>

<div class="container">
	<div class="page-header">
		<h1>Résultats de la journée <?php echo $matchs[0]['journee_match']?></h1>
	</div>

	<form role="form" class="form-inline" method="post" action="index.php?action=journee">
			<input type="hidden" name="id_championnat" value="<?= $matchs[0]['id_championnat']?>"/>
			<div class="form-group">
				<label for="journee">Voir les résultats de la journee:</label> 
				<select class="form-control" id="journee" name="journee">
								<?php for($i=1; $i<=38; $i++){?>
									<option value="<?=$i?>"><?=$i?></option>
								<?php }?></select>
			</div>
			<button class="btn btn-default" type="submit">Valider</button>
		</form>

<div class="col-md-8">
	<table class="table">
		<?php foreach ($matchs as $match):?>
		<tr>
			<th></th>
			<th><?php echo $match['date_match']?></th>
			<th></th>
		</tr>
		<tr>
			<td><?php echo $match['equipe_dom']?></td>
			<td><?php echo $match['nb_but_dom']?> - <?php echo $match['nb_but_ext']?></td>
			<td><?php echo $match['equipe_ext']?></td>
			<?php if(isset($_SESSION['Admin']) && $_SESSION['Admin']==true){?>
			<td>
				<form for="form" method="post" action="index.php?action=admin&type=modifM">
		            <button class="btn btn-default" name="button" value="<?= $match['id_match']?>">Modifier le match</button>
		        </form>
			</td>
			<?php }?>
		</tr>
		<?php endforeach;?>
	</table>
</div>
</div>