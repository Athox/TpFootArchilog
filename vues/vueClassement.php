<?php $this->titre = "Mon Blog - " ?>

<h1>Classement de <?php echo $classement[0][1]?></h1>
<?php
	foreach ($classement as $cls):
    ?>
    <article>
    
        <header>
            <a href="<?= "index.php?action=equipe&id=".$cls["nom_equipe"] ?>"> 
            <?php echo $cls["nom_equipe"]?></a>
        </header>
    </article>
    <hr />
<?php endforeach; ?>