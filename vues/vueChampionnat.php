<?php $this->titre = "Mon Blog - " ?>


<?php
	foreach ($championnats as $championnat):
    ?>
    <article>
    <h1>Championnats de <?php echo $championnat["pays_championnat"]?></h1>
        <header>
            <a href="<?= "index.php?action=classement&id=".$championnat["nom_championnat"] ?>">
            <?php echo $championnat["nom_championnat"]?></a>
        </header>
    </article>
    <hr />
<?php endforeach; ?>