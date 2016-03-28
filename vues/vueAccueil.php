<?php $this->titre = "Mon Blog"; ?>

<div class="container">
	<div class="page-header">
		<h2>Sélection du pays</h2>
	</div>
</div>
<div class="container">
<?php foreach ($pays as $p):?>
    <div class="list-group">

            <a href="<?= "index.php?action=championnat&id=".$p["pays_championnat"] ?>" class="list-group-item">
            <?php echo $p["pays_championnat"]?></a>
    </div>

<?php endforeach; ?>
</div>