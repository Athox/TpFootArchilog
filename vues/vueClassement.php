<?php $this->titre = "Mon Blog - " ?>

<div class="page-header">
	<h1>Classement de <?php echo $classement[0][0]?></h1>
</div>

<div class="container">
	<form class="form-inline" role="form" method="post" action="index.php?action=journee">
		<div class="form-group">
			<input type="hidden" name="id_championnat" value="<?= $classement[0]['id_championnat']?>"/>
			<label for="journee">Voir les résultats de la journee:</label>
			<select class="form-control" id="journee" name="journee">
				<?php foreach ($nbJournees as $elem):?>
					<option value="<?=$elem['journee_match']?>"><?=$elem['journee_match']?></option>
				<?php endforeach;?></select>
		</div>
		<button type="submit" class="btn btn-default">Valider</button>
	</form>

<table class="table">
	<thead class="thead-inverse">
	  <tr>
	    <th>Rang</th>
	    <th></th>
	    <th>Equipe</th>
	    <th>Pts</th>
	    <th>J.</th>
	    <th>G.</th>
	    <th>N.</th>
	    <th>P.</th>
	    <th>p.</th>
	    <th>c.</th>
	    <th>Diff.</th>
	  </tr>
	 </thead>
	 <tbody>
		  <?php
		  $i=0;
			foreach ($classement as $cls):
			$i++;
		    ?>
		  <tr>
		    <th scope="row"><?php echo $i?></th>
		    <td><?php echo '<img src="'.$cls['blason_equipe'].'" height="50"/>'?></td>
		    <td><a href="<?= "index.php?action=equipe&id=".$cls["id_equipe"] ?>"> <?php echo $cls["nom_equipe"]?></a></td>
		  	<td><?php echo $cls["pts_saison_equipe"]?></td>
		  	<td><?php echo $cls["nb_match_equipe"]?></td>
		  	<td><?php echo $cls["nb_matchg_equipe"]?></td>
		  	<td><?php echo $cls["nb_matchn_equipe"]?></td>
		  	<td><?php echo $cls["nb_matchp_equipe"]?></td>
		  	<td><?php echo $cls["nb_but_marques"]?></td>
		  	<td><?php echo $cls["nb_but_concedes"]?></td>
		  	<td><?php echo $cls["nb_but_marques"]-$cls["nb_but_concedes"]?></td>
		  </tr>
		  <?php endforeach; ?>
	</tbody>
</table>
</div>