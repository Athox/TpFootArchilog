<?php $this->titre = "Mon Blog - " ?>
<h1>Classement de <?php echo $classement[0][0]?></h1>

	<form method="post" action="index.php?action=journee">
		<input type="hidden" name="id_championnat" value="<?= $classement[0]['id_championnat']?>"/>
		Voir les résultats de la journee: <select name="journee">
												<?php for($i=1; $i<=($classement[0]['nb_equipe_championnat']-1)*2; $i++){?>
												<option value="<?=$i?>"><?=$i?></option>
												<?php }?></select>
		<input type="submit" value="Valider"/>
	</form>

<table>
  <tr>
    <th>Rang</th>
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
  <?php
  $i=0;
	foreach ($classement as $cls):
	$i++;
    ?>
  <tr>
    <td><?php echo $i?></td>
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
</table>
