<?php $this->titre = "Mon Blog - " ?>


<h1><?php echo $equipe[0]["nom_equipe"]?></h1>
<table>
  <tr>
    <th>Maillot</th>
    <th>Infos</th>
    <th>Stade</th>
  </tr>
  
  <tr>
  	<td>maillot</td>
	<td><?php echo $equipe[0]["nom_equipe"]?></td>
	<td>Nom: <?php echo $equipe[0]["nom_stade"]?></td>
  </tr>
  
  <tr>
  	<td></td>
  	<td>Championnat: <?php echo $equipe[0]["nom_championnat"]?></td>
  	<td>Capacit�: <?php echo $equipe[0]["capacite_stade"]?></td>	
  </tr>
  
  <tr>
  	<td></td>
  	<td>Fond�e en: <?php echo $equipe[0]["annee_creation_equipe"]?></td>
  </tr>
  
  <tr>
  	<td></td>
  	<td>Pr�sident: <?php echo $equipe[0]["president_equipe"]?></td>
  </tr>
  
  <tr>
  	<td></td>
  	<td>Entraineur: <?php echo $equipe[0]["entraineur_equipe"]?></td>
  </tr>

</table>

<?php 
            if (isset($_SESSION['Admin'])){
	            if ($_SESSION['Admin']==true){?>
	            	<form method="post" action="index.php?action=admin&type=modifE">
	            		<button name="button" value="<?= $equipe[0]["id_equipe"]?>">Modifier l'�quipe</button>
	            	</form>   	
            <?php }
            } ?>
