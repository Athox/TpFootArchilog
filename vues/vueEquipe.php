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
  	<td>Capacité: <?php echo $equipe[0]["capacite_stade"]?></td>	
  </tr>
  
  <tr>
  	<td></td>
  	<td>Fondée en: <?php echo $equipe[0]["annee_creation_equipe"]?></td>
  	<td>Adresse: <?php echo $equipe[0]["adresse_stade"]?></td>
  </tr>
  
  <tr>
  	<td></td>
  	<td>Président: <?php echo $equipe[0]["president_equipe"]?></td>
  </tr>
  
  <tr>
  	<td></td>
  	<td>Entraineur: <?php echo $equipe[0]["entraineur_equipe"]?></td>
  </tr>

</table>
