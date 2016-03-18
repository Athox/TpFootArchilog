<?php $this->titre = "Mon Blog - " ?>

<h1>Championnats de <?php echo $championnats[0][2]?></h1>
<?php
	foreach ($championnats as $championnat):
    ?>
    <article>
    
        <header>
            <a href="<?= "index.php?action=classement&id=".$championnat["id_championnat"] ?>">
            <?php echo $championnat["nom_championnat"]?></a>
        </header>
    </article>
    <hr />
<?php endforeach; ?>