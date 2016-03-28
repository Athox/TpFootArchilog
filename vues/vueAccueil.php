<?php $this->titre = "Mon Blog"; ?>

<h1>Sélection du pays</h1>

<?php foreach ($pays as $p):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=championnat&id=".$p["pays_championnat"] ?>">
            <?php echo $p["pays_championnat"]?></a>
        </header>
    </article>
    <hr />
<?php endforeach; ?>