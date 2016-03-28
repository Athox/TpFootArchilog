<?php $this->titre = "Mon Blog - " ?>

<div class="container">
	<div class="page-header">
		<h1><?php echo $equipe[0]["nom_equipe"]?></h1>
		<?php 
            if (isset($_SESSION['Admin'])){
	            if ($_SESSION['Admin']==true){?>
	            	<form role="form" method="post" action="index.php?action=admin&type=modifE">
	            		<button class="btn btn-default" name="button" value="<?= $equipe[0]["id_equipe"]?>">Modifier l'équipe</button>
	            	</form>   	
            <?php }
            } ?>
	</div>
	
		
	
<div class="col-md-4">
	<table class="table">
		<thead class="thead-inverse">
	  		<tr>
	  			<th>Maillot</th>
	  		</tr>	
		</thead>
		<tr>
			<td>maillot</td>
		</tr>
	</table>
</div>	

<div class="col-md-4">
	<table class="table">
		<thead class="thead-inverse">
		  <tr>
		    <th>Infos</th>
		  </tr>
		 </thead>
		 <tr>
		 	<td><?php echo $equipe[0]["nom_equipe"]?></td>
		 </tr>
		 <tr>
		 	<td>Championnat:</td> 
		 	<td><?php echo $equipe[0]["nom_championnat"]?></td>
		 </tr>
		 <tr>
		 	<td>Fondée en:</td> 
		 	<td><?php echo $equipe[0]["annee_creation_equipe"]?></td>
		 </tr>
		 <tr>
		 	<td>Président:</td> 
		 	<td><?php echo $equipe[0]["president_equipe"]?></td>
		 </tr>
		 <tr>
		 	<td>Entraineur:</td> 
		 	<td><?php echo $equipe[0]["entraineur_equipe"]?></td>
		 </tr>
	</table>
</div> 

<div class="col-md-4">
	<table class="table">
	  <thead class="thead-inverse">
		  <tr>
		    <th>Stade</th>
		  </tr>
		 </thead>
		 <tr>
		 	<td>Nom:</td> 
		 	<td><?php echo $equipe[0]["nom_stade"]?></td>
		 </tr>
		 <tr>
		 	<td>Capacité:</td> 
		 	<td><?php echo $equipe[0]["capacite_stade"]?></td>
		 </tr>
	</table>
</div> 
</div>