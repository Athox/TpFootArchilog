<?php $this->titre = "Mon Blog - " . $championnats["pays_championnat"]; ?>

<?php foreach ($championnats as $championnat):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=classement&id=".$championnat["nom_championnat"] ?>">
            <?php echo $championnat["nom_championnat"]?></a>
        </header>
    </article>
    <hr />
<?php endforeach; ?>