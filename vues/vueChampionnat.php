<?php $this->titre = "Mon Blog - " ?>

<h1>Championnats de <?php echo $championnats[0][2]?></h1>
<?php
	foreach ($championnats as $championnat):
    ?>
    <article>
    
        <header>
            <a href="<?= "index.php?action=classement&id=".$championnat["id_championnat"] ?>">
            <?php echo $championnat["nom_championnat"]?></a>
            <?php 
            if (isset($_SESSION['Admin'])){
	            if ($_SESSION['Admin']==true){?>
	            	<form method="post" action="index.php?action=admin&type=modifC">
	            		<button name="button" value="<?= $championnat["id_championnat"]?>">Modifier le championnat</button>
	            	</form>   	
            <?php }
            } ?>
            
        </header>
    </article>
    <hr />
<?php endforeach; ?>