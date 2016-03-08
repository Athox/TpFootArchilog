<?php $this->titre = "Mon Blog"; ?>

<?php foreach ($articles as $article):
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=article&id=" . $article['Id'] ?>">
                <h1 class="titreBillet"><?= $article['Titre'] ?></h1>
            </a>
            <time><?= $article['DatePublication'] ?></time>
        </header>
        <p><?= $article['Contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>