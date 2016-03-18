<?php $this->titre = "Mon Blog - " ?>

LIGNES PUIS COLONNES !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

<h1><?php echo $equipe[0]["nom_equipe"]?></h1>
<table>
  <tr>
    <th>Maillot</th>
    <td>maillot</td>
  </tr>
  
  <tr>
  <th>Infos</th>
	<td><?php echo $equipe[0]["nom_equipe"]?></td>
  	<td>Championnat: <?php echo $equipe[0]["nom_championnat"]?></td>
  	<td>Fondée en: <?php echo $equipe[0]["annee_creation_equipe"]?></td>
  	<td>Président: <?php echo $equipe[0]["president_equipe"]?></td>
  	<td>Entraineur: <?php echo $equipe[0]["entraineur_equipe"]?></td>
  </tr>
  
  <tr>
  <th>Stade</th>
  	<td>Nom: <?php echo $equipe[0]["nom_stade"]?></td>
  	<td>Capacité: <?php echo $equipe[0]["capacite_stade"]?></td>
  	<td>Adresse: <?php echo $equipe[0]["adresse_stade"]?></td>
  	<td>Téléphone: <?php echo $equipe[0]["tel_stade"]?></td>
  </tr>
  
  <tr>
  </tr>
  

</table>
