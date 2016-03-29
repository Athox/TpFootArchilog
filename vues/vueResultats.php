<?php $this->titre = "Mon Blog - " ?>

<div class="container">
	<div class="page-header">
		<h1>Résultats </h1>
	</div>

<div class="col-md-8">
	<table class="table">
		<?php foreach ($resultats as $elem):?>
		<tr>
			<th></th>
			<th><?php echo $elem['date_match']?></th>
			<th></th>
		</tr>
		<tr>
			<td><?php echo $elem['equipe_dom']?></td>
			<td><?php echo '<img src="images/'.$elem['equipe_dom'].'.png" height="50"/>'?>      <?php echo $elem['nb_but_dom']?> - <?php echo $elem['nb_but_ext']?>      <?php echo '<img src="images/'.$elem['equipe_ext'].'.png" height="50"/>'?></td>
			<td><?php echo $elem['equipe_ext']?></td>
			<?php if(isset($_SESSION['Admin']) && $_SESSION['Admin']==true){?>
			<td>
				<form for="form" method="post" action="index.php?action=admin&type=modifM">
		            <button class="btn btn-default" name="button" value="<?= $elem['id_match']?>">Modifier le match</button>
		        </form>
			</td>
			<?php }?>
		</tr>
		<?php endforeach;?>
	</table>
</div>
</div>