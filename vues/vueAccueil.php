<?php $this->titre = "Mon Blog"; ?>

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