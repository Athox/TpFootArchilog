<?php $this->titre = "Mon Blog - " ?>

<div class="page-header">
	<h1>Championnats de <?php echo $championnats[0][2]?></h1>
</div>

<div class="container">
<?php
	foreach ($championnats as $championnat):
    ?>
		<div class="list-group">
            <a href="<?= "index.php?action=classement&id=".$championnat["id_championnat"] ?>" class="list-group-item">
            <?php echo $championnat["nom_championnat"]?><?php 
            if (isset($_SESSION['Admin'])){
	            if ($_SESSION['Admin']==true){?>
	            	<form class="form-inline" role="form" method="post" action="index.php?action=admin&type=modifC">
	            		<div class="form-group">
	            			<button class="btn btn-default" name="button" value="<?= $championnat["id_championnat"]?>">Modifier le championnat</button>
	            		</div>
	            	</form>   	
            <?php }
            } ?></a>
            
		</div>
<?php endforeach; ?>
</div>